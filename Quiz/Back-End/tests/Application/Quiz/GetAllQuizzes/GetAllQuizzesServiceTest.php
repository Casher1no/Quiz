<?php

namespace Application\Quiz\GetAllQuizzes;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use PHPUnit\Framework\TestCase;

class GetAllQuizzesServiceTest extends TestCase
{
    public function testShouldReturnQuizzes()
    {
        $quizzes = [
            ['id' => 1, 'name' => 'test1'],
            ['id' => 2, 'name' => 'test2'],
            ['id' => 3, 'name' => 'test3'],
        ];

        $repository = $this->createMock(QuizRepository::class);
        $repository->expects($this->once())
            ->method('getQuizzes')
            ->willReturn($quizzes);


        $service = new GetAllQuizzesService($repository);

        $result = $service->__invoke();
        $expected = ['questions' => $quizzes];


        $this->assertEquals($expected, $result);
    }
}
