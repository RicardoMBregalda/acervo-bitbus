<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class VisitaDTO implements BaseDTO
{
    public readonly string $organizador;
    public readonly string $endereco;
    public readonly string $complemento;
    public readonly string $descricao;
    public readonly string $data_inicio;
    public readonly string $data_fim;

    public static function fromValidatedData(array $validatedData): self
    {
        return new self([
            'organizador' => $validatedData['organizador'],
            'endereco' => $validatedData['endereco'],
            'complemento' => $validatedData['complemento'],
            'descricao' => $validatedData['descricao'],
            'data_inicio' => $validatedData['data_inicio'],
            'data_fim' => $validatedData['data_fim'],
        ]);
    }

}