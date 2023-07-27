<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Stagiaires')
            ->setEntityLabelInPlural('Stagiaires')

            ->setPageTitle('index', 'Administration - Stagiaires')
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            TextField::new('email'),
            TextField::new('password'),
            ArrayField::new('roles'),
            TextField::new('lastname'),
            TextField::new('firstname'),
            TextField::new('address'),
            IntegerField::new('zipcode'),
            TextField::new('city'),
            TextField::new('departement'),
            TextField::new('tel'),
            TextField::new('tel2'),
            BooleanField::new('is_valid')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            AssociationField::new('stagiaireId')
                ->setCrudController(AdminAjoutCrudController::class),
            AssociationField::new('session')
                ->setCrudController(InformationSessionCrudController::class),
            AssociationField::new('formation')
                ->setCrudController(FormationCrudController::class),
            AssociationField::new('employmentSituation')
                ->setCrudController(EmploymentSituationCrudController::class),
            AssociationField::new('civilState')
                ->setCrudController(CivilStateCrudController::class),
        ];
    }
}
