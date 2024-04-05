<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $adminUrlGenerator,

    ){}

    #[Route('/admin', name: 'admin')]
    public function indexAction(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UtilisateurCrudController::class)
            ->generateUrl();
        return $this->redirect($url);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ArtWise');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour a l\'accueil', 'fa fa-arrow-left', 'Accueil');
        yield MenuItem::linkToDashboard('Dashboard CURD');
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);

    }
}
