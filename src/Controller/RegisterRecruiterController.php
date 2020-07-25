<?php

namespace App\Controller;

use App\Entity\Recruiter;
use App\Form\RecruiterRegistrationType;
use App\UseCase\RegisterRecruiter;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class RegisterRecruiterController
 * @package App\Controller
 */
class RegisterRecruiterController
{
    private FormFactoryInterface $formFactory;
    private RegisterRecruiter $recruiterRegister;
    private UrlGeneratorInterface $urlGenerator;
    private Environment $twig;

    /**
     * RegisterRecruiterController constructor.
     * @param FormFactoryInterface $formFactory
     * @param RegisterRecruiter $recruiterRegister
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        RegisterRecruiter $recruiterRegister,
        UrlGeneratorInterface $urlGenerator,
        Environment $twig
    ) {
        $this->formFactory = $formFactory;
        $this->recruiterRegister = $recruiterRegister;
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
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
        $recruiter = new Recruiter();

        $form = $this->formFactory->create(RecruiterRegistrationType::class, $recruiter)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->recruiterRegister->execute($recruiter);

            return new RedirectResponse($this->urlGenerator->generate("index"));
        }

        return new Response($this->twig->render("ui/register_recruiter.html.twig", [
            "form" => $form->createView()
        ]));
    }
}
