<?php

namespace App\Controller;

use App\Entity\Appartenir;
use App\Form\AppartenirType;
use App\Repository\AppartenirRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/appartenir')]
class AppartenirController extends AbstractController
{
    #[Route('/', name: 'app_appartenir_index', methods: ['GET'])]
    public function index(AppartenirRepository $appartenirRepository): Response
    {
        return $this->render('appartenir/index.html.twig', [
            'appartenirs' => $appartenirRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_appartenir_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appartenir = new Appartenir();
        $form = $this->createForm(AppartenirType::class, $appartenir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appartenir);
            $entityManager->flush();

            return $this->redirectToRoute('app_appartenir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartenir/new.html.twig', [
            'appartenir' => $appartenir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartenir_show', methods: ['GET'])]
    public function show(Appartenir $appartenir): Response
    {
        return $this->render('appartenir/show.html.twig', [
            'appartenir' => $appartenir,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_appartenir_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appartenir $appartenir, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AppartenirType::class, $appartenir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_appartenir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('appartenir/edit.html.twig', [
            'appartenir' => $appartenir,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appartenir_delete', methods: ['POST'])]
    public function delete(Request $request, Appartenir $appartenir, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appartenir->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($appartenir);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_appartenir_index', [], Response::HTTP_SEE_OTHER);
    }
}
