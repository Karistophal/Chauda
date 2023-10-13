<?php

namespace App\Controller;

use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AjoutPrestaType;
use Doctrine\ORM\EntityManagerInterface;



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

    /**
     * @Route("/edit", name="app_prestation_edit")
     */
    public function edit(Request $request): Response
    {
        return $this->render('prestation/edit.html.twig');
    }


    /**
    * @Route("/prestation/delete/{id}", name="app_prestation_delete", methods={"DELETE"})
    */
    public function delete(Request $request, Prestation $prestation): Response
    {
        return $this->redirectToRoute('app_contact');
    }

    /**
    * @Route("/prestation/add", name="app_prestation_add")
    */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $Prestation = new Prestation();

        $prestaForm = $this->createForm(AjoutPrestaType::class);

        //Traiter la requête du formulaire
        $prestaForm->handleRequest($request);

        //Vérifier que le formulaire est soumis et est validé
        if($prestaForm->isSubmitted() && $prestaForm->isValid())
        {
            $Prestation->setLibPrestation($prestaForm->get('libPrestation')->getData());
            $Prestation->setDescPrestation($prestaForm->get('descPrestation')->getData());
            $Prestation->setPrixHT($prestaForm->get('prixHT')->getData());
            $Prestation->setPrixTTC($prestaForm->get('prixTTC')->getData());
            $Prestation->setMainOeuvre($prestaForm->get('mainOeuvre')->getData());
            $Prestation->setDureePrestation($prestaForm->get('dureePrestation')->getData());

 
            $entityManager->persist($Prestation);
            $entityManager->flush();
        }
        

        return $this->render('prestation/ajout.html.twig', [
            'prestaForm' => $prestaForm->createView()
        ]);
    }
}
