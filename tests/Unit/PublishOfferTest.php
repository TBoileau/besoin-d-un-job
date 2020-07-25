<?php

namespace App\Tests\Unit;

use App\Adapter\InMemory\Repository\OfferRepository;
use App\Entity\Offer;
use App\UseCase\PublishOffer;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;

/**
 * Class PublishOfferTest
 * @package App\Tests\Unit
 */
class PublishOfferTest extends TestCase
{
    public function testSuccessfulOfferPublished()
    {
        $useCase = new PublishOffer(new OfferRepository());

        $offer = (new  Offer())
            ->setName("name")
            ->setCompanyDescription("company description")
            ->setJobDescription("job description")
            ->setMinSalary(32000)
            ->setMaxSalary(38000)
            ->setMissions("missions")
            ->setProfile("profile")
            ->setRemote(true)
            ->setSoftSkills("soft skills")
            ->setTasks("tasks")
        ;

        $this->assertEquals($offer, $useCase->execute($offer));
    }

    /**
     * @dataProvider provideBadOffer
     * @param Offer $offer
     */
    public function testBadOffer(Offer $offer)
    {
        $useCase = new PublishOffer(new OfferRepository());

        $this->expectException(LazyAssertionException::class);

        $this->assertEquals($offer, $useCase->execute($offer));
    }

    public function provideBadOffer(): \Generator
    {
        yield [
            (new  Offer())
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMaxSalary(32000)
                ->setMinSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMaxSalary(32000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setSoftSkills("soft skills")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("")
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setTasks("tasks")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
                ->setTasks("")
        ];
        yield [
            (new  Offer())
                ->setName("name")
                ->setCompanyDescription("company description")
                ->setJobDescription("job description")
                ->setMinSalary(32000)
                ->setMaxSalary(38000)
                ->setMissions("missions")
                ->setProfile("profile")
                ->setRemote(true)
                ->setSoftSkills("soft skills")
        ];
    }
}
