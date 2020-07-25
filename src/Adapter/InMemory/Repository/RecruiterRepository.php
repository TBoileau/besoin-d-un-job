<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway;

/**
 * Class RecruiterRepository
 * @package App\Adapter\InMemory\Repository
 */
class RecruiterRepository implements RecruiterGateway
{
    public function register(Recruiter $recruiter): void
    {
        // TODO: Implement register() method.
    }
}
