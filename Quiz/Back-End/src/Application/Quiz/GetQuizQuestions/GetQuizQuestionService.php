<?php

namespace Casher1no\Printful\Application\Quiz\GetQuizQuestions;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\TestId;

class GetQuizQuestionService
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->repository = $quizRepository;
    }

    public function __invoke(): array
    {
        $id = $_POST['quiz_id'];

        $questions = $this->repository->getQuestions(new TestId($id));
        $questionIds = [];
        foreach ($questions as $question) {
            $questionIds[] = $question['id'];
        }

        $answers = $this->repository->getAnswers($questionIds);

        $result = [];

        foreach ($questions as $question) {

            $questionAnswers = [];
            $questionAnswers[] = array_filter($answers, function ($a) use ($question) {
                if ($question['id'] === $a['question_id']) return $a;
            });

            $result['questions'][] = [
                'question' => $question['name'],
                'answers' => $questionAnswers,
            ];
        }

        return $result;
    }
}