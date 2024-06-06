<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class VisitaDTO extends BaseDTO
{
    public string $organizador;
    public string $endereco;
    public string $cidade;
    public string $estado;
    public string $descricao;
    public string $data_inicio;
    public string $data_fim;

    public static function fromValidatedData(array $validatedData): self
    {
        return new self([
            'organizador' => $validatedData['organizador'],
            'endereco' => $validatedData['endereco'],
            'cidade' => $validatedData['cidade'],
            'estado' => $validatedData['estado'],
            'descricao' => $validatedData['descricao'],
            'data_inicio' => $validatedData['data_inicio'],
            'data_fim' => $validatedData['data_fim'],
        ]);
    }

}