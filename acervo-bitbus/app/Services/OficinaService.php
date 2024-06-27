<?php
namespace App\Services;

use App\DTO\OficinaDTO;
use App\Models\Participante;
use App\Models\Oficina;
use App\DTO\ParticipanteDTO;

class OficinaService {

    private ParticipanteService $participanteService;

    public function __construct(ParticipanteService $participanteService)
    {
        $this->participanteService = $participanteService;
    }

   public function create(OficinaDTO $data): Oficina
    {
        $oficina = new Oficina();
        $oficina->organizador = $data->organizador;
        $oficina->endereco = $data->endereco;
        $oficina->cidade = $data->cidade;
        $oficina->estado = $data->estado;
        $oficina->descricao = $data->descricao;
        $oficina->data_inicio = $data->data_inicio;
        $oficina->data_fim = $data->data_fim;
        $oficina->save();

        return $oficina;
    }

    public function index(): array
    {
        return Oficina::all()->toArray();
    }

    public function find(int $id): Oficina
    {
        return Oficina::with(['produtos', 'participantes'])->findOrFail($id);
    }

    public function update(int $id, OficinaDTO $data): Oficina
    {
        $oficina = Oficina::findOrFail($id);

        if (!$oficina) {
            return false;
        }

        $oficina->update($data->toArray());

        return $oficina;
    }

    public function delete(int $id): bool
    {
        $oficina = Oficina::findOrFail($id);

        if (!$oficina) {
            return false;
        }       

        $result = $oficina->delete();
        
        return $result;
    }

    public function saveProdutosOficina(Oficina $Oficina, array $produtosLista): void
    {
        foreach ($produtosLista as $produto) {
            $Oficina->produtos()->attach($produto['id']);
        }
    } 

    public function saveParticipantesOficina(Oficina $oficina, array $participantesLista): void
    {
        foreach ($participantesLista as $participante) {
            if (!isset($participante['id'])) {
                $participanteDTO = ParticipanteDTO::fromValidatedData($participante);
                $part = $this->participanteService->create($participanteDTO);
                $oficina->participantes()->attach($part->id);
            } else {
                $oficina->participantes()->attach($participante['id']);
            }
        }
    }

    public function updateProdutosOficina(Oficina $oficina, array $produtosLista): void
    {
        $oficina->produtos()->detach();
        $this->saveProdutosOficina($oficina, $produtosLista);
    }

    public function updateParticipantesOficina(Oficina $oficina, array $participantesLista): void
    {
        $oficina->participantes()->detach();
        $this->saveParticipantesOficina($oficina, $participantesLista);
    }

}