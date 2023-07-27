<?php

namespace App\Controller\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[Route('', name: 'app_')]
class UserDashboardController extends AbstractDashboardController
{
    #[Route('/profile', name: 'user')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AFCI');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Utilisateurs');

        yield MenuItem::subMenu('Mes Infos', 'fas fa-bar')->setSubItems([

            MenuItem::linkToCrud('Show Utilisateurs', 'fas fa-eye', Users::class),

            MenuItem::section('Etat civile'),
            MenuItem::linkToCrud('Show CivilStates', 'fas fa-eye', CivilState::class),

            MenuItem::section('Situation d\'emploi'),
            MenuItem::linkToCrud('Show EmploymentSituation', 'fas fa-eye', EmploymentSituation::class),

            MenuItem::section('Formation'),
            MenuItem::linkToCrud('Show Formation', 'fas fa-eye', Formation::class),
        ]);
    }
}
