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
    #[Route('/actor/', name: 'app_actor_index', methods: ['GET'])]
    public function index(ActorRepository $actorRepository): Response
    {
        $actor = $actorRepository->findAll();
        return $this->render('actor/index.html.twig', [
            'actor' => $actor
        ]);
    }

    #[Route('/actor/{id}', name: 'actor_show', methods: ['GET'])]
    public function (ActorRepository $actorRepository): Response
    {
        $actor = $actorRepository->findAll();
        return $this->render('actor/index.html.twig', [
            'actor' => $actor
        ]);
    }

}