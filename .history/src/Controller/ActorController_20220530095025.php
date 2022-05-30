<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Repository\ActorRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actor')]
class ActorController extends AbstractController
{
    #[Route('/actor/{id}', name: 'app_actor_index', methods: ['GET'])]
    public function index(Actor $actor, ActorRepository $): Response
    {
        $programs = $->
        return $this->render('actor/index.html.twig', [
            'actor' => $actor,
        ]);
    }
