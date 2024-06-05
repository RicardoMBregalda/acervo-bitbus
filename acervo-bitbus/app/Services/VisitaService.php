<?php
namespace App\Services;

use App\DTO\VisitaDTO;
use App\Models\Visita;

class VisitaService {

   public function create(VisitaDTO $data): Visita
    {
        $visita = new Visita();
        $visita->organizador = $data->organizador;
        $visita->endereco = $data->endereco;
        $visita->complemento = $data->complemento;
        $visita->descricao = $data->descricao;
        $visita->data_inicio = $data->data_inicio;
        $visita->data_fim = $data->data_fim;
        $visita->save();

        return $visita;
    }

    public function find(int $id): Visita
    {
        return Visita::findOrFail($id);
    }

    public function update(int $id, VisitaDTO $data): Visita
    {
        $user = Visita::findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete(int $id): bool
    {
        $user = Visita::findOrFail($id);
        $result = $user->delete();
        
        return $result;
    }

}