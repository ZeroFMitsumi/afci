<?php

namespace App\Form;

use App\Entity\CivilState;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CivilStateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('birthname')
            ->add('nationality')
            ->add('birthday')
            ->add('city')
            ->add('zipcode')
            ->add('country')
            ->add('socialsecuritynumber')
            ->add('cpam')
            ->add('man')
            ->add('woman')
            ->add('maried')
            ->add('single')
            ->add('children')
            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CivilState::class,
        ]);
    }
}
