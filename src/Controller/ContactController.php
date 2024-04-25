<?php

namespace App\Controller;

use App\Entity\Partie;
use App\Form\PartieType;
use App\Repository\PartieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'app_contact', methods: ['GET'])]
    public function index(PartieRepository $partieRepository): Response
    {
        return $this->render('contact.html.twig', [
            'parties' => $partieRepository->findAll(),
        ]);
    }
}