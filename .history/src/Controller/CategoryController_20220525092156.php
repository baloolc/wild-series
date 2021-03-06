<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    #[Route('/category/', name: 'category_index')]
    public function index(): Response
    {
        $category = $programRepository->findAll();
        return $this->render('program/index.html.twig', ['programs' => $programs]);
    }
}