<?php

namespace App\UseCase;

use App\Entity\Recruiter;
use App\Gateway\RecruiterGateway;
use Assert\Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegisterRecruiter
 * @package App\UseCase
 */
class RegisterRecruiter
{
    /**
     * @var RecruiterGateway
     */
    private RecruiterGateway $recruiterGateway;

    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $userPasswordEncoder;

    /**
     * RegisterRecruiter constructor.
     * @param RecruiterGateway $recruiterGateway
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(RecruiterGateway $recruiterGateway, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->recruiterGateway = $recruiterGateway;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param Recruiter $recruiter
     * @return Recruiter
     */
    public function execute(Recruiter $recruiter): Recruiter
    {
        Assert::lazy()
            ->that($recruiter->getFirstName(), 'firstName')->notBlank()
            ->that($recruiter->getLastName(), 'lastName')->notBlank()
            ->that($recruiter->getCompanyName(), 'companyName')->notBlank()
            ->that($recruiter->getPlainPassword(), 'plainPassword')
                ->notBlank()
                ->regex(
                    "/^(?:(?=.*[a-z])(?:(?=.*[A-Z])(?=.*[\d\W])|(?=.*\W)(?=.*\d))|(?=.*\W)(?=.*[A-Z])(?=.*\d)).{8,}$/"
                )
            ->that($recruiter->getEmail(), 'email')
                ->notBlank()
                ->email()
            ->verifyNow()
        ;

        $recruiter->setPassword(
            $this->userPasswordEncoder->encodePassword($recruiter, $recruiter->getPlainPassword())
        );

        $this->recruiterGateway->register($recruiter);

        return $recruiter;
    }
}
