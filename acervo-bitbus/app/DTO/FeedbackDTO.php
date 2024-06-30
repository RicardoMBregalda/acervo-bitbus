<?php

namespace App\DTO;

use App\Core\DTO\BaseDTO;

class FeedbackDTO extends BaseDTO
{
    public readonly string $nome;
    public readonly string $email;
    public readonly int $avaliacao;
    public readonly string $descricao;

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
            'email' => $validatedData['email'],
            'avaliacao' => $validatedData['avaliacao'],
            'descricao' => $validatedData['descricao'],
        ]);
    }

}