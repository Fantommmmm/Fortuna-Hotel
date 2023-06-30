<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('userEmail', EmailType::class, [
            'label' => 'Votre adresse e-mail'
        ])
        ->add('firstName', TextType::class, [
            'label' => 'Prénom'
        ])
        ->add('lastName', TextType::class, [
            'label' => 'Nom'
        ])
        ->add('subject', TextType::class, [
            'label' => 'Sujet'
        ])
        ->add('message', TextareaType::class)
        ->add('submit', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
