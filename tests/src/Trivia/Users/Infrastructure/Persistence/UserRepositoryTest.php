<?php

declare(strict_types=1);

namespace FakeCompany\Tests\src\Trivia\Users\Infrastructure\Persistence;

use FakeCompany\Trivia\Shared\Domain\UserId;
use FakeCompany\Trivia\Users\Domain\User;
use FakeCompany\Trivia\Users\Domain\UserNotFound;
use FakeCompany\Trivia\Users\Domain\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class UserRepositoryTest extends WebTestCase
{
    abstract public function getRepository(): UserRepository;

    protected function service($id)
    {
        return self::$container->get($id);
    }

    protected function parameter($parameter)
    {
        return self::$container->getParameter($parameter);
    }

    protected function createRandomUser(): User
    {
        return new User(UserId::random(), 'Jhon Doe '.mt_rand(999, 1000));
    }

    /** @test */
    public function it_should_save_a_user(): void
    {
        $user = $this->createRandomUser();

        $this->getRepository()->save($user);

        $this->assertTrue(true);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $user = $this->createRandomUser();

        $this->getRepository()->save($user);

        $found = $this->getRepository()->find($user->getId());

        $this->assertEquals($user, $found);
    }

    /** @test */
    public function it_should_throw_a_not_found_user_exception(): void
    {
        $this->expectException(UserNotFound::class);

        $this->getRepository()->find(UserId::random());
    }
}