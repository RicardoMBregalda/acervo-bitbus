<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficina;
use App\DTO\OficinaDTO;
use App\Services\OficinaService;

class OficinaController extends Controller
{
    private OficinaService $oficinaService;

    public function __construct(OficinaService $oficinaService)
    {
        $this->oficinaService = $oficinaService;
    }

    public function index(Request $request)
    {
        $search = $request->input('id');

        $query = Oficina::query();

        if ($search) {
            $query->where('id', 'LIKE', "%{$search}%");
        }

        $oficinas = $query->get();

        return response()->json(['data' => $oficinas]);
    }

    public function store(Request $request)
    {
        $oficinaDTO = $this->createOficinaDTO($request);

        $produtosLista = $request->input('produtos');
        $participantesLista = $request->input('participantes');
        
        $oficina = $this->oficinaService->create($oficinaDTO);

        if (!$oficina) {
            return response()->json(['message' => 'Oficina not created, review your data!'], 500);
        }

        if (!empty($produtosLista)) {
            $this->oficinaService->saveProdutosOficina($oficina, $produtosLista);
        }

        if (!empty($produtosLista)) {
            $this->oficinaService->saveParticipantesOficina($oficina, $participantesLista);
        }

        return response()->json(['message' => 'Oficina created successfully!', 'data' => $oficina]);
    }

    public function show(int $id)
    {
        $oficina = $this->oficinaService->find($id);

        if (!$oficina) {
            return response()->json(['message' => 'Oficina not found!'], 404);
        }

        return response()->json(['data' => $oficina]);
    }

    public function update(Request $request, int $id)
    {
        $oficinaDTO = $this->createOficinaDTO($request);
        
        $produtosLista = $request->input('produtos');
        $participantesLista = $request->input('participantes');

        $oficina = $this->oficinaService->update($id, $oficinaDTO);

        if(!$oficina) {
            return response()->json(['message' => 'Oficina not updated, review your data!'], 404);
        }

        if (!empty($produtosLista)) {
            $this->oficinaService->updateProdutosOficina($oficina, $produtosLista);
        }

        if (!empty($produtosLista)) {
            $this->oficinaService->updateParticipantesOficina($oficina, $participantesLista);
        }

        return response()->json(['message' => 'Oficina updated successfully!', 'data' => $oficina]);
    }

    
    public function delete($id)
    {
        $result = $this->oficinaService->delete($id);
        
        if (!$result) {
            return response()->json(['message' => 'Oficina not found!'], 404);
        }
        
        return response()->json(['message' => 'Oficina deleted successfully!']);
    }
    
    private function createOficinaDTO(Request $request): OficinaDTO 
    {
        $validatedData = $request->validate([
            'organizador' => 'required|string|max:255',
            'endereco' => 'required|string',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'descricao' => 'nullable|string',
            'data_inicio' => 'required|date|date_format:Y-m-d',
            'data_fim' => 'nullable|date|date_format:Y-m-d',
        ]);

        $oficinaDTO = OficinaDTO::fromValidatedData($validatedData);

        return $oficinaDTO;
    }
}