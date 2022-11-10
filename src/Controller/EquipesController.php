<?php

namespace App\Controller;

use App\Repository\GamesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Teams;
use App\Entity\Games;
use App\Entity\Players;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class EquipesController extends AbstractController
{
    #[Route('/equipes', name: 'app_equipes')]
    public function index(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('equipes/index.html.twig', [
            $teams = $doctrine->getRepository(Teams::class)->findBy(array('tag_team' => 'GCO')),
            'teams' => $teams,
            
        ]);
    }

    #[Route('/equipes/{slug}', name: 'app_equipes2')]
    public function teamsComs(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager, GamesRepository $gamesRepository, $slug ): Response
    {   
        
        return $this->render('equipes/teams.html.twig', [
            $teams = $doctrine->getRepository(Teams::class)->findBy(array('tag_team' => 'GCO')),
            'teams' => $teams,
            $slug = str_replace('_',' ', $slug),
            $games = $doctrine->getRepository(Games::class)->findPlayersAndTeamsPerGames($slug),
            'games' => $games,
        ]);
    }
}
