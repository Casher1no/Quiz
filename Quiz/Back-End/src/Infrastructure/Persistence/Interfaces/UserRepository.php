<?php

namespace Casher1no\Printful\Infrastructure\Persistence\Interfaces;

use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\UserId;

interface UserRepository
{
    public function getUser(UserId $id);

    public function getUserAnswers(UserId $id, TestId $testId);
}