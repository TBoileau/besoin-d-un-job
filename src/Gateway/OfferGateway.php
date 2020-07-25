<?php

namespace App\Gateway;

use App\Entity\Offer;

/**
 * Interface OfferGateway
 * @package App\Gateway
 */
interface OfferGateway
{
    /**
     * @param Offer $offer
     */
    public function publish(Offer $offer): void;

    /**
     * @param int $id
     * @return Offer
     */
    public function findOneById(int $id): Offer;
}
