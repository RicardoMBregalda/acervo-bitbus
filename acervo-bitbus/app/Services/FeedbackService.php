<?php
namespace App\Services;

use App\DTO\FeedbackDTO;
use App\Models\Feedback;

class FeedbackService
{

    public function create(FeedbackDTO $data): Feedback
    {
        $feedback = new Feedback();
        $feedback->nome = $data->nome;
        $feedback->email = $data->email;
        $feedback->avaliacao = $data->avaliacao;
        $feedback->descricao = $data->descricao;
        $feedback->save();

        return $feedback;
    }

    public function index(): array
    {
        return Feedback::all()->toArray();
    }

    public function find(int $id): feedback
    {
        return Feedback::findOrFail($id);
    }

    public function update(int $id, FeedbackDTO $data): Feedback
    {
        $feedback = Feedback::findOrFail($id);

        if (!$feedback) {
            return false;
        }

        $feedback->update($data->toArray());

        return $feedback;
    }

    public function delete(int $id): bool
    {
        $feedback = Feedback::findOrFail($id);

        if (!$feedback) {
            return false;
        }

        $result = $feedback->delete();

        return $result;
    }

}