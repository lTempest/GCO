<?php

namespace App\Controller\Admin;

use App\Entity\Events;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Events::class;
    }

    public const PRODUCTS_BASE_PATH = "assets/img/imgArticle";
    public const PRODUCTS_UPLOAD_DIR = "public/assets/img/imgArticle";

    public function configureFields(?string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('subtitle'),
            TextField::new('content'),
            ImageField::new('img_art')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                ->setSortable(false),
            TextField::new('slug'),
            DateField::new('start_date'),
            DateField::new('end_date'),
            BooleanField::new('tournament'),
            AssociationField::new('user'),
            AssociationField::new('game'),
            AssociationField::new('etatevents'),
        ];
    }

}
