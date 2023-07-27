<?php

namespace App\Form;

use App\Entity\CivilState;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CivilStateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('birthname', TextType::class, [
                'label' => 'Nom de naissance',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'placeholder' => 'Nom de naissance',
                    'class' => 'form-control'
                ]
            ])
            ->add('nationality', TextType::class, [
                'label' => 'Nationalité',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'placeholder' => 'Nationalité',
                    'class' => 'form-control'
                ]
            ])
            ->add('birthday', DateType::class, [
                'widget' => 'choice',
                'label' => 'Date de naissance',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control'
                ]
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Code postal',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'placeholder' => 'Code postal',
                    'class' => 'form-control'
                ]
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'placeholder' => 'Votre Pays',
                    'class' => 'form-control'
                ]
            ])
            ->add('socialsecuritynumber', IntegerType::class, [
                'label' => 'Numéro de sécurité sociale',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('cpam', TextType::class, [
                'label' => 'Code guichet CPAM',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('man', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Homme',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-control'
                ]
            ])
            ->add('woman', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Femme',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-control'
                ]
            ])
            ->add('maried', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Marié',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-control'
                ]
            ])
            ->add('single', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Célibataire',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-control'
                ]
            ])
            ->add('children', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Enfant',
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
                'attr' => [
                    'class' => 'form-check-control'
                ]
            ])
            ->add('user_id', EntityType::class, [
                'class' => Users::class,
                'label' => 'Stagiaire',
                'label_attr' => [
                    'class' => 'form-label'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CivilState::class,
        ]);
    }
}
