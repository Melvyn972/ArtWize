<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')
                ->setLabel('id'),
            TextField::new('name')
                ->setLabel('Nom de la catégorie'),
            TextField::new('slug')
                ->setLabel('surnom'),
            AssociationField::new('products')
                ->setLabel('Les produits'),
        ];
    }
}
