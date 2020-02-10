<?php

declare(strict_types=1);

namespace FakeCompany\Trivia\Users\Domain;

use FakeCompany\Trivia\Shared\Domain\UserId;

final class User
{
    private UserId $id;
    private string $name;

    public function __construct(UserId $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public static function create(UserId $id, string $name): self
    {
        return new self($id, $name);
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}