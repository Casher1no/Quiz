<?php

namespace Casher1no\Printful\Application\Quiz\GetQuizResults;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;
use Casher1no\Printful\Models\QuizId;
use Casher1no\Printful\Models\User;

class GetQuizResultsService
{
    private QuizRepository $quizRepository;
    private UserRepository $userRepository;

    public function __construct(QuizRepository $quizRepository, UserRepository $userRepository)
    {
        $this->quizRepository = $quizRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(GetQuizResultRequest $request): array
    {
        $user = new User($request->userId());
        $quizId = new QuizId($request->quizId());

        $results = $this->quizRepository->getResults($user, $quizId);
        $user = $this->userRepository->getUser($user);

        return [
            'user' => $user[0],
            'results' => $results[0]
        ];
    }

}