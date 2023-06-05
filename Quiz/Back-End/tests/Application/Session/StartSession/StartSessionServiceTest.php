<?php

namespace Application\Session\StartSession;

use Casher1no\Printful\Application\Session\StartSession\StartSessionRequest;
use Casher1no\Printful\Application\Session\StartSession\StartSessionService;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;
use Casher1no\Printful\Models\User;
use PHPUnit\Framework\TestCase;

class StartSessionServiceTest extends TestCase
{
    public function testSessionStartShouldReturnData()
    {
        $userRepository = $this->createMock(UserRepository::class);


        $userRepository->expects($this->any())
            ->method('getUserByName')
            ->willReturn([['id' => 1, 'name' => 'Tom']]);

        $userRepository->expects($this->any())->method('insertUser');

        $service = new StartSessionService($userRepository);

        $result = $service->__invoke(new StartSessionRequest('Tom'));
        $expected = [
            'username' => 'Tom',
            'id' => 1
        ];

        $this->assertEquals($expected, $result);
    }

    public function testShouldReturnError()
    {
        $userRepository = $this->createMock(UserRepository::class);
        $service = new StartSessionService($userRepository);

        $result = $service->__invoke(new StartSessionRequest(''));
        $expected = ['error' => 'no username'];

        $this->assertEquals($expected, $result);
    }
}
