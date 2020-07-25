<?php

namespace App\Adapter\Doctrine\Repository;

use App\Entity\Interest;
use App\Gateway\InterestGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class InterestRepository
 * @package App\Adapter\InMemory\Repository
 */
class InterestRepository extends ServiceEntityRepository implements InterestGateway
{
    /**
     * OfferRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Interest::class);
    }

    /**
     * @inheritDoc
     */
    public function send(Interest $interest): void
    {
        $this->_em->persist($interest);
        $this->_em->flush();
    }
}
