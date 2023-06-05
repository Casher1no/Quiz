<?php

namespace Casher1no\Printful\Application\Session\StartSession;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;

class StartSessionService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(StartSessionRequest $request): array
    {
        if (empty($request->username())) {
            return ['error' => 'no username'];
        }

        $name = $request->username();

        $user = $this->repository->getUserByName($name);
        if (empty($user)) {
            $this->repository->insertUser($request->username());
            $_SESSION['id'] = $this->repository->getUserByName($name)[0]['id'];
        } else {
            $_SESSION['id'] = $user[0]['id'];
        }

        $_SESSION['username'] = $request->username();

        return [
            'username' => $_SESSION['username'],
            'id' => $_SESSION['id']
        ];
    }
}