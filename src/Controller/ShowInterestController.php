<?php

namespace App\Controller;

use App\Entity\JobSeeker;
use App\Entity\Offer;
use App\UseCase\ShowInterest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class ShowInterestController
 * @package App\Controller
 */
class ShowInterestController extends AbstractController
{
    private ShowInterest $showInterest;
    private UrlGeneratorInterface $urlGenerator;

    /**
     * PublishOfferController constructor.
     * @param ShowInterest $showInterest
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(ShowInterest $showInterest, UrlGeneratorInterface $urlGenerator)
    {
        $this->showInterest = $showInterest;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param int $offer
     * @param int $jobSeeker
     * @return RedirectResponse
     */
    public function __invoke(int $offer, int $jobSeeker): RedirectResponse
    {
        $this->showInterest->execute($offer, $jobSeeker);

        return new RedirectResponse($this->urlGenerator->generate("index"));
    }
}
