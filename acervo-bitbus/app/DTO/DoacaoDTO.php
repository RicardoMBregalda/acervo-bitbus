<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class DoacaoDTO extends BaseDTO
{
    public readonly int $tipo_doacao;
    public readonly float $valor;
    public readonly string $detalhes;
    public readonly int $participante_id;

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
            'tipo_doacao' => $validatedData['tipo_doacao'],
            'valor' => $validatedData['valor'],
            'detalhes' => $validatedData['detalhes'],
            'participante_id' => $validatedData['participante_id'],
        ]);
    }

}