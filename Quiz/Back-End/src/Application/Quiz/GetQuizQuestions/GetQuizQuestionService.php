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

    public function __invoke(GetQuizQuestionRequest $request): array
    {
        // Quiz id
        $id = $request->id();

        /*
         * Gets quiz questions with answers
         */

        $questions = $this->repository->getQuestions(new TestId($id));
        $questionIds = [];
        foreach ($questions as $question) {
            $questionIds[] = $question['id'];
        }

        $answers = $this->repository->getAnswers($questionIds);

        $result = [];

        foreach ($questions as $question) {

            $questionAnswers = [];
            $questionAnswers = array_values(array_filter($answers, function ($a) use ($question) {
                return $question['id'] === $a['question_id'];
            }));


            $result['questions'][] = [
                'question_id' => $question['id'],
                'question' => $question['name'],
                'answers' => $questionAnswers,
            ];
        }

        return $result;
    }
}