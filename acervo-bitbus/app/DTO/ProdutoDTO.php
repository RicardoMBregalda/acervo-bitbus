<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class ProdutoDTO extends BaseDTO
{
    public readonly string $codigo;
    public readonly string $nome;
    public readonly string $tipo;
    public readonly int $ano;
    public readonly int $quantidade;
    public readonly string $dimensoes;
    public readonly string $informacoes;
    public readonly string|null $link;
    public readonly string $local_de_armazenamento;


    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public static function fromValidatedData(array $validatedData): self
    {
        return new self([
            'codigo' => $validatedData['codigo'],
            'nome' => $validatedData['nome'],
            'tipo' => $validatedData['tipo'],
            'ano' => $validatedData['ano'],
            'quantidade' => $validatedData['quantidade'],
            'dimensoes' => $validatedData['dimensoes'],
            'informacoes' => $validatedData['informacoes'],
            'link' => $validatedData['link'],
            'local_de_armazenamento' => $validatedData['local_de_armazenamento'],
        ]);
    }

}