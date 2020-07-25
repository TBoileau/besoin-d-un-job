<?php

namespace App\DataFixtures;

use App\Entity\JobSeeker;
use App\Entity\Offer;
use App\Entity\Recruiter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $userPasswordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $jobSeeker = (new JobSeeker())
            ->setFirstName("John")
            ->setLastName("Doe")
            ->setEmail("job.seeker@email.com")
        ;

        $jobSeeker->setPassword($this->userPasswordEncoder->encodePassword($jobSeeker, "Password123!"));

        $manager->persist($jobSeeker);

        $manager->flush();

        $recruiter = (new Recruiter())
            ->setFirstName("Jane")
            ->setLastName("Doe")
            ->setCompanyName("Company")
            ->setEmail("recruiter@email.com")
        ;

        $recruiter->setPassword($this->userPasswordEncoder->encodePassword($recruiter, "Password123!"));

        $offer = (new  Offer())
            ->setName("name")
            ->setCompanyDescription("company description")
            ->setJobDescription("job description")
            ->setMaxSalary(38000)
            ->setMinSalary(32000)
            ->setMissions("missions")
            ->setProfile("profile")
            ->setRemote(true)
            ->setSoftSkills("soft skills")
            ->setTasks("tasks")
            ->setRecruiter($recruiter)
        ;

        $manager->persist($recruiter);

        $manager->persist($offer);

        $manager->flush();
    }
}
