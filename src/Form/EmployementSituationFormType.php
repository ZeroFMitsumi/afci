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
            ->add('is_pe', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('is_indemnisation_pe', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Indemnisation Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('inscrit_since', DateType::class, [
                'widget' => 'choice',
                'label' => 'Inscrit depuis',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('pe_id', TextType::class, [
                'label' => 'Identifiant Pole emploi',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('indemnistaion_type', TextType::class, [
                'label' => 'Type d\'indemnisation',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('indemnisation_end', DateType::class, [
                'widget' => 'choice',
                'label' => 'Fin d\'indemnisation',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('is_rsa', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('is_aah', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('is_ass', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('is_aspa', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Pole emploi',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('other_perception', TextType::class, [
                'label' => 'Autre perception',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('ml', TextType::class, [
                'label' => 'Mission local',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('ml_tel', TextType::class, [
                'label' => 'Numéro Mission local',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('advisor', TextType::class, [
                'label' => 'conseiller mission local',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('advisor_tel', TextType::class, [
                'label' => 'Numéro conseiller mission local',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('advisor_mail', TextType::class, [
                'label' => 'Mail conseiller mission local',
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EmploymentSituation::class,
        ]);
    }
}
