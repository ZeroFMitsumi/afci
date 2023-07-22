<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Formation;
use App\Entity\AdminAjout;
use App\Entity\CivilState;
use App\Entity\InformationSession;
use App\Entity\EmploymentSituation;
use App\Controller\Admin\UsersCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Factory\MenuFactory;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[Route("", name: 'app_')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator,
        private AdminContextProvider $adminContextProvider
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Vous devez être connecté pour accéder à cette page.');
        // return parent::index();
        // $url = $this->adminUrlGenerator
        //     ->setController(UsersCrudController::class)
        //     ->generateUrl();

        // return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AFCI');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Administration Session');

        yield MenuItem::subMenu('Informations', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Create Session', 'fas fa-plus-circle', InformationSession::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Sessions', 'fas fa-eye', InformationSession::class),
        ]);

        yield MenuItem::subMenu('Ajout Stagiaire', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Create Stagiaire', 'fas fa-plus-circle', AdminAjout::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Stagiaires', 'fas fa-eye', AdminAjout::class),
        ]);

        yield MenuItem::section('Utilisateurs');

        yield MenuItem::subMenu('Infos', 'fas fa-id-card')->setSubItems([

            MenuItem::linkToCrud('Voir les Utilisateurs', 'fas fa-eye', Users::class),
            MenuItem::linkToCrud('Créer Utilisateur', 'fas fa-plus-circle', Users::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Etat civile', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Show CivilStates', 'fas fa-eye', CivilState::class),
            MenuItem::linkToCrud('Create CivilState', 'fas fa-plus-circle', CivilState::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Situation d\'emploi', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Show EmploymentSituation', 'fas fa-eye', EmploymentSituation::class),
            MenuItem::linkToCrud('Create EmploymentSituation', 'fas fa-plus-circle', EmploymentSituation::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Formation', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Show Formation', 'fas fa-eye', Formation::class),
            MenuItem::linkToCrud('Create Formation', 'fas fa-plus-circle', Formation::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
