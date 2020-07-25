<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;

/**
 * Class JobSeekerRepository
 * @package App\Adapter\InMemory\Repository
 */
class JobSeekerRepository implements JobSeekerGateway
{
    public function register(JobSeeker $jobSeeker): void
    {
        // TODO: Implement register() method.
    }
}
