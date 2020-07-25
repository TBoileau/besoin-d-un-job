<?php

namespace App\UseCase;

use App\Entity\Interest;
use App\Gateway\InterestGateway;
use App\Gateway\JobSeekerGateway;
use App\Gateway\OfferGateway;

/**
 * Class ShowInterest
 * @package App\UseCase
 */
class ShowInterest
{
    /**
     * @var InterestGateway
     */
    private InterestGateway $interestGateway;

    /**
     * @var OfferGateway
     */
    private OfferGateway $offerGateway;

    /**
     * @var JobSeekerGateway
     */
    private JobSeekerGateway $jobSeekerGateway;

    /**
     * ShowInterest constructor.
     * @param InterestGateway $interestGateway
     * @param OfferGateway $offerGateway
     * @param JobSeekerGateway $jobSeekerGateway
     */
    public function __construct(
        InterestGateway $interestGateway,
        OfferGateway $offerGateway,
        JobSeekerGateway $jobSeekerGateway
    ) {
        $this->interestGateway = $interestGateway;
        $this->offerGateway = $offerGateway;
        $this->jobSeekerGateway = $jobSeekerGateway;
    }

    /**
     * @param int $offer
     * @param int $jobSeeker
     * @return Interest
     */
    public function execute(int $offer, int $jobSeeker): Interest
    {
        $interest = (new Interest())
            ->setJobSeeker($this->jobSeekerGateway->findOneById($jobSeeker))
            ->setOffer($this->offerGateway->findOneById($offer));

        $this->interestGateway->send($interest);

        return $interest;
    }
}
