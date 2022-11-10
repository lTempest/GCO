<?php

namespace App\Controller;

use App\Entity\Events;
use App\Entity\EtatsEvents;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementsController extends AbstractController
{
    #[Route('/evenements', name: 'app_evenements')]
    public function index(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('evenements/index.html.twig', [
            'controller_name' => 'EvenementsController',
            $etats = $doctrine->getRepository(EtatsEvents::class)->findBy(array('id' => '1')),
            'etats' => $etats,
            $events = $doctrine->getRepository(Events::class)->findBy(array('etatevents' => $etats),array( 'id' => 'DESC')),
            'events' => $events,
        ]);
    }

    #[Route('/evenements/encours', name: 'app_evenements2')]
    public function encours(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('evenements/eventsencours.html.twig', [
            $etats = $doctrine->getRepository(EtatsEvents::class)->findBy(array('id' => '2')),
            'etats' => $etats,
            $events = $doctrine->getRepository(Events::class)->findBy(array('etatevents' => $etats),array( 'id' => 'DESC')),
            'events' => $events,
        ]);
    }

    #[Route('/evenements/precedent', name: 'app_evenements3')]
    public function precedents(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->render('evenements/eventsprecedents.html.twig', [
            $etats = $doctrine->getRepository(EtatsEvents::class)->findBy(array('id' => '3')),
            'etats' => $etats,
            $events = $doctrine->getRepository(Events::class)->findBy(array('etatevents' => $etats),array( 'id' => 'DESC')),
            'events' => $events,
        ]);
    }
}
