<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'tipo',
        'documento',
        'email',
    ];

    public function visitas()
    {
        return $this->belongsToMany(Visita::class, 'visita_produtos', 'produto_id', 'visita_id');
    }
}
