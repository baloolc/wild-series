<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    #[Route('/category/', name: 'category_index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('Category/index.html.twig', ['categories' => $categories]);
    }

    #[Route('category/{categoryName}', name: 'category_show')]
    public function show(string $categoryName,  ): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        if (!$categoryName) {
            throw $this->createNotFoundException(
                'Erreur 404'
            );
        }
    
        return $this->render('category/show.html.twig', [
            'program' => $program,
        ]);
    }
}