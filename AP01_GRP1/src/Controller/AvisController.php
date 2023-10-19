<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use App\Form\AvisFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\UserInterface;



class AvisController extends AbstractController
{

    /**
     * @Route("/avis", name="app_avis")
     */
    public function index(AvisRepository $avisBase, Request $request): Response
    {

        $lesAvis = $avisBase->findAll();

        //calcul moyenne avis
        $somme = 0;
        $nbAvis = 0;
        foreach ($lesAvis as $leAvis) {
            $somme += $leAvis->getNoteAvis();
            $nbAvis++;
        }
        if ($nbAvis > 0) {
            $moyAvis = round(($somme / $nbAvis) * 2) / 2;
        } else {
            $moyAvis = 0;
        }   



        $leAvis = new Avis();

        $form = $this->createForm(AvisFormType::class, $leAvis);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($leAvis);
            $entityManager->flush();

        }
        

        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'lesAvis' => $lesAvis,
            'moyAvis' => $moyAvis,
            'nbAvis' => $nbAvis,
        ]);
    }

}