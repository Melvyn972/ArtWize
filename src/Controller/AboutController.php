<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/à-propos', name: 'à propos')]
    public function index(): Response
    {
        return $this->render('/Pages/about.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
