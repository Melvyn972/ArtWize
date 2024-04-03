<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'Articles')]
    public function index(): Response
    {
        return $this->render('/Pages/article.html.twig', [
            'controller_name' => 'ArticlesController',
        ]);
    }
}
