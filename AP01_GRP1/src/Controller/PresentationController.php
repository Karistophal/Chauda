<?php
// src/Controller/PresentationController.php

namespace App\Controller;

use App\Entity\Presentation;
use App\Form\PresentationTextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="app_presentation")
     */
    public function index(): Response
    {
        // Remplacez 1 par l'ID de votre présentation
        $presentation = $this->getDoctrine()->getRepository(Presentation::class)->find(1);

        return $this->render('presentation/index.html.twig', [
            'presentation' => $presentation,
        ]);
    }

    /**
     * @Route("/presentation/edit", name="app_presentation_edit")
     */
    public function edit(Request $request): Response
    {
        // Chargez la présentation depuis la base de données en utilisant l'ID 1
        $presentation = $this->getDoctrine()->getRepository(Presentation::class)->find(1);

        if (!$presentation) {
            throw $this->createNotFoundException('Aucune présentation trouvée avec l\'ID 1.');
        }

        // Créez le formulaire pour l'édition de la présentation
        $form = $this->createForm(PresentationTextType::class, $presentation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrez les modifications dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Les modifications ont été enregistrées avec succès.');

            return $this->redirectToRoute('app_presentation'); // Redirigez vers la page d'index ou une autre page appropriée.
        }

        return $this->render('presentation/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
