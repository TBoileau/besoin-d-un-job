<?php

namespace App\Gateway;

use App\Entity\Interest;

/**
 * Interface InterestGateway
 * @package App\Gateway
 */
interface InterestGateway
{
    /**
     * @param Interest $interest
     */
    public function send(Interest $interest): void;
}
