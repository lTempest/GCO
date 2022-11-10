<?php

namespace App\Controller\Admin;

use App\Entity\EtatsEvents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EtatsEventsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EtatsEvents::class;
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
