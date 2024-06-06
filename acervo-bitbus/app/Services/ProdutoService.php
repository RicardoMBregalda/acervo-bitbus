<?php
namespace App\Services;

use App\DTO\ProdutoDTO;
use App\Models\Produto;

class ProdutoService
{

    public function create(ProdutoDTO $data): Produto
    {
        $produto = new Produto();
        $produto->codigo = $data->codigo;
        $produto->nome = $data->nome;
        $produto->tipo = $data->tipo;
        $produto->ano = $data->ano;
        $produto->quantidade = $data->quantidade;
        $produto->dimensoes = $data->dimensoes;
        $produto->informacoes = $data->informacoes;
        $produto->link = $data->link;
        $produto->local_de_armazenamento = $data->local_de_armazenamento;
        $produto->save();

        return $produto;
    }

    public function index(): array
    {
        return Produto::all()->toArray();
    }

    public function find(int $id): Produto
    {
        return Produto::findOrFail($id);
    }

    public function update(int $id, ProdutoDTO $data): Produto
    {
        $produto = Produto::findOrFail($id);

        if (!$produto) {
            return false;
        }

        $produto->update($data->toArray());

        return $produto;
    }

    public function delete(int $id): bool
    {
        $produto = Produto::findOrFail($id);

        if (!$produto) {
            return false;
        }

        $result = $produto->delete();

        return $result;
    }

}