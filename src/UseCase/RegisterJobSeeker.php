<?php

namespace App\UseCase;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;
use Assert\Assert;

/**
 * Class RegisterJobSeeker
 * @package App\UseCase
 */
class RegisterJobSeeker
{
    /**
     * @var JobSeekerGateway
     */
    private JobSeekerGateway $jobSeekerGateway;

    /**
     * RegisterJobSeeker constructor.
     * @param JobSeekerGateway $jobSeekerGateway
     */
    public function __construct(JobSeekerGateway $jobSeekerGateway)
    {
        $this->jobSeekerGateway = $jobSeekerGateway;
    }

    /**
     * @param JobSeeker $jobSeeker
     * @return JobSeeker
     */
    public function execute(JobSeeker $jobSeeker): JobSeeker
    {
        Assert::lazy()
            ->that($jobSeeker->getFirstName(), 'firstName')->notBlank()
            ->that($jobSeeker->getLastName(), 'lastName')->notBlank()
            ->that($jobSeeker->getPlainPassword(), 'plainPassword')
                ->notBlank()
                ->regex(
                    "/^(?:(?=.*[a-z])(?:(?=.*[A-Z])(?=.*[\d\W])|(?=.*\W)(?=.*\d))|(?=.*\W)(?=.*[A-Z])(?=.*\d)).{8,}$/"
                )
            ->that($jobSeeker->getEmail(), 'email')
                ->notBlank()
                ->email()
            ->verifyNow()
        ;

        $this->jobSeekerGateway->register($jobSeeker);

        return $jobSeeker;
    }
}
