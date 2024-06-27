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

    public function index()
    {
        $visitas = $this->doacaoService->index();
        
        return response()->json(['data' => $visitas]);
    }

    public function store(Request $request)
    {
        $doacaoDTO = $this->createDoacaoDTO($request);

        $produtosLista = $request->input('produtos');
        
        $doacao = $this->doacaoService->create($doacaoDTO);

        if (!$doacao) {
            return response()->json(['message' => 'Doacao not created, review your data!'], 500);
        }

        if (!empty($produtosLista)) {
            $this->doacaoService->saveProdutosDoacao($doacao, $produtosLista);
        }

        return response()->json(['message' => 'Visita created successfully!', 'data' => $doacao]);
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
            'tipo_doacao' => 'required|string',
            'valor' => 'required|numeric',
            'detalhes' => 'required|string',
            'participante_id' => 'required|integer'
        ]);

        $doacaoDTO = DoacaoDTO::fromValidatedData($validatedData);

        return $doacaoDTO;
    }
}