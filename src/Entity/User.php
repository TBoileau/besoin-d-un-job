<?php

namespace App\Entity;

use App\Adapter\Doctrine\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"job_seeker" = "App\Entity\JobSeeker", "recruiter" = "App\Entity\Recruiter"})
 */
abstract class User implements UserInterface, \Serializable, EquatableInterface
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    protected ?string $firstName = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    protected ?string $lastName = null;

    /**
     * @var string|null
     * @ORM\Column(unique=true)
     */
    protected ?string $email = null;

    /**
     * @var string|null
     * @ORM\Column
     */
    protected ?string $password = null;

    /**
     * @var string|null
     */
    protected ?string $plainPassword = null;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime_immutable")
     */
    protected \DateTimeInterface $registeredAt;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->registeredAt = new \DateTimeImmutable();
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRegisteredAt(): \DateTimeInterface
    {
        return $this->registeredAt;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return serialize([$this->email]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        list ($this->email) = unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     * @inheritDoc
     */
    public function isEqualTo(UserInterface $user)
    {
        return $user->getUsername() === $this->getUsername();
    }
}
