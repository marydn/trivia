<?php

declare(strict_types=1);

namespace FakeCompany\Trivia\Users\Infrastructure\Persistence;

use FakeCompany\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use FakeCompany\Trivia\Shared\Domain\UserId;
use FakeCompany\Trivia\Users\Domain\User;
use FakeCompany\Trivia\Users\Domain\UserNotFound;
use FakeCompany\Trivia\Users\Domain\UserRepository;

final class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    /**
     * @throws UserNotFound
     */
    public function find(UserId $userId): User
    {
        $user = $this->repository(User::class)->find($userId);
        if (!$user) {
            throw new UserNotFound;
        }

        return $user;
    }

    public function save(User $user): void
    {
        $this->persist($user);
    }
}