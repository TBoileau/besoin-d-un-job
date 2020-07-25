<?php

namespace App\Features;

use Behat\Behat\Context\Context;

class HireContext implements Context
{
    /**
     * @Given /^I want to hire a job seeker that applied for our job offer$/
     */
    public function iWantToHireAJobSeekerThatAppliedForOurJobOffer()
    {
    }

    /**
     * @When /^I hire him$/
     */
    public function iHireHim()
    {
    }

    /**
     * @Then /^the job offer is archived$/
     */
    public function theJobOfferIsArchived()
    {
    }
}
