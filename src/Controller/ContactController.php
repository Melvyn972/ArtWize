<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'Contact')]
    public function index(Request $request): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur connecté

        // Crée une nouvelle instance de Contact
        $contact = new Contact();
        $contact->setUtilisateur($user); // Associe l'utilisateur connecté au contact

        // Crée un formulaire en utilisant ContactFormType
        $form = $this->createForm(ContactFormType::class, $contact);

        // Traite la requête du formulaire
        $form->handleRequest($request);

        // Vérifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistre le contact dans la base de données
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            // Redirige vers une page de confirmation ou ailleurs
            return $this->redirectToRoute('Accueil');
        }

        return $this->render('/Pages/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}