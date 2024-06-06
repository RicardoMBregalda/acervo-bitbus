<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'tipo',
        'ano',
        'quantidade',
        'dimensoes',
        'informacoes',
        'link',
        'local_de_armazenamento',
    ];
}
