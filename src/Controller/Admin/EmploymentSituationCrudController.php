<?php

namespace App\Controller\Admin;

use App\Entity\EmploymentSituation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmploymentSituationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmploymentSituation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Situation d\'emploi')
            ->setEntityLabelInPlural('Situation d\'emploi')

            ->setPageTitle('index', 'Administration - Situation d\'emploi')
            ->setPaginatorPageSize(5);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
