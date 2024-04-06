<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('utilisateur')
                ->setLabel('Utilisateur'),
            TextField::new('Sujet')
                ->setLabel('Sujet'),
            TextField::new('Message')
                ->setLabel('Message'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Contact')
            ->setPageTitle('index', 'CRUD des Contacts')
            ->setPageTitle('new', 'Création de Contact')
            ->setPageTitle('edit', 'Édition de Contact')
            ->setPageTitle('detail', 'Détails de Contact');
    }

}
