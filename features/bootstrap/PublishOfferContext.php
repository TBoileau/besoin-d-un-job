<?php

namespace App\Features;

use App\Entity\Offer;
use App\UseCase\PublishOffer;
use Assert\Assertion;
use Behat\Behat\Context\Context;

class PublishOfferContext implements Context
{
    private PublishOffer $publishOffer;

    private Offer $offer;

    /**
     * @Given /^I want to publish an offer$/
     */
    public function iWantToPublishAnOffer()
    {
        $this->publishOffer = new PublishOffer();
    }

    /**
     * @When /^I write the offer$/
     */
    public function iWriteTheOffer()
    {
        $this->offer = (new  Offer())
            ->setName("name")
            ->setCompanyDescription("company description")
            ->setJobDescription("job description")
            ->setMaxSalary(32000)
            ->setMinSalary(38000)
            ->setMissions("missions")
            ->setProfile("profile")
            ->setRemote(true)
            ->setSoftSkills("soft skills")
            ->setTasks("tasks")
        ;
    }

    /**
     * @Then /^the offer is published and job seeker can send their application for a new job$/
     */
    public function theOfferIsPublishedAndJobSeekerCanSendTheirApplicationForANewJob()
    {
        Assertion::eq($this->offer, $this->publishOffer->execute($this->offer));
    }
}
