<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ProgramController extends AbstractController
{
    #[Route('/program/', name: 'program_index')]
    public function index(ProgramRepository $program): Response
    {
        $programs = $program->
        return $this->render('program/index.html.twig', ['website' => 'Wild Series',]);
    }

    #[Route('/program/{id}/', methods: ['GET'], requirements: ['id'=>'\d+'], name: 'program_show')]
    public function show(int $id ): Response
    {
        return $this->render('program/show.html.twig', ['id' => $id]);
    }
}
