<?php

namespace App\Controller\Admin;

use App\Entity\Players;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlayersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Players::class;
    }

    public const PRODUCTS_BASE_PATH = "assets/img/photograph";
    public const PRODUCTS_UPLOAD_DIR = "public/assets/img/photograph";

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nickname'),
            IntegerField::new('age'),
            TextField::new('nationality'),
            TextField::new('role'),
            AssociationField::new('team'),
            ImageField::new('photograph')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                ->setSortable(false),
            TextField::new('twitter'),
            TextField::new('twitch'),
        ];
    }
}
