<?php

namespace App\Controller;

use App\Entity\AdminAjout;
use App\Services\PwdGenerator;
use App\Form\AdminAjoutFormType;
use App\Entity\InformationSession;
use App\Form\InformationSessionFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path:'', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route(path: '/form/{id}', name: 'demoform')]
    public function form(
        int $id,
        Request $req
        ): Response
    {
        if ($id === 1) {
            
            $adminAjout = new AdminAjout();
            $form = $this->createForm(AdminAjoutFormType::class, $adminAjout);
            $form->handleRequest($req);

            if ($form->isSubmitted() && $form->isValid()) {
                // Si valide
            }

            return $this->render('_trait/_adminAjout.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {
            
            $infoForm = new InformationSession();
            $form = $this->createForm(InformationSessionFormType::class, $infoForm);
            $form->handleRequest($req);

            if ($form->isSubmitted() && $form->isValid()) {
                // Si valide
            }

            return $this->render('_trait/_infoSession.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
}