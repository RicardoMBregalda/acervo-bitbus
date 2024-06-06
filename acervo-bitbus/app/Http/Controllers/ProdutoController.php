<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\DTO\ProdutoDTO;
use App\Services\ProdutoService;

class ProdutoController extends Controller
{
    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    public function index()
    {
        $produtos = $this->produtoService->index();

        return response()->json(['data' => $produtos]);
    }

    public function store(Request $request)
    {
        $produtoDTO = $this->createProdutoDTO($request);

        $produto = $this->produtoService->create($produtoDTO);

        if (!$produto) {
            return response()->json(['message' => 'Produto not created, review your data!'], 500);
        }

        return response()->json(['message' => 'Produto created successfully!', 'data' => $produto]);
    }

    public function show(int $id)
    {
        $produto = $this->produtoService->find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto not found!'], 404);
        }

        return response()->json(['data' => $produto]);
    }

    public function update(Request $request, int $id)
    {
        $produtoDTO = $this->createProdutoDTO($request);

        $user = $this->produtoService->update($id, $produtoDTO);

        if (!$user) {
            return response()->json(['message' => 'Produto not updated, review your data!'], 404);
        }

        return response()->json(['message' => 'Produto updated successfully!', 'data' => $user]);
    }


    public function delete($id)
    {
        $result = $this->produtoService->delete($id);

        if (!$result) {
            return response()->json(['message' => 'Produto not found!'], 404);
        }

        return response()->json(['message' => 'Produto deleted successfully!']);
    }

    private function createProdutoDTO(Request $request): ProdutoDTO
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:20',
            'nome' => 'required|string|max:100',
            'tipo' => 'required|string|max:40',
            'ano' => 'nullable|integer',
            'quantidade' => 'required|integer',
            'dimensoes' => 'nullable|string|max:100',
            'informacoes' => 'nullable|string',
            'link' => 'nullable|string',
            'local_de_armazenamento' => 'nullable|string|max:100',
        ]);

        $userDTO = ProdutoDTO::fromValidatedData($validatedData);

        return $userDTO;
    }
}