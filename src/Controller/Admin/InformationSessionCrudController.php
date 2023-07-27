<?php

namespace App\Controller\Admin;

use App\Entity\InformationSession;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InformationSessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InformationSession::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('de Sessions')
            ->setEntityLabelInPlural('des Sessions')

            ->setPageTitle('index', 'Administration - Sessions')
            ->setPaginatorPageSize(5);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('users')
                ->setCrudController(UsersCrudController::class),
            TextField::new('designation'),
            TextField::new('location'),
            TextField::new('session_id'),
        ];
    }
}
