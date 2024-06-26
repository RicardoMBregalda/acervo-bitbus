<?php

namespace App\Core\DTO;

abstract class BaseDTO
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}