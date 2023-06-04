<?php

namespace Casher1no\Printful\Infrastructure\Persistence;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\User;

class MySqlUserRepository implements UserRepository
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getUser(User $user): array
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('user')
            ->where('id = ?')
            ->setParameter(0, $user->id())
            ->execute()
            ->fetchAll();
    }

    public function getUserAnswers(User $user, TestId $testId): array
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('user_answer')
            ->where('id = :id')
            ->andWhere('test_id = :testId')
            ->setParameters([
                'id' => $user->id(),
                'testId' => $testId->id(),
            ])
            ->execute()
            ->fetchAll();
    }

    public function insertUser(string $name): void
    {
        $db = $this->repository::connection();
        $db->createQueryBuilder()
            ->insert('user')
            ->setValue('name', '?')
            ->setParameter(0, $name)
            ->execute();
    }

    public function getUserByName(string $name): array
    {
        $db = $this->repository::connection();
        return $db->createQueryBuilder()
            ->select("*")
            ->from('user')
            ->where('name = ?')
            ->setParameter(0, $name)
            ->execute()
            ->fetchAll();
    }
}