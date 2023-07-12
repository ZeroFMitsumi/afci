<?php

namespace App\Form;

use App\Entity\EmploymentSituation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployementSituationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('is_pe')
            ->add('is_indemnisation_pe')
            ->add('inscrit_since')
            ->add('pe_id')
            ->add('indemnistaion_type')
            ->add('indemnisation_end')
            ->add('is_rsa')
            ->add('is_aah')
            ->add('is_ass')
            ->add('is_aspa')
            ->add('other_perception')
            ->add('ml')
            ->add('ml_tel')
            ->add('advisor')
            ->add('advisor_tel')
            ->add('advisor_mail')
            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EmploymentSituation::class,
        ]);
    }
}
