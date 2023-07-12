<?php

namespace App\Form;

use App\Entity\AdminAjout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

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
            ->add('created_at')
            ->add('is_pe')
            ->add('is_asp')
            ->add('asp_created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdminAjout::class,
        ]);
    }
}
