<?php

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Class OfferType
 * @package App\Form
 */
class OfferType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Intitulé de l'offre d'emploi",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('companyDescription', TextareaType::class, [
                "label" => "Description de l'entreprise",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('jobDescription', TextareaType::class, [
                "label" => "Description de l'emploi",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('missions', TextareaType::class, [
                "label" => "Missions",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('profile', TextareaType::class, [
                "label" => "Profil recherché",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('softSkills', TextareaType::class, [
                "label" => "Compétences (douces)",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('tasks', TextareaType::class, [
                "label" => "Tâches",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('minSalary', NumberType::class, [
                "label" => "Salaire minimum",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('maxSalary', NumberType::class, [
                "label" => "Salaire maximum",
                "constraints" => [
                    new NotBlank()
                ]
            ])
            ->add('remote', CheckboxType::class, [
                "label" => "Télétravail ?",
                "constraints" => [
                    new NotBlank()
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Offer::class);
    }
}
