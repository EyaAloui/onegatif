<?php

namespace App\Controller;

use App\Entity\Donneur;
use App\Form\DonneurType;
use App\Repository\DonneurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/donneur')]
class DonneurController extends AbstractController
{
    #[Route('/', name: 'app_donneur_index', methods: ['GET'])]
    public function index(DonneurRepository $donneurRepository): Response
    {
        return $this->render('donneur/index.html.twig', [
            'donneurs' => $donneurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_donneur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DonneurRepository $donneurRepository): Response
    {
        $donneur = new Donneur();
        $form = $this->createForm(DonneurType::class, $donneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donneurRepository->save($donneur, true);

            return $this->redirectToRoute('app_donneur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('donneur/new.html.twig', [
            'donneur' => $donneur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donneur_show', methods: ['GET'])]
    public function show(Donneur $donneur): Response
    {
        return $this->render('donneur/show.html.twig', [
            'donneur' => $donneur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_donneur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Donneur $donneur, DonneurRepository $donneurRepository): Response
    {
        $form = $this->createForm(DonneurType::class, $donneur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donneurRepository->save($donneur, true);

            return $this->redirectToRoute('app_donneur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('donneur/edit.html.twig', [
            'donneur' => $donneur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_donneur_delete', methods: ['POST'])]
    public function delete(Request $request, Donneur $donneur, DonneurRepository $donneurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$donneur->getId(), $request->request->get('_token'))) {
            $donneurRepository->remove($donneur, true);
        }

        return $this->redirectToRoute('app_donneur_index', [], Response::HTTP_SEE_OTHER);
    }
}
