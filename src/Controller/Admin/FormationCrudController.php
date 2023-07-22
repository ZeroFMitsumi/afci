<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Config\Definition\Builder\BooleanNodeDefinition;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('de Formation')
            ->setEntityLabelInPlural('des Formations')

            ->setPageTitle('index', 'Administration - Formation')
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
            TextField::new('lastclass'),
            DateTimeField::new('schoolleavingdate'),
            DateTimeField::new('since'),
            TextField::new('lastdiplomaobtained'),
            BooleanField::new('lvl3'),
            BooleanField::new('lvl4'),
            BooleanField::new('lvl5'),
            BooleanField::new('lvl6'),
            BooleanField::new('lvl6_2'),
            BooleanField::new('lvl7'),

        ];
    }
}
