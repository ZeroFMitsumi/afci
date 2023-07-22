<?php

namespace App\Controller\Admin;

use App\Entity\CivilState;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CivilStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CivilState::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('d\'Etat civile')
            ->setEntityLabelInPlural('d\'Etat civiles')

            ->setPageTitle('index', 'Administration - Etats civile')
            ->setPaginatorPageSize(5);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('userId')
                ->setCrudController(UsersCrudController::class),
            IdField::new('id')
                ->hideOnIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            TextField::new('birthname'),
            TextField::new('nationality'),
            DateTimeField::new('birthday'),
            TextField::new('city'),
            TextField::new('zipcode'),
            TextField::new('country'),
            IntegerField::new('socialsecuritynumber'),
            TextField::new('cpam'),
            BooleanField::new('man'),
            BooleanField::new('woman'),
            BooleanField::new('maried'),
            BooleanField::new('single'),
            IntegerField::new('children'),

        ];
    }
}
