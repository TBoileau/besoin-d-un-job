<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Interest
 * @package App\Entity
 * @ORM\Entity
 */
class Interest
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeInterface $sentAt;

    /**
     * @var Offer
     * @ORM\ManyToOne(targetEntity="Offer")
     */
    private Offer $offer;

    /**
     * @var JobSeeker
     * @ORM\ManyToOne(targetEntity="JobSeeker")
     */
    private JobSeeker $jobSeeker;

    /**
     * Interest constructor.
     */
    public function __construct()
    {
        $this->sentAt = new \DateTimeImmutable();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getSentAt(): \DateTimeInterface
    {
        return $this->sentAt;
    }

    /**
     * @return Offer
     */
    public function getOffer(): Offer
    {
        return $this->offer;
    }

    /**
     * @param Offer $offer
     * @return Interest
     */
    public function setOffer(Offer $offer): Interest
    {
        $this->offer = $offer;
        return $this;
    }

    /**
     * @return JobSeeker
     */
    public function getJobSeeker(): JobSeeker
    {
        return $this->jobSeeker;
    }

    /**
     * @param JobSeeker $jobSeeker
     * @return Interest
     */
    public function setJobSeeker(JobSeeker $jobSeeker): Interest
    {
        $this->jobSeeker = $jobSeeker;
        return $this;
    }
}
