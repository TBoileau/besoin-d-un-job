<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\JobSeeker;
use App\Gateway\JobSeekerGateway;

/**
 * Class JobSeekerRepository
 * @package App\Adapter\InMemory\Repository
 */
class JobSeekerRepository extends UserRepository implements JobSeekerGateway
{
    public function register(JobSeeker $jobSeeker): void
    {
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): JobSeeker
    {
        return $this->users[$id];
    }
}
