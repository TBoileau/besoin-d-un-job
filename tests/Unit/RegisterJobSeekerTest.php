<?php

namespace App\Tests\Unit;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\UseCase\RegisterJobSeeker;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegisterJobSeekerTest
 * @package App\Tests\Unit
 */
class RegisterJobSeekerTest extends TestCase
{
    public function testSuccessfulRegistration()
    {
        $userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $userPasswordEncoder->method("encodePassword")->willReturn("hash_password");

        $useCase = new RegisterJobSeeker(new JobSeekerRepository($userPasswordEncoder), $userPasswordEncoder);

        $jobSeeker = new JobSeeker();
        $jobSeeker->setPlainPassword("Password123!");
        $jobSeeker->setEmail("email@email.com");
        $jobSeeker->setFirstName("John");
        $jobSeeker->setLastName("Doe");

        $this->assertEquals($jobSeeker, $useCase->execute($jobSeeker));
    }

    /**
     * @dataProvider provideBadJobSeeker
     * @param JobSeeker $jobSeeker
     */
    public function testBadJobSeeker(JobSeeker $jobSeeker)
    {
        $userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $userPasswordEncoder->method("encodePassword")->willReturn("hash_password");

        $useCase = new RegisterJobSeeker(new JobSeekerRepository($userPasswordEncoder), $userPasswordEncoder);

        $this->expectException(LazyAssertionException::class);

        $useCase->execute($jobSeeker);
    }

    /**
     * @return \Generator
     */
    public function provideBadJobSeeker(): \Generator
    {
        yield [
            (new JobSeeker())
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("")
                ->setEmail("email@email.com")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("fail")
                ->setPlainPassword("Password123!")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("")
        ];

        yield [
            (new JobSeeker())
                ->setFirstName("John")
                ->setLastName("Doe")
                ->setEmail("email@email.com")
                ->setPlainPassword("fail")
        ];
    }
}
