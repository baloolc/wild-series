<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;
use App\Repository\ActorRepository;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use App\Service\Slugify;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/program/new', name: 'program_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProgramRepository $programRepository,Slugify $slugify): Response
    {   
        $program = new Program();
        $slug = $slugify->generate($program->getTitle());
        $program->setSlug($slug);
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $programRepository->add($program, true);
            return $this->redirectToRoute('program_index');
        }

        return $this->renderForm('program/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('program/{slug}', requirements: ['id' => '\d+'], name: 'program_show')]
    public function show(Program $program, SeasonRepository $seasonRepository): Response
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


    #[Route('program/{slug}/season/{season}', name: 'program_show_season')]
    public function showSeason(Program $program, Season $season, EpisodeRepository $episodeRepository): Response
    {
      $episodes = $episodeRepository->findBy(['season' => $season]);
        return $this->render('program/showSeason.html.twig', [
            'program' => $program, 'season' => $season, 'episodes' => $episodes,
        ]);
    }

    #[Route('program/{slug}/season/{season}/episode/{slug}', name: 'program_episode_show')]
    public function showEpisode(Program $program, Season $season, Episode $episode): Response
    {
        return $this->render('program/episode_show.html.twig', [
            'program' => $program, 'season' => $season, 'episode' => $episode,
        ]);
    }
}
