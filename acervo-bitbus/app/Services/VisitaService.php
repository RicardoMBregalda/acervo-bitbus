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
        $visita->cidade = $data->cidade;
        $visita->estado = $data->estado;
        $visita->descricao = $data->descricao;
        $visita->data_inicio = $data->data_inicio;
        $visita->data_fim = $data->data_fim;
        $visita->save();

        return $visita;
    }

    public function index(): array
    {
        return Visita::all()->toArray();
    }

    public function find(int $id): Visita
    {
        return Visita::findOrFail($id);
    }

    public function update(int $id, VisitaDTO $data): Visita
    {
        $visita = Visita::findOrFail($id);

        if (!$visita) {
            return false;
        }

        $visita->update($data->toArray());

        return $visita;
    }

    public function delete(int $id): bool
    {
        $visita = Visita::findOrFail($id);

        if (!$visita) {
            return false;
        }       

        $result = $visita->delete();
        
        return $result;
    }

}