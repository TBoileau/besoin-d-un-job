<?php

namespace App\Features;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\UseCase\RegisterJobSeeker;
use Assert\Assertion;
use Behat\Behat\Context\Context;

/**
 * Class RegisterJobSeekerContext
 * @package App\Features
 */
class RegisterJobSeekerContext implements Context
{
    /**
     * @var RegisterJobSeeker
     */
    private RegisterJobSeeker $registerJobSeeker;

    /**
     * @var JobSeeker
     */
    private JobSeeker $jobSeeker;

    /**
     * @Given /^I need to register to look for a new job$/
     */
    public function iNeedToRegisterToLookForANewJob()
    {
        $this->registerJobSeeker = new RegisterJobSeeker(new JobSeekerRepository());
    }

    /**
     *
     * @When /^I fill the registration form$/
     */
    public function iFillTheRegistrationForm()
    {
        $this->jobSeeker = new JobSeeker();
        $this->jobSeeker->setPlainPassword("Password123!");
        $this->jobSeeker->setEmail("email@email.com");
        $this->jobSeeker->setFirstName("John");
        $this->jobSeeker->setLastName("Doe");
    }

    /**
     * @Then /^I can log in with my new account$/
     */
    public function iCanLogInWithMyNewAccount()
    {
        Assertion::eq($this->jobSeeker, $this->registerJobSeeker->execute($this->jobSeeker));
    }
}
