<?php

namespace FakeCompany\Trivia\Users\Domain;

use FakeCompany\Trivia\Shared\Domain\UserId;

interface UserRepository
{
    /**
     * @throws UserNotFound
     */
    public function find(UserId $userId): User;
    public function save(User $user): void;
}