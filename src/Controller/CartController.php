<?php

namespace App\Controller;

use App\Entity\Product;
use App\Services\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/mon-panier', name: 'cart-index')]
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $cartService->getTotal()
        ]);
    }

    #[Route('/mon-panier/add/{id}/{num}', name: 'cart-add')]
    public function addToCart(CartService $cartService, Product $product, int $num): Response
    {
        $cartService->addToCart($product->getId(), $num);
        return $this->redirectToRoute('cart-index');
    }
    
    #[Route('/mon-panier/add/{id}', name: 'decrease')]
    public function decrase(CartService $cartService, Product $product): Response
    {
        $cartService->decrase($product->getId());
        return $this->redirectToRoute('cart-index');

    }

    #[Route('/mon-panier/remove/{id}', name: 'cart-remove')]
    public function removeToCart(CartService $cartService, Product $product): Response
    {
        $cartService->removeToCart($product->getId());
        return $this->redirectToRoute('cart-index');

    }
    
    #[Route('/mon-panier/resete-cart', name: 'cart-resete')]
    public function reseteCart(CartService $cartService): Response
    {
        $cartService->removeCartAll();
        return $this->redirectToRoute('cart-index');

    }
}
