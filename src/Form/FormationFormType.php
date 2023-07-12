<?php

namespace App\Form;

use App\Entity\Formation;
use Doctrine\ORM\QueryBuilder;
use App\Repository\UsersRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FormationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastclass', TextType::class, [
            ])
            ->add('schoolleavingdate', DateType::class, [
            ])
            ->add('since', DateType::class, [
            ])
            ->add('lastdiplomaobtained', TextType::class, [
            ])
            ->add('lvl3', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('lvl4', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('lvl5', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('lvl6', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('lvl6_2', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('lvl7', CheckboxType::class, [
                'label' => 'Lvl3',
                'label_attr' => ['class' => 'btn btn-primary form-check-label'],
                'attr' => ['class' => 'btn-check form-check-input'],
            ])
            ->add('user_id', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (UsersRepository $ur): QueryBuilder {
                    return $ur->createQueryBuilder('u')
                            ->orderBy('u.username', 'ASC');
                },
                'choice_label' => 'Prénom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
