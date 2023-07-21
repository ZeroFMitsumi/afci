<?php

namespace App\Controller\Admin;

use App\Entity\CivilState;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CivilStateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CivilState::class;
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
