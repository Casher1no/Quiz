<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\AnswerId;
use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\QuizId;
use Casher1no\Printful\Models\User;

class UserAnswerService
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserAnswerRequest $request): void
    {
        $user = new User($request->userId());
        $quizId = new QuizId($request->quizId());
        $question = $request->questions();
        $answers = $request->answers();

        // Check how many answers are correct
        $answeredQuestions = 0;

        $questions = count($question);
        for ($i = 0; $i < $questions; $i++) {
            $maxAnswers = 0;
            $answered = 0;

            foreach ($question[$i]['answers'] as $q) {
                if ($q['is_correct'] == 1) {
                    $maxAnswers++;
                }
                if (in_array($q['answer'], $answers[$i]) && $q['is_correct'] == 1) {
                    $answered++;
                }
            }
            if ($maxAnswers == $answered) {
                $answeredQuestions++;
            }
        }

        /*
         * Saves answer results in Database
         */

        $this->repository->answerQuestion($answeredQuestions, $questions, $quizId, $user);
    }
}