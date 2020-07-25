<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\Offer;
use App\Gateway\OfferGateway;

/**
 * Class OfferRepository
 * @package App\Adapter\InMemory\Repository
 */
class OfferRepository implements OfferGateway
{
    /**
     * @var Offer[]
     */
    public array $offers = [];

    /**
     * OfferRepository constructor.
     */
    public function __construct()
    {
        $offer = (new  Offer())
            ->setName("name")
            ->setCompanyDescription("company description")
            ->setJobDescription("job description")
            ->setMaxSalary(38000)
            ->setMinSalary(32000)
            ->setMissions("missions")
            ->setProfile("profile")
            ->setRemote(true)
            ->setSoftSkills("soft skills")
            ->setTasks("tasks")
        ;

        $reflectionClass = new \ReflectionClass($offer);
        $reflectionProperty = $reflectionClass->getProperty("id");
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($offer, 1);

        $this->offers = [1 => $offer];
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): Offer
    {
        return $this->offers[$id];
    }

    /**
     * @inheritDoc
     */
    public function publish(Offer $offer): void
    {
    }
}
