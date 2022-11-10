<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\EventsRepository;
use App\Entity\Events;
use App\Entity\Games;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {   
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            $events = $doctrine->getRepository(Events::class)->FindBy([], ['id' => 'DESC']),
            'events' => $events,
            $games = $doctrine->getRepository(Games::class)->FindAll(),
            'games' => $games,
        ]);
       
    }
}
