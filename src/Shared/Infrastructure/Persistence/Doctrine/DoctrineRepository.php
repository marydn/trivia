<?php

declare(strict_types=1);

namespace FakeCompany\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

abstract class DoctrineRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    protected function persist($entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush();
    }

    protected function remove($entity): void
    {
        $this->entityManager()->remove($entity);
        $this->entityManager()->flush();
    }

    protected function repository($entityClass): ObjectRepository
    {
        return $this->entityManager->getRepository($entityClass);
    }
}