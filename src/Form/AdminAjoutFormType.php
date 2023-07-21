<?php

namespace App\Form;

use App\Entity\AdminAjout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AdminAjoutFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stagiaire_id', IntegerType::class, [
                'label' => 'Stagiaire',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control my-2'],
            ])
            ->add('is_pe', CheckboxType::class, [
                'mapped' => false,
                'attr' => ['class' => 'form-check-control mx-3']
            ])
            ->add('is_asp', CheckboxType::class, [
                'mapped' => false,
                'label' => 'ASP',
                'label_attr' => ['class' => 'form-check-label'],
                'attr' => ['class' => 'form-check-control mx-3']
            ])
            ->add('asp_created_at', DateType::class, [
                'widget' => 'choice',
                'label' => 'Date d\'optention de l\'ASP',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control m-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdminAjout::class,
        ]);
    }
}
