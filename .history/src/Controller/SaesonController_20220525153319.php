<?php

namespace App\Controller;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class SeasonController extends AbstractController
{
    #[Route('/season/', name: 'season_index')]
    public function index(SeasonRepository $seasonRepository): Response
    {
        $seasons = $programRepository->findAll();
        return $this->render('season/index.html.twig', ['programs' => $programs]);
    }

    #[Route('program/{id}', requirements: ['id' => '\d+'], name: 'program_show')]
    public function show(int $id, ProgramRepository $programRepository ): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

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