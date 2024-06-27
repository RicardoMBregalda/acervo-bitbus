<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\DTO\ParticipanteDTO;
use App\Services\ParticipanteService;

class ParticipanteController extends Controller
{
    private ParticipanteService $participanteService;

    public function __construct(ParticipanteService $participanteService)
    {
        $this->participanteService = $participanteService;
    }

    public function index(Request $request)
    {
        $search = $request->input('nome');

        $query = Participante::query();

        if ($search) {
            $query->where('nome', 'LIKE', "%{$search}%");
        }

        $participantes = $query->get();

        return response()->json(['data' => $participantes]);
    }

    public function store(Request $request)
    {
        $participanteDTO = $this->createParticipanteDTO($request);

        $participante = $this->participanteService->create($participanteDTO);

        if (!$participante) {
            return response()->json(['message' => 'Participante not created, review your data!'], 500);
        }

        return response()->json(['message' => 'Participante created successfully!', 'data' => $participante]);
    }

    public function show(int $id)
    {
        $participante = $this->participanteService->find($id);

        if (!$participante) {
            return response()->json(['message' => 'Participante not found!'], 404);
        }

        return response()->json(['data' => $participante]);
    }

    public function update(Request $request, int $id)
    {
        $participanteDTO = $this->createParticipanteDTO($request);

        $user = $this->participanteService->update($id, $participanteDTO);

        if (!$user) {
            return response()->json(['message' => 'Participante not updated, review your data!'], 404);
        }

        return response()->json(['message' => 'Participante updated successfully!', 'data' => $user]);
    }


    public function delete($id)
    {
        $result = $this->participanteService->delete($id);

        if (!$result) {
            return response()->json(['message' => 'Participante not found!'], 404);
        }

        return response()->json(['message' => 'Participante deleted successfully!']);
    }

    private function createParticipanteDTO(Request $request): ParticipanteDTO
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:2',
            'documento' => 'required|string|max:15',
            'email' => 'required|string|max:255',
        ]);

        $userDTO = ParticipanteDTO::fromValidatedData($validatedData);

        return $userDTO;
    }
}