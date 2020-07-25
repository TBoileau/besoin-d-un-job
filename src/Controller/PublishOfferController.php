<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use App\UseCase\PublishOffer;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;
use Twig\Environment;

/**
 * Class PublishOfferController
 * @package App\Controller
 */
class PublishOfferController
{
    private FormFactoryInterface $formFactory;
    private PublishOffer $publishOffer;
    private UrlGeneratorInterface $urlGenerator;
    private Environment $twig;
    private Security $security;

    /**
     * RegisterRecruiterController constructor.
     * @param FormFactoryInterface $formFactory
     * @param PublishOffer $publishOffer
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     * @param Security $security
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        PublishOffer $publishOffer,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig,
        Security $security
    ) {
        $this->formFactory = $formFactory;
        $this->publishOffer = $publishOffer;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
        $this->security = $security;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request): Response
    {
        $offer = new Offer();

        $offer->setRecruiter($this->security->getUser());

        $form = $this->formFactory->create(OfferType::class, $offer)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->publishOffer->execute($offer);

            return new RedirectResponse($this->urlGenerator->generate("index"));
        }

        return new Response($this->twig->render("ui/publish_offer.html.twig", [
            "form" => $form->createView()
        ]));
    }
}
