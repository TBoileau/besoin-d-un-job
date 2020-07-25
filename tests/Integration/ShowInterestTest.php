<?php

namespace App\Tests\Integration;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Adapter\InMemory\Repository\OfferRepository;
use App\Gateway\JobSeekerGateway;
use App\Gateway\OfferGateway;
use App\Tests\AuthenticationTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class ShowInterestTest
 * @package App\Tests\Integration
 */
class ShowInterestTest extends WebTestCase
{
    use AuthenticationTrait;

    public function testSuccessfulOfferPublished()
    {
        $client = static::createAuthenticatedClient("recruiter@email.com");

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        /** @var OfferGateway $offerGateway */
        $offerGateway = $client->getContainer()->get("app.gateway.offer");

        $offer = $offerGateway->findOneById(1);

        /** @var JobSeekerGateway $jobSeekerGateway */
        $jobSeekerGateway = $client->getContainer()->get("app.gateway.job_seeker");

        $jobSeeker = $jobSeekerGateway->findByEmail("job.seeker@email.com");

        $client->request(
            Request::METHOD_GET,
            $router->generate("show_interest", [
                "offer" => $offer->getId(),
                "jobSeeker" => $jobSeeker->getId()
            ])
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
    }
}
