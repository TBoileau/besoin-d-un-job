<?php

namespace App\Gateway;

use App\Entity\JobSeeker;

/**
 * Interface JobSeekerGateway
 * @package App\Gateway
 */
interface JobSeekerGateway extends UserGateway
{
    /**
     * @param JobSeeker $jobSeeker
     */
    public function register(JobSeeker $jobSeeker): void;

    /**
     * @param int $id
     * @return JobSeeker
     */
    public function findOneById(int $id): JobSeeker;
}
