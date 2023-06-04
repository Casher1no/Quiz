<?php

namespace Casher1no\Printful\Infrastructure\Persistence;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\UserId;

class MySqlUserRepository implements UserRepository
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getUser(UserId $id)
    {
        // TODO: Implement getUser() method.
    }

    public function getUserAnswers(UserId $id, TestId $testId)
    {
        // TODO: Implement getUserAnswers() method.
    }
}