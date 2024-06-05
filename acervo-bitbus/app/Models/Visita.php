<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'organizador',
        'endereco',
        'complemento',
        'descricao',
        'data_inicio',
        'data_fim',
    ];
}