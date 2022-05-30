<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CategoryType;

class CategoryController extends AbstractController
{
    #[Route('/category/', name: 'category_index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('Category/index.html.twig', ['categories' => $categories]);
    }

    #[Route('category/{name}', name: 'category_show')]
    public function show(string $name, ProgramRepository $programRepository, CategoryRepository $categoryRepository ): Response
    {
        $category = $categoryRepository->findOneByName(['name' => $name]);
        if(!$category)
        {
            throw $this->createNotFoundException(
                'No category with name : '. $category .' found in category\'s table.'
            );
        }
        
        $programs = $programRepository->findBy(['category' => $category]);

            if (!$programs) {
                throw $this->createNotFoundException(
                   'No program with category : '. $programs .' found in program\'s table.'
                );
            }      
    
        return $this->render('Category/show.html.twig', [
            'programs' => $programs, 'category' => $category,
        ]);
    }

    #[Route('/new', name: 'new')]

    public function new(): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        return $this->renderForm('category/new.html.twig', [
            'form' => $form,
        ]);
    }
}