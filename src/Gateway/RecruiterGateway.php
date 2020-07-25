<?php

namespace App\Gateway;

use App\Entity\Recruiter;

/**
 * Interface RecruiterGateway
 * @package App\Gateway
 */
interface RecruiterGateway extends UserGateway
{
    /**
     * @param Recruiter $recruiter
     */
    public function register(Recruiter $recruiter): void;
}
