<?php

namespace App\Tests\Integration;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\Entity\Recruiter;
use App\Tests\AuthenticationTrait;
use App\UseCase\RegisterJobSeeker;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class PublishOfferTest
 * @package App\Tests\Integration
 */
class PublishOfferTest extends WebTestCase
{
    use AuthenticationTrait;

    public function testSuccessfulOfferPublished()
    {
        $client = static::createAuthenticatedClient("recruiter@email.com");

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $crawler = $client->request(
            Request::METHOD_GET,
            $router->generate("publish_offer")
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->filter("form")->form([
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
    }

    /**
     * @dataProvider provideBadRequest
     * @param array $formData
     */
    public function testBadRequest(array $formData)
    {
        $client = static::createAuthenticatedClient("recruiter@email.com");

        /** @var RouterInterface $router */
        $router = $client->getContainer()->get("router");

        $crawler = $client->request(
            Request::METHOD_GET,
            $router->generate("publish_offer")
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->filter("form")->form($formData);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    /**
     * @return \Generator
     */
    public function provideBadRequest(): \Generator
    {
        yield [[
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[softSkills]" => "softSkills",
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[tasks]" => "tasks"
        ]];
        yield [[
            "offer[name]" => "name",
            "offer[companyDescription]" => "companyDescription",
            "offer[jobDescription]" => "jobDescription",
            "offer[minSalary]" => 30000,
            "offer[maxSalary]" => 40000,
            "offer[missions]" => "missions",
            "offer[profile]" => "profile",
            "offer[remote]" => true,
            "offer[softSkills]" => "softSkills",
        ]];
    }
}
