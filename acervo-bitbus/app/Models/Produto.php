<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visita;

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

    public function visitas()
    {
        return $this->belongsToMany(Visita::class, 'visita_produtos', 'produto_id', 'visita_id');
    }

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class, 'oficina_produtos', 'produto_id', 'oficina_id');
    }
}
