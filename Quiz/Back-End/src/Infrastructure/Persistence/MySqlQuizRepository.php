<?php

namespace Casher1no\Printful\Infrastructure\Persistence;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\TestId;

class MySqlQuizRepository implements QuizRepository
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getQuizzes()
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('quiz')
            ->execute()
            ->fetchAll();


    }

    public function getQuestions(TestId $testId)
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

    public function getAnswers(QuestionId $questionId)
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('question_answer')
            ->where('question_id = ?')
            ->setParameter(0, $questionId->id())
            ->execute()
            ->fetchAll();
    }
}