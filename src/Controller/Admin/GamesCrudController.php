<?php

namespace App\Controller\Admin;

use App\Entity\Games;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GamesCrudController extends AbstractCrudController
{
    public const PRODUCTS_BASE_PATH = "assets/img/afficheJeux";
    public const PRODUCTS_BASE_PATH2 = "assets/img/attachgame";
    public const PRODUCTS_UPLOAD_DIR = "public/assets/img/afficheJeux";
    public const PRODUCTS_UPLOAD_DIR2 = "public/assets/img/attachgame";

    public static function getEntityFqcn(): string
    {
        return Games::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name_game'),
            ImageField::new('img_game')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                ->setSortable(false),
            ImageField::new('attach')
                ->setBasePath(self::PRODUCTS_BASE_PATH2)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR2)
                ->setSortable(false),
        ];
    }
}
