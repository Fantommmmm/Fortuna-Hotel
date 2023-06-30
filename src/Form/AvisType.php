<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('contenu', TextareaType::class, [
            'label' => 'Contenu',
            'attr' => ['rows' => 5],
        ])
        ->add('note', ChoiceType::class, [
            'label' => 'Note',
            'choices' => [
                '1 étoile' => 1,
                '2 étoiles' => 2,
                '3 étoiles' => 3,
                '4 étoiles' => 4,
                '5 étoiles' => 5,
            ],
        ])
        ->add('auteur', TextType::class, [
            'label' => 'Auteur',
        ])
        ->add('categorie', ChoiceType::class, [
            'label' => 'Catégorie',
            'choices' => [
                'Hôtel' => 'Hôtel',
                'Restaurant' => 'Restaurant',
                'Spa' => 'Spa',
                'Service' => 'Service',
            ],
        ]);
            // ->add('date_enregistrement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
