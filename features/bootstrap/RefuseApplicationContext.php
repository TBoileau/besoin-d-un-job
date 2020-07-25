<?php

namespace App\Features;

use Behat\Behat\Context\Context;

class RefuseApplicationContext implements Context
{
    /**
     * @Given /^I want to refuse an application$/
     */
    public function iWantToRefuseAnApplication()
    {
    }

    /**
     * @When /^I send the reason of refusal$/
     */
    public function iSendTheReasonOfRefusal()
    {
    }

    /**
     * @Then /^the job seeker is aware of our decision²$/
     */
    public function theJobSeekerIsAwareOfOurDecision()
    {
    }
}
