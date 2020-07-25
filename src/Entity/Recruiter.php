<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Recruiter
 * @package App\Entity
 * @ORM\Entity
 */
class Recruiter extends User
{
    /**
     * @var string|null
     */
    private ?string $companyName = null;

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ["ROLE_USER", 'ROLE_RECRUITER'];
    }
}
