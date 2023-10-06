<?php

namespace App\Controller;

use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function index(): Response
    {
        $prestation1 = $this->getDoctrine()->getRepository(Prestation::class)->find(1);
        $prestation2 = $this->getDoctrine()->getRepository(Prestation::class)->find(2);
        $prestation3 = $this->getDoctrine()->getRepository(Prestation::class)->find(3);
        $prestation4 = $this->getDoctrine()->getRepository(Prestation::class)->find(4);



        return $this->render('prestation/index.html.twig', [
            "prestation1" => $prestation1,
            "prestation2" => $prestation2,
            "prestation3" => $prestation3,
            "prestation4" => $prestation4,

        ]);
    }
}
