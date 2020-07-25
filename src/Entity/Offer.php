<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Offer
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Gateway\OfferGateway")
 */
class Offer
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $name = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $companyDescription = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $jobDescription = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $missions = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $tasks = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $profile = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $softSkills = null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     */
    private ?int $minSalary = null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     */
    private ?int $maxSalary = null;

    /**
     * @var bool|null
     * @ORM\Column(type="boolean")
     */
    private ?bool $remote = null;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeInterface $publishedAt;

    /**
     * @var \DateTimeInterface|null
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeInterface $deletedAt = null;

    /**
     * @var Recruiter
     * @ORM\ManyToOne(targetEntity="Recruiter")
     */
    private Recruiter $recruiter;

    /**
     * Offer constructor.
     */
    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Offer
     */
    public function setName(?string $name): Offer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompanyDescription(): ?string
    {
        return $this->companyDescription;
    }

    /**
     * @param string|null $companyDescription
     * @return Offer
     */
    public function setCompanyDescription(?string $companyDescription): Offer
    {
        $this->companyDescription = $companyDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getJobDescription(): ?string
    {
        return $this->jobDescription;
    }

    /**
     * @param string|null $jobDescription
     * @return Offer
     */
    public function setJobDescription(?string $jobDescription): Offer
    {
        $this->jobDescription = $jobDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMissions(): ?string
    {
        return $this->missions;
    }

    /**
     * @param string|null $missions
     * @return Offer
     */
    public function setMissions(?string $missions): Offer
    {
        $this->missions = $missions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTasks(): ?string
    {
        return $this->tasks;
    }

    /**
     * @param string|null $tasks
     * @return Offer
     */
    public function setTasks(?string $tasks): Offer
    {
        $this->tasks = $tasks;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfile(): ?string
    {
        return $this->profile;
    }

    /**
     * @param string|null $profile
     * @return Offer
     */
    public function setProfile(?string $profile): Offer
    {
        $this->profile = $profile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSoftSkills(): ?string
    {
        return $this->softSkills;
    }

    /**
     * @param string|null $softSkills
     * @return Offer
     */
    public function setSoftSkills(?string $softSkills): Offer
    {
        $this->softSkills = $softSkills;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSalary(): ?int
    {
        return $this->minSalary;
    }

    /**
     * @param int|null $minSalary
     * @return Offer
     */
    public function setMinSalary(?int $minSalary): Offer
    {
        $this->minSalary = $minSalary;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxSalary(): ?int
    {
        return $this->maxSalary;
    }

    /**
     * @param int|null $maxSalary
     * @return Offer
     */
    public function setMaxSalary(?int $maxSalary): Offer
    {
        $this->maxSalary = $maxSalary;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRemote(): ?bool
    {
        return $this->remote;
    }

    /**
     * @param bool|null $remote
     * @return Offer
     */
    public function setRemote(?bool $remote): Offer
    {
        $this->remote = $remote;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPublishedAt(): \DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTimeInterface|null $deletedAt
     * @return Offer
     */
    public function setDeletedAt(?\DateTimeInterface $deletedAt): Offer
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return Recruiter
     */
    public function getRecruiter(): Recruiter
    {
        return $this->recruiter;
    }

    /**
     * @param Recruiter $recruiter
     * @return Offer
     */
    public function setRecruiter(Recruiter $recruiter): Offer
    {
        $this->recruiter = $recruiter;
        return $this;
    }
}
