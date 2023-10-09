<?php

namespace App\Controller;

use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function index(): Response
    {
        $prestations = $this->getDoctrine()->getRepository(Prestation::class)->findAll();

        return $this->render('prestation/index.html.twig', [
            "prestations" => $prestations,
        ]);
    }
}
