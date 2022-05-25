<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
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

    #[Route('category/{name}', name: 'category_show')]
    public function show(string $name, ProgramRepository $programRepository, CategoryRepository $categoryRepository ): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $name]);
        if(!$category)
        {

            {% extends 'base.html.twig' %}


            {% block title %}Série #{{ program.id }}{% endblock %}
            
            
            {% block body %}
                <div class="media">
                    <img class="align-self-start mr-3" src="{{program.poster}}" alt="{{ program.title }} poster">
                    <div class="media-body">
                        <h1 class="mt-0">{{ program.title }}</h1>
                        <p>{{ program.synopsis }}</p>
                        <p>Catégorie : {{ program.category.name }}</p>
                    </div>
                </div>
                <a href="{{ path('program_index') }}">
                    Retour à la liste des programmes
                </a>
            {% endblock %}


            $programs = $programRepository->findOneByName(['category' => $category]);

            if (!$programs) {
                throw $this->createNotFoundException(
                   'No program with category : '. $programs .' found in program\'s table.'
                );
            }
        
        else{
            X

       
    
        return $this->render('category/show.html.twig', [
            'programs' => $programs, 'category' => $category,
        ]);
    }
}