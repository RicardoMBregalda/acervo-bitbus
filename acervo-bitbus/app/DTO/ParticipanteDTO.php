<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class ParticipanteDTO extends BaseDTO
{
    public readonly string $nome;
    public readonly string $tipo;
    public readonly string $documento;
    public readonly string $email;
    
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
            'nome' => $validatedData['nome'],
            'tipo' => $validatedData['tipo'],
            'documento' => $validatedData['documento'],
            'email' => $validatedData['email'],
        ]);
    }

}