<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visita;
use App\DTO\VisitaDTO;
use App\Services\VisitaService;

class UserController extends Controller
{
    private VisitaService $visitaService;

    public function __construct(VisitaService $visitaService)
    {
        $this->visitaService = $visitaService;
    }

    public function index()
    {
        $visitas = $this->visitaService->index();
        
        return response()->json(['data' => $visitas]);
    }

    public function store(Request $request)
    {
        $visitaDTO = $this->createVisitaDTO($request);

        $visita = $this->visitaService->create($visitaDTO);

        if (!$visita) {
            return response()->json(['message' => 'Visita not created, review your data!'], 500);
        }

        return response()->json(['message' => 'Visita created successfully!', 'data' => $visita]);
    }

    public function show(int $id)
    {
        $visita = $this->visitaService->find($id);

        if (!$visita) {
            return response()->json(['message' => 'Visita not found!'], 404);
        }

        return response()->json(['data' => $visita]);
    }

    public function update(Request $request, int $id)
    {
        $visitaDTO = $this->createVisitaDTO($request);

        $user = $this->visitaService->update($id, $visitaDTO);

        if(!$user) {
            return response()->json(['message' => 'Visita not updated, review your data!'], 404);
        }

        return response()->json(['message' => 'Visita updated successfully!', 'data' => $user]);
    }

    
    public function delete($id)
    {
        $result = $this->visitaService->delete($id);
        
        if (!$result) {
            return response()->json(['message' => 'Visita not found!'], 404);
        }
        
        return response()->json(['message' => 'Visita deleted successfully!']);
    }
    
    private function createVisitaDTO(Request $request): VisitaDTO 
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $userDTO = VisitaDTO::fromValidatedData($validatedData);

        return $userDTO;
    }
}