<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AjoutPrestaType;
use App\Form\ModifPrestaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;




class PrestationController extends AbstractController
{
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    
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
     * @Route("/prestation/edit/{id}", name="app_prestation_edit")
     */
    public function edit(Request $request, Prestation $prestationSelected): Response
    {
        $prestationModif = $this->getDoctrine()->getRepository(Prestation::class)->find($prestationSelected->getId());

        // Créez le formulaire pour l'édition de la présentation
        $editForm = $this->createForm(ModifPrestaType::class, $prestationModif);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            // Enregistrez les modifications dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Les modifications ont été enregistrées avec succès.');

            return $this->redirectToRoute('app_prestation'); // Redirigez vers la page d'index ou une autre page appropriée.
        }

        return $this->render('prestation/edit.html.twig', [
            'editForm' => $editForm->createView(),
        ]);
    }


    /**
    * @Route("/prestation/delete/{id}", name="app_prestation_delete", methods={"DELETE"})
    */
    public function delete(Request $request, Prestation $prestation): Response
    {
        //Récupérer l'utilisateur connecté
        $user = $this->security->getUser();

        if ($user->getDroitUtil() == 1)
        {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($prestation);
        $entityManager->flush();

        $connection = $entityManager->getConnection();
        $prestationId = $prestation->getId();

        // Requête SQL qui permet de reculer les numéros des prestations après la suppresion
        // Exemple : après la suppresion de la presta n°6, la presta n°7 prend comme id la valeur 6, la 8 prend 7, etc...
        $sql = "UPDATE prestation SET id = id - 1 WHERE id > :prestationId";
        $statement = $connection->prepare($sql);
        $statement->execute(['prestationId' => $prestationId]);

        return $this->redirectToRoute('app_prestation');
        }
        else {
            // Utilisateur sans droits
            $this->addFlash('error', 'Vous n\'avez pas les droits pour supprimer ce contact.');
            return $this->redirectToRoute('app_prestation');
        }
    }

    /**
    * @Route("/prestation/add", name="app_prestation_add")
    */
    public function add(Request $request, EntityManagerInterface $entityManager, Connection $connection): Response
    {
        $Prestation = new Prestation();

        $prestaForm = $this->createForm(AjoutPrestaType::class);

        //Traiter la requête du formulaire
        $prestaForm->handleRequest($request);

        //Vérifier que le formulaire est soumis et est validé
        if($prestaForm->isSubmitted() && $prestaForm->isValid())
        {
            // Utiliser une requête SQL pour trouver le premier ID disponible
            $query = "SELECT id+1 AS available_id
            FROM prestation
            WHERE id+1 NOT IN (SELECT id FROM prestation)
            ORDER BY available_id
            LIMIT 1";

            $statement = $connection->executeQuery($query);
            $result = $statement->fetchAssociative();

            if ($result) {
            $availableId = $result['available_id'];
            } else {
            $availableId = null;
            }

            // Si un ID disponible a été trouvé l'utiliser pour la nouvelle prestation
            if ($availableId !== null) {
            $Prestation->setId($availableId);
            }            

            $Prestation->setLibPrestation($prestaForm->get('libPrestation')->getData());
            $Prestation->setDescPrestation($prestaForm->get('descPrestation')->getData());
            $Prestation->setPrixHT($prestaForm->get('prixHT')->getData());
            $Prestation->setPrixTTC($prestaForm->get('prixTTC')->getData());
            $Prestation->setMainOeuvre($prestaForm->get('mainOeuvre')->getData());
            $Prestation->setDureePrestation($prestaForm->get('dureePrestation')->getData());
            $Prestation->setImage($prestaForm->get('image')->getData());

 
            $entityManager->persist($Prestation);
            $entityManager->flush();

            return $this->redirectToRoute('app_prestation');

        }
        

        return $this->render('prestation/ajout.html.twig', [
            'prestaForm' => $prestaForm->createView()
        ]);
    }
}
