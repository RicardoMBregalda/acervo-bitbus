<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\DTO\FeedbackDTO;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function index(Request $request)
    {
        $search = $request->input('avaliacao');

        $query = Feedback::query();

        if ($search) {
            $query->where('avaliacao', 'LIKE', "%{$search}%");
        }

        $feedbacks = $query->get();

        return response()->json(['data' => $feedbacks]);
    }

    public function store(Request $request)
    {
        $feedbackDTO = $this->createFeedbackDTO($request);

        $feedback = $this->feedbackService->create($feedbackDTO);


        if (!$feedback) {
            return response()->json(['message' => 'Feedback not created, review your data!'], 500);
        }

        return response()->json(['message' => 'Feedback created successfully!', 'data' => $feedback]);
    }

    public function show(int $id)
    {
        $feedback = $this->feedbackService->find($id);

        if (!$feedback) {
            return response()->json(['message' => 'Feedback not found!'], 404);
        }

        return response()->json(['data' => $feedback]);
    }

    public function update(Request $request, int $id)
    {
        $feedbackDTO = $this->createFeedbackDTO($request);

        $user = $this->feedbackService->update($id, $feedbackDTO);

        if (!$user) {
            return response()->json(['message' => 'Feedback not updated, review your data!'], 404);
        }

        return response()->json(['message' => 'Feedback updated successfully!', 'data' => $user]);
    }


    public function delete($id)
    {
        $result = $this->feedbackService->delete($id);

        if (!$result) {
            return response()->json(['message' => 'Feedback not found!'], 404);
        }

        return response()->json(['message' => 'Feedback deleted successfully!']);
    }

    private function createFeedbackDTO(Request $request): FeedbackDTO
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'avaliacao' => 'required|integer',
            'descricao' => 'required|string|max:255',
        ]);

        $userDTO = FeedbackDTO::fromValidatedData($validatedData);

        return $userDTO;
    }
}