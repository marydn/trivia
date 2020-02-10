<?php

declare(strict_types=1);

namespace FakeCompany\Tests\src\Trivia\Users\Infrastructure\Persistence;

use FakeCompany\Trivia\Users\Domain\UserRepository;
use FakeCompany\Trivia\Users\Infrastructure\Persistence\FileUserRepository;

final class FileUserRepositoryTest extends UserRepositoryTest
{
    public function getRepository(): UserRepository
    {
        return new FileUserRepository();
    }
}