<?php

namespace App\Form;

use App\Entity\JobSeeker;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class JobSeekerRegistrationType
 * @package App\Form
 */
class JobSeekerRegistrationType extends RegistrationType
{
    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("class", JobSeeker::class);
    }
}
