<?php
namespace App\Services;

use App\DTO\DoacaoDTO;
use App\Models\Participante;
use App\Models\Visita;
use App\DTO\ParticipanteDTO;
use App\DTO\ProdutoDTO;
use App\Models\Doacao;

class DoacaoService {

    private ParticipanteService $participanteService;
    private ProdutoService $produtoService;

    public function __construct(ParticipanteService $participanteService, ProdutoService $produtoService)
    {
        $this->participanteService = $participanteService;
        $this->produtoService = $produtoService;
    }

    public function create(DoacaoDTO $data): Doacao
    {
        $doacao = new Doacao();
        $doacao->tipo_doacao = $data->tipo_doacao;
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
        return Doacao::with(['produtos', 'participante'])->findOrFail($id);
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
            if (!isset($produto['id'])) {
                $produtoDTO = ProdutoDTO::fromValidatedData($produto);
                $prod = $this->produtoService->create($produtoDTO);
                $doacao->produtos()->attach($prod->id);
            } else {
                $doacao->produtos()->attach($produto['id']);
            }
        }
    } 

    public function updateProdutosDoacao(Doacao $doacao, array $produtosLista): void
    {
        $doacao->produtos()->detach();
        $this->saveProdutosDoacao($doacao, $produtosLista);
    }

    public function saveParticipanteDoacao(int $participante_id, array $participante): Participante
    {
        if ($participante_id == 0) {
            $participanteDTO = ParticipanteDTO::fromValidatedData($participante[0]);
            $part = $this->participanteService->create($participanteDTO);
            return $part;
        } 
    }

}