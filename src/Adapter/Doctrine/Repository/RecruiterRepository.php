<?php

namespace App\Adapter\Doctrine\Repository;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recruiter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recruiter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recruiter[]    findAll()
 * @method Recruiter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecruiterRepository extends ServiceEntityRepository implements RecruiterGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recruiter::class);
    }

    public function register(Recruiter $recruiter): void
    {
        // TODO: Implement register() method.
    }

}
