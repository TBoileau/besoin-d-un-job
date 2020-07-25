<?php

namespace App\Form;

use App\Entity\JobSeeker;
use App\Entity\Recruiter;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class RecruiterRegistrationType
 * @package App\Form
 */
class RecruiterRegistrationType extends RegistrationType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add("companyName", TextType::class, [
            "label" => "Raison sociale",
            "constraints" => [
                new NotBlank()
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("class", Recruiter::class);
    }
}
