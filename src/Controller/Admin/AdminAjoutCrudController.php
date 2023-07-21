<?php

namespace App\Controller\Admin;

use App\Entity\AdminAjout;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdminAjoutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdminAjout::class;
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
