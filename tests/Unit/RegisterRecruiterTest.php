<?php

namespace App\Tests\Unit;

use App\Adapter\InMemory\Repository\RecruiterRepository;
use App\Entity\Recruiter;
use App\UseCase\RegisterRecruiter;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegisterRecruiterTest
 * @package App\Tests\Unit
 */
class RegisterRecruiterTest extends TestCase
{
    public function testSuccessfulRegistration()
    {
        $userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $userPasswordEncoder->method("encodePassword")->willReturn("hash_password");

        $useCase = new RegisterRecruiter(new RecruiterRepository($userPasswordEncoder), $userPasswordEncoder);

        $recruiter = new Recruiter();
        $recruiter->setPlainPassword("Password123!");
        $recruiter->setEmail("email@email.com");
        $recruiter->setFirstName("John");
        $recruiter->setLastName("Doe");
        $recruiter->setCompanyName("Company");

        $this->assertEquals($recruiter, $useCase->execute($recruiter));
    }

    /**
     * @dataProvider provideBadRecruiter
     * @param Recruiter $recruiter
     */
    public function testBadRecruiter(Recruiter $recruiter)
    {
        $userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $userPasswordEncoder->method("encodePassword")->willReturn("hash_password");

        $useCase = new RegisterRecruiter(new RecruiterRepository($userPasswordEncoder), $userPasswordEncoder);

        $this->expectException(LazyAssertionException::class);

        $useCase->execute($recruiter);
    }

    /**
     * @return \Generator
     */
    public function provideBadRecruiter(): \Generator
    {
        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
                ->setCompanyName("")
        ];

        yield [
            (new Recruiter())
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("fail")
                ->setPlainPassword("Password123!")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("")
                ->setCompanyName("Company")
        ];

        yield [
            (new Recruiter())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("fail")
                ->setCompanyName("Company")
        ];
    }
}
