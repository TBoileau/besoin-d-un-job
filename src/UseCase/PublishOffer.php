<?php

namespace App\UseCase;

use App\Entity\Offer;
use App\Gateway\OfferGateway;
use Assert\Assert;

/**
 * Class PublishOffer
 * @package App\UseCase
 */
class PublishOffer
{
    /**
     * @var OfferGateway
     */
    private OfferGateway $offerGateway;

    /**
     * PublishOffer constructor.
     * @param OfferGateway $offerGateway
     */
    public function __construct(OfferGateway $offerGateway)
    {
        $this->offerGateway = $offerGateway;
    }

    /**
     * @param Offer $offer
     * @return Offer
     */
    public function execute(Offer $offer): Offer
    {
        Assert::lazy()
            ->that($offer->getName(), 'name')->notBlank()
            ->that($offer->getCompanyDescription(), 'companyDescription')->notBlank()
            ->that($offer->getJobDescription(), 'jobDescription')->notBlank()
            ->that($offer->getMaxSalary(), 'maxSalary')
                ->notBlank()
                ->integer()
                ->greaterThan($offer->getMinSalary())
            ->that($offer->getMinSalary(), 'minSalary')
                ->notBlank()
                ->integer()
                ->greaterThan(0)
                ->lessThan($offer->getMaxSalary())
            ->that($offer->getMissions(), 'missions')->notBlank()
            ->that($offer->getProfile(), 'profile')->notBlank()
            ->that($offer->getRemote(), 'remote')->notNull()
            ->that($offer->getSoftSkills(), 'softSkills')->notBlank()
            ->that($offer->getTasks(), 'tasks')->notBlank()
            ->verifyNow()
        ;

        $this->offerGateway->publish($offer);

        return $offer;
    }
}
