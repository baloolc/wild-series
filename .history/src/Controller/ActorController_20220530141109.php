<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Repository\ActorRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ActorController extends AbstractController
{
    #[Route('/actor', name: 'actor_index', methods: ['GET'])]
    public function index(ActorRepository $actorRepository): Response
    {
        $actors = $actorRepository->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors
        ]);
    }

    #[Route('/actor/{id}', name: 'actor_show', methods: ['GET'])]
    public function show(Actor $actor ): Response
    {
        $programs = $actor->getPrograms();

        return $this->render('actor/show.html.twig', [
            'actor' => $actor, 'programs' => $programs
        ]);
    }

}