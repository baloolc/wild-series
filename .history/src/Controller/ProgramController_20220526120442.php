<?php

namespace App\Controller;

use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
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
    public function show(int $id, ProgramRepository $programRepository, SeasonRepository $seasonRepository ): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
        $seasons = $seasonRepository->findBy(['program' => $program]);
    
        return $this->render('program/show.html.twig', [
            'program' => $program, 'seasons' => $seasons,
        ]);
    }


    #[Route('program/{program_id}/season/{season_id}', requirements: ['season_id' => '\d+'], name: 'program_show_season')]
    public function showSeason(int $seasonId, int $programId, ProgramRepository $programRepository, SeasonRepository $seasonRepository, EpisodeRepository $episodeRepository ): Response
    {
        $program = $programRepository->findOneBy(['program_id' => $programId]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$programId.' found in program\'s table.'
            );
        }

        $season = $seasonRepository->findOneBy(['season_id' => $seasonId]);
        if (!$season) {
            throw $this->createNotFoundException(
                'No program with id : '.$seasonId.' found in program\'s table.'
            );
        }
        
        $episodes = $episodeRepository->findBy(['season' => $season]);
        if (!$episodes) {
            throw $this->createNotFoundException(
                'No program with id : '.$episodeId.' found in program\'s table.'
            );
        }
        return $this->render('program/showSeason.html.twig', [
            'program' => $program, 'season' => $season, 'episodes' => $episodes,
        ]);
    }


}
