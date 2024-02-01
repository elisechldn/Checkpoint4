<?php

namespace App\Controller\Admin;

use App\Entity\ProjetWeb;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProjetWebCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjetWeb::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('projet'),
            TextField::new('date'),
            TextEditorField::new('descriptif'),
            AssociationField::new('stacks'),
        ];
    }
}
