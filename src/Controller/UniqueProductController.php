<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UniqueProductController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    #[Route('/product/{id}', name: 'Product')]
    public function index(int $id): Response
    {
        $product =$this->em->getRepository(Product::class)->find($id);
        return $this->render('product/product.html.twig', [
            'product' => $product,
        ]);
    }
}
