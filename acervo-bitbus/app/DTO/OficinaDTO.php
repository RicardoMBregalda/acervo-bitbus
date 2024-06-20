<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class OficinaDTO extends BaseDTO
{
    public readonly string $organizador;
    public readonly string $endereco;
    public readonly string $cidade;
    public readonly string $estado;
    public readonly string $descricao;
    public readonly string $data_inicio;
    public readonly string $data_fim;

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