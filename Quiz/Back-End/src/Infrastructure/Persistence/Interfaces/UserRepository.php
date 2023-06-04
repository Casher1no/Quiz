<?php

namespace Casher1no\Printful\Infrastructure\Persistence\Interfaces;

use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\User;

interface UserRepository
{
    public function getUser(User $user): array;

    public function getUserByName(string $name): array;

    public function getUserAnswers(User $user, TestId $testId): array;

    public function insertUser(string $name): void;
}