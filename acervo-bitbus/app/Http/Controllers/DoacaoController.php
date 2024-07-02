<?php

namespace App\Http\Controllers;

use App\DTO\DoacaoDTO;
use Illuminate\Http\Request;
use App\Models\Doacao;
use App\Services\DoacaoService;

class DoacaoController extends Controller
{
    private DoacaoService $doacaoService;

    public function __construct(DoacaoService $doacaoService)
    {
        $this->doacaoService = $doacaoService;
    }

    public function index(Request $request)
    {
        $search = $request->input('id');

        $query = Doacao::query();

        if ($search) {
            $query->where('id', 'LIKE', "%{$search}%");
        }

        $doacoes = $query->get();

        return response()->json(['data' => $doacoes]);
    }

    public function store(Request $request)
    {
        $doacaoDTO = $this->createDoacaoDTO($request);

        $produtosLista = $request->input('produtos');
        $participante = $request->input('participante');
        
        if ($doacaoDTO->participante_id == 0) {
            $novoParticipante = $this->doacaoService->saveParticipanteDoacao($doacaoDTO->participante_id, $participante);
            $doacaoDTO->participante_id = $novoParticipante->id; 
        }

        $doacao = $this->doacaoService->create($doacaoDTO);

        if (!$doacao) {
            return response()->json(['message' => 'Doacao not created, review your data!'], 500);
        }

        if (!empty($produtosLista)) {
            $this->doacaoService->saveProdutosDoacao($doacao, $produtosLista);
        }

        return response()->json(['message' => 'Doacao created successfully!', 'data' => $doacao]);
    }

    public function show(int $id)
    {
        $doacao = $this->doacaoService->find($id);

        if (!$doacao) {
            return response()->json(['message' => 'Doacao not found!'], 404);
        }

        return response()->json(['data' => $doacao]);
    }

    public function update(Request $request, int $id)
    {
        $doacaoDTO = $this->createDoacaoDTO($request);
        
        $produtosLista = $request->input('produtos');

        $doacao = $this->doacaoService->update($id, $doacaoDTO);

        if(!$doacao) {
            return response()->json(['message' => 'Doacao not updated, review your data!'], 404);
        }

        if (!empty($produtosLista)) {
            $this->doacaoService->updateProdutosDoacao($doacao, $produtosLista);
        }

        return response()->json(['message' => 'Doacao updated successfully!', 'data' => $doacao]);
    }

    
    public function delete($id)
    {
        $result = $this->doacaoService->delete($id);
        
        if (!$result) {
            return response()->json(['message' => 'Doacao not found!'], 404);
        }
        
        return response()->json(['message' => 'Doacao deleted successfully!']);
    }
    
    private function createDoacaoDTO(Request $request): DoacaoDTO 
    {
        $validatedData = $request->validate([
            'tipo_doacao' => 'required|integer',
            'valor' => 'numeric',
            'detalhes' => 'nullable|string',
            'participante_id' => 'integer'
        ]);

        $doacaoDTO = DoacaoDTO::fromValidatedData($validatedData);

        return $doacaoDTO;
    }
}