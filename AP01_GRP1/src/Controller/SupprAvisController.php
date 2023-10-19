<?php

namespace App\Controller;

use App\Entity\Avis;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class SupprAvisController extends AbstractController
{
    /**
     * @Route("/avis/supp", name="app_suppr_avis")
     */
    public function delete(Request $request, EntityManagerInterface $entityManager ): Response
    {
        $id = $request->query->get('value');

        $avis = $entityManager->getRepository(Avis::class)->find($id);

        if(!$avis) {
            throw $this->createNotFoundException('Avis non trouvé');
        }

        $entityManager->remove($avis);
        $entityManager->flush();

        return $this->redirectToRoute('avis');
    }
}
