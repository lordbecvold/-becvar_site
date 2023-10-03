<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/*
    Home Controller is a main app controller for handle homepage
*/

class HomeController extends AbstractController
{
    #[Route(['/', '/home'], name: 'home')]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }
}
