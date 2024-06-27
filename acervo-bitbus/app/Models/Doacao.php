<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_doacao',
        'valor',
        'detalhes',
        'participante_id', 
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'doacao_produtos', 'doacao_id', 'produto_id');
    }

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }
}
