<?php

namespace App\Features;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\UseCase\RegisterJobSeeker;
use Assert\Assertion;
use Behat\Behat\Context\Context;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

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

        $this->registerJobSeeker = new RegisterJobSeeker(
            new JobSeekerRepository($userPasswordEncoder),
            $userPasswordEncoder
        );
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
