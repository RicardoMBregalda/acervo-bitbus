<?php
namespace App\Services;

use App\DTO\DoacaoDTO;
use App\Models\Participante;
use App\Models\Visita;
use App\DTO\ParticipanteDTO;
use App\Models\Doacao;

class DoacaoService {

    private ParticipanteService $participanteService;

    public function __construct(ParticipanteService $participanteService)
    {
        $this->participanteService = $participanteService;
    }

   public function create(DoacaoDTO $data): Doacao
    {
        $doacao = new Doacao();
        $doacao->tipo_doacoa = $data->tipo_doacao;
        $doacao->valor = $data->valor;
        $doacao->detalhes = $data->detalhes;
        $doacao->participante_id = $data->participante_id;
        $doacao->save();

        return $doacao;
    }

    public function index(): array
    {
        return Doacao::all()->toArray();
    }

    public function find(int $id): Doacao
    {
        return Doacao::with(['produtos', 'participantes'])->findOrFail($id);
    }

    public function update(int $id, DoacaoDTO $data): Doacao
    {
        $doacao = Doacao::findOrFail($id);

        if (!$doacao) {
            return false;
        }

        $doacao->update($data->toArray());

        return $doacao;
    }

    public function delete(int $id): bool
    {
        $doacao = Doacao::findOrFail($id);

        if (!$doacao) {
            return false;
        }       

        $result = $doacao->delete();
        
        return $result;
    }

    public function saveProdutosDoacao(Doacao $doacao, array $produtosLista): void
    {
        foreach ($produtosLista as $produto) {
            $doacao->produtos()->attach($produto['id']);
        }
    } 

    public function updateProdutosDoacao(Doacao $doacao, array $produtosLista): void
    {
        $doacao->produtos()->detach();
        $this->saveProdutosDoacao($doacao, $produtosLista);
    }

}