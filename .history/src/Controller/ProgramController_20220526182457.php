<?php

namespace App\Controller;

use App\Entity\Program;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ProgramController extends AbstractController
{
    #[Route('/program/', name: 'program_index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', ['programs' => $programs]);
    }

    #[Route('program/{id}', requirements: ['id' => '\d+'], name: 'program_show')]
    public function show(Program $program, SeasonRepository $seasonRepository ): Response
    {
        $seasons = $seasonRepository->findBy(['program' => $program]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '. $program .' found in program\'s table.'
            );
        }
    
        return $this->render('program/show.html.twig', [
            'program' => $program, 'seasons' => $seasons,
        ]);
    }


    #[Route('program/{programId}/season/{seasonId}', name: 'program_show_season')]
    #[Entity('program', options: ['id' => 'programId'])]
    #[Entity('season', options: ['id' => 'seasonIDd'])]
    public function showSeason(int $seasonId, int $programId, ProgramRepository $programRepository, SeasonRepository $seasonRepository, EpisodeRepository $episodeRepository ): Response
    {
        $program = $programRepository->findOneBy(['id' => $programId]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '. $programId .' found in program\'s table.'
            );
        }

        $season = $seasonRepository->findOneBy(['id' => $seasonId]);
        if (!$season) {
            throw $this->createNotFoundException(
                'No program with id : '. $seasonId .' found in season\'s table.'
            );
        }
        
        $episodes = $episodeRepository->findBySeason(['season' => $season]);
        if (!$episodes) {
            throw $this->createNotFoundException(
                'No program with id : '. $season .' found in episode\'s table.'
            );
        }
        return $this->render('program/showSeason.html.twig', [
            'program' => $program, 'season' => $season, 'episodes' => $episodes,
        ]);
    }


}
