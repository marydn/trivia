<?php

declare(strict_types=1);

namespace FakeCompany\Trivia\Users\Application\Find;

use FakeCompany\Trivia\Shared\Domain\UserId;
use FakeCompany\Trivia\Users\Domain\User;
use FakeCompany\Trivia\Users\Domain\UserNotFound;
use FakeCompany\Trivia\Users\Domain\UserRepository;

final class UserFinder
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(UserId $userId): User
    {
        $user = $this->repository->find($userId);
        if (!$user) {
            throw new UserNotFound;
        }

        return $user;
    }
}