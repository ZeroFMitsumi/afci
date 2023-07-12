<?php

namespace App\Controller;

use App\Services\PwdGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(name: 'app_')]
class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(PwdGenerator $pwdGen): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
