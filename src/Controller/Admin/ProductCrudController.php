<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Filters\CaseInsensitiveTextFilter;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Image;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Nom du produit'),
            TextField::new('slug')
                ->setLabel('Slug'),
            TextField::new('content')
                ->setLabel('En tete'),
            TextField::new('description')
                ->setLabel('Description'),
                
            AssociationField::new('category')
                ->setLabel('Catégorie'),
            BooleanField::new('online')
                ->setLabel('En ligne'),
            DateField::new('createdAt')
                ->setLabel('Ajouté le:'),
            DateField::new('updateAt')
                ->setLabel('Mis à jour le:'),
            NumberField::new('price')
                ->setLabel('Prix'),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class),
            ImageField::new('images')
                ->setBasePath('/uploads/images')
                ->onlyOnIndex(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(CaseInsensitiveTextFilter::new('name'))
            ->add('category');

    }
}
