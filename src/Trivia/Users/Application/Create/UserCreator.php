<?php

declare(strict_types=1);

namespace FakeCompany\Trivia\Users\Application\Create;

use FakeCompany\Trivia\Shared\Domain\UserId;
use FakeCompany\Trivia\Users\Domain\User;
use FakeCompany\Trivia\Users\Domain\UserRepository;

final class UserCreator
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserId $id, string $name)
    {
        $user = User::create($id, $name);

        $this->repository->save($user);
    }
}