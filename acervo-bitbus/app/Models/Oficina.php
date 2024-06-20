<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
use App\Models\Participante;

class Oficina extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'organizador',
        'endereco',
        'cidade',
        'estado',
        'descricao',
        'data_inicio',
        'data_fim',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'oficina_produtos', 'oficina_id', 'produto_id');
    }
    
    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'oficina_participantes', 'oficina_id', 'participante_id');
    }
}
