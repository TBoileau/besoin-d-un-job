<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class JobSeeker
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Gateway\JobSeekerGateway")
 */
class JobSeeker extends User
{
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ["ROLE_USER", 'ROLE_JOB_SEEKER'];
    }
}
