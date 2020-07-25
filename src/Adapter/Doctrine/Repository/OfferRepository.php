<?php

namespace App\Adapter\Doctrine\Repository;

use App\Entity\Offer;
use App\Entity\Recruiter;
use App\Gateway\OfferGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class OfferRepository
 * @package App\Adapter\Doctrine\Repository
 */
class OfferRepository extends ServiceEntityRepository implements OfferGateway
{
    /**
     * OfferRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): Offer
    {
        return parent::find(["id" => $id]);
    }

    /**
     * @inheritDoc
     */
    public function publish(Offer $offer): void
    {
        $this->_em->persist($offer);
        $this->_em->flush();
    }
}
