<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/matchs')]
class MatchsController extends AbstractController
{
    #[Route('/', name: 'app_matchs')]
    public function matchs(): Response
    {
        return $this->render('matchs.html.twig');
    }
}