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
        return $this->belongsToMany(Visita::class, 'visita_participantes', 'participante_id', 'visita_id');
    }

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class, 'oficina_participantes', 'participante_id', 'oficina_id');
    }

    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }
}
