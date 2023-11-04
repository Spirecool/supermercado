<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository, Request $request): Response
    {
        $category = $request->query->get('category'); 
        $products = $productRepository->findAll();
        $categories = $categoryRepository->findAll();

        if ($category) {
            // Si une catégorie est sélectionnée, filtrez les produits en conséquence
            $products = $productRepository->findByCategory($category); // Supposons que vous ayez une méthode findByCategory dans ProductRepository.
        }

        return $this->render('catalogue/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
