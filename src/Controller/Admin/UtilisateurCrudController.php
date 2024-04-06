<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Filters\CaseInsensitiveTextFilter;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;


class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['name' => 'ASC', 'fname' => 'ASC'])
            ->setEntityLabelInSingular('Utilisateur')
            ->setPageTitle('index', 'CRUD des Utilisateurs')
            ->setPageTitle('new', 'Création de Utilisateur')
            ->setPageTitle('edit', 'Édition de Utilisateur')
            ->setPageTitle('detail', 'Détails de Utilisateur');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IntegerField::new('id')
            ->setLabel('id')
            ->onlyOnIndex();
        yield TextField::new('name')
            ->setLabel('Nom');
        yield TextField::new('fname')
            ->setLabel('Prénom');
        yield TextField::new('email')
            ->setLabel('Email');
        yield TextField::new('password')
            ->setLabel('Mot de passe')
            ->onlyWhenCreating();
        yield ArrayField::new('roles')
            ->setLabel('Roles');
        yield IntegerField::new('tel')
            ->setLabel('Numéro de téléphone');
        yield IntegerField::new('numero_de_voie')
            ->setLabel('Numéro de voie');
        yield TextField::new('nom_de_voie')
            ->setLabel('Nom de voie');
        yield IntegerField::new('code_postal')
            ->setLabel('Code postal');

    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(CaseInsensitiveTextFilter::new('name'))
            ->add(CaseInsensitiveTextFilter::new('fname'))
            ->add(CaseInsensitiveTextFilter::new('roles'))
            ->add(CaseInsensitiveTextFilter::new('tel'))
            ->add(CaseInsensitiveTextFilter::new('numero_de_voie'))
            ->add(CaseInsensitiveTextFilter::new('nom_de_voie'))
            ->add(CaseInsensitiveTextFilter::new('code_postal'));

    }


}
