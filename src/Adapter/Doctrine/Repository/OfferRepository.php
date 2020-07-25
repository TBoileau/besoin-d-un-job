<?php

namespace App\Adapter\InMemory\Repository;

use App\Entity\Offer;
use App\Gateway\OfferGateway;

/**
 * Class OfferRepository
 * @package App\Adapter\InMemory\Repository
 */
class OfferRepository implements OfferGateway
{
    /**
     * @inheritDoc
     */
    public function publish(Offer $offer): void
    {
    }
}
