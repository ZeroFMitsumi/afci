<?php

namespace App\Form;

use App\Entity\InformationSession;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class InformationSessionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('session_id', TextType::class, [
                'label' => 'Numéro de Session',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('location', TextType::class, [
                'label' => 'Lieu de formation',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('designation', TextType::class, [
                'label' => 'Designation',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control'],
            ])
            ->add('users', CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => EntityType::class,
                // these options are passed to each "email" type
                'entry_options' => [
                    'attr' => ['class' => 'eleves'],
                    'class' => Users::class
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InformationSession::class,
        ]);
    }
}
