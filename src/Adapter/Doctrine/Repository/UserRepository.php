<?php

namespace App\Adapter\Doctrine\Repository;

use App\Entity\User;
use App\Gateway\UserGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserRepository
 * @package App\Adapter\Doctrine\Repository
 */
class UserRepository extends ServiceEntityRepository implements UserGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @inheritDoc
     */
    public function findByEmail(string $email): ?UserInterface
    {
        // TODO: Implement findByEmail() method.
    }
}
