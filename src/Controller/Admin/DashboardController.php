<?php

namespace App\Controller\Admin;

use App\Entity\Events;
use App\Entity\Games;
use App\Entity\Players;
use App\Entity\Teams;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UsersCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GCO');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('User', 'fa-solid fa-user', Users::class);
        yield MenuItem::linkToCrud('Events', 'fa-solid fa-headphones', Events::class);
        yield MenuItem::linkToCrud('Jeux', 'fa-duotone fa-book', Games::class);
        yield MenuItem::linkToCrud('Joueurs', 'fa-duotone fa-book', Players::class);
        yield MenuItem::linkToCrud('Equipe', 'fa-duotone fa-book', Teams::class);
    }
}
