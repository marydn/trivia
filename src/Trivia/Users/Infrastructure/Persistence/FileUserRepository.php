<?php

declare(strict_types=1);

namespace FakeCompany\Trivia\Users\Infrastructure\Persistence;

use FakeCompany\Trivia\Shared\Domain\UserId;
use FakeCompany\Trivia\Users\Domain\User;
use FakeCompany\Trivia\Users\Domain\UserNotFound;
use FakeCompany\Trivia\Users\Domain\UserRepository;

final class FileUserRepository implements UserRepository
{
    private const FILE_PATH = __DIR__ . '/../../../../../data/db/files/users';

    public function find(UserId $userId): User
    {
        $user = file_exists($this->fileName($userId->value()));
        if (!$user) {
            throw new UserNotFound();
        }

        return unserialize(file_get_contents($this->fileName($userId->value())));
    }

    public function save(User $user): void
    {
        file_put_contents($this->fileName($user->getId()->value()), serialize($user));
    }

    private function fileName(string $id): string
    {
        return sprintf('%s%s.repository', self::FILE_PATH, $id);
    }
}