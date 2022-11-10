<?php

namespace App\Controller\Admin;

use App\Entity\Teams;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class TeamsCrudController extends AbstractCrudController
{
    public const PRODUCTS_BASE_PATH = "assets/img/LogoTeam";
    public const PRODUCTS_UPLOAD_DIR = "public/assets/img/LogoTeam";

    public static function getEntityFqcn(): string
    {
        return Teams::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('tag_team'),
            TextField::new('name_team'),
            ImageField::new('logo_team')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                ->setSortable(false),
            AssociationField::new('games'),
        ];
    }
}
