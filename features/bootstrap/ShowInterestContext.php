<?php

namespace App\Features;

use App\Adapter\InMemory\Repository\InterestRepository;
use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Adapter\InMemory\Repository\OfferRepository;
use App\Entity\Interest;
use App\UseCase\ShowInterest;
use Assert\Assertion;
use Behat\Behat\Context\Context;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ShowInterestContext implements Context
{
    private ShowInterest $showInterest;

    private int $offer;

    private int $jobSeeker;

    /**
     * @Given /^I want to show interest for a job seeker$/
     */
    public function iWantToShowInterestForAJobSeeker()
    {
        $userPasswordEncoder = new class () implements UserPasswordEncoderInterface
        {
            /**
             * @inheritDoc
             */
            public function encodePassword(UserInterface $user, string $plainPassword)
            {
                return "hash_password";
            }

            public function isPasswordValid(UserInterface $user, string $raw)
            {
            }

            public function needsRehash(UserInterface $user): bool
            {
            }
        };

        $this->showInterest = new ShowInterest(
            new InterestRepository(),
            new OfferRepository(),
            new JobSeekerRepository($userPasswordEncoder)
        );
    }

    /**
     * @When /^I send my interest to the job seeker$/
     */
    public function iSendMyInterestToTheJobSeeker()
    {
        $this->offer = 1;

        $this->jobSeeker = 1;
    }

    /**
     * @Then /^the job seeker is aware of our interest$/
     */
    public function theJobSeekerIsAwareOfOurInterest()
    {
        Assertion::isInstanceOf($this->showInterest->execute($this->offer, $this->jobSeeker), Interest::class);
    }
}
