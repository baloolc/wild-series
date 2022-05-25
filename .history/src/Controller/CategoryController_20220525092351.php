<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    #[Route('/category/', name: 'category_index')]
    public function index(Cate): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', ['programs' => $programs]);
    }
}