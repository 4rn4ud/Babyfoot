<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Equipe;
use App\Form\EquipeType;
use App\Repository\EquipeRepository;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(EquipeRepository $equipeRepository): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
            'equipes' => $equipeRepository->findClassement(),
        ]);
    }
}