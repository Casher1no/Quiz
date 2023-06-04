<?php

namespace Casher1no\Printful\Infrastructure\Persistence;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use Casher1no\Printful\Models\AnswerId;
use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\User;

class MySqlQuizRepository implements QuizRepository
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getQuizzes(): array
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('quiz')
            ->execute()
            ->fetchAll();


    }

    public function getQuestions(TestId $testId): array
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('question')
            ->where('test_id = ?')
            ->setParameter(0, $testId->id())
            ->execute()
            ->fetchAll();
    }

    public function getAnswers(array $questionIds): array
    {

        $db = $this->repository::connection();

        $sql = "SELECT * FROM question_answer WHERE question_id in (";

        $sql .= implode(',', $questionIds);

        $sql .= ")";

        return $db->prepare($sql)
            ->executeQuery()
            ->fetchAll();
    }

    public function answerQuestion(AnswerId $answerId, User $user): void
    {
        $db = $this->repository::connection();
        $db->createQueryBuilder()
            ->insert('user_answer')
            ->setValue('user_id', '?')
            ->setValue('question_answer_id', '?')
            ->setParameter(0, $user->id())
            ->setParameter(1, $answerId->id())
            ->execute();
    }
}