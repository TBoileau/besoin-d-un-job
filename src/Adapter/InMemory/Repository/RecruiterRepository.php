<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway;

/**
 * Class RecruiterRepository
 * @package App\Adapter\InMemory\Repository
 */
class RecruiterRepository extends UserRepository implements RecruiterGateway
{
    public function register(Recruiter $recruiter): void
    {
    }
}
