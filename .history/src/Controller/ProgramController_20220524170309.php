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
        $programs = $program->findAll();
        return $this->render('program/index.html.twig', ['programs' => $programs]);
    }

    #[Route('/program/{id}/', methods: ['GET'], requirements: ['id'=>'\d+'], name: 'program_show')]
    public function show(int $id, ProgramRepository $programRepository ): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        // same as $program = $programRepository->find($id);
    
    
        if (!$program) {
    
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
    
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }
}
