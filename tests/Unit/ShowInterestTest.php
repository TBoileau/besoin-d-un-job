<?php

namespace App\Tests\Unit;

use App\Adapter\InMemory\Repository\InterestRepository;
use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Adapter\InMemory\Repository\OfferRepository;
use App\Entity\Interest;
use App\Entity\JobSeeker;
use App\Entity\Offer;
use App\UseCase\ShowInterest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class ShowInterestTest
 * @package App\Tests\Unit
 */
class ShowInterestTest extends TestCase
{
    public function testSuccessfulOfferPublished()
    {
        $userPasswordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $userPasswordEncoder->method("encodePassword")->willReturn("hash_password");

        $useCase = new ShowInterest(
            new InterestRepository(),
            new OfferRepository(),
            new JobSeekerRepository($userPasswordEncoder)
        );

        $this->assertInstanceOf(Interest::class, $useCase->execute(1, 1));
    }
}
