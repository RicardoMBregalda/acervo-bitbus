<?php
namespace App\Services;

use App\DTO\ParticipanteDTO;
use App\Models\Participante;

class ParticipanteService {

   public function create(ParticipanteDTO $data): Participante
    {
        $participante = new Participante();
        $participante->nome = $data->nome;
        $participante->tipo = $data->tipo;
        $participante->documento = $data->documento;
        $participante->email = $data->email;
        $participante->save();

        return $participante;
    }

    public function index(): array
    {
        return Participante::all()->toArray();
    }

    public function find(int $id): Participante
    {
        return Participante::findOrFail($id);
    }

    public function update(int $id, ParticipanteDTO $data): Participante
    {
        $participante = Participante::findOrFail($id);

        if (!$participante) {
            return false;
        }

        $participante->update($data->toArray());

        return $participante;
    }

    public function delete(int $id): bool
    {
        $participante = Participante::findOrFail($id);

        if (!$participante) {
            return false;
        }       

        $result = $participante->delete();
        
        return $result;
    }

}