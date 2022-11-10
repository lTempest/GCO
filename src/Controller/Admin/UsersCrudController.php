<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\RoleField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {   
        $roles = ['ROLE_SUPER_ADMIN', 'ROLE_ADMIN','ROLE_USER'];
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email'),
            ArrayField::new('roles'),
            TextField::new('pseudo'),
            TextField::new('first_name'),
            TextField::new('last_name'),
            DateField::new('date_of_birth'),
            
        ];
    }

}
