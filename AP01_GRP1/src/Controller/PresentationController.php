<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'app_presentation')]
    public function index(): Response
    {
        if ($this->getUser() && $this->getUser()->getDroitUtil() === 1) 
            $droit = 1; // Vous devriez attribuer la valeur 1 à la variable $droit
        else 
            $droit = 0; // Assurez-vous d'avoir également une valeur par défaut si l'utilisateur n'a pas le droi
        
        return $this->render('presentation/index.html.twig', [
            'controller_name' => 'PresentationController',
            'droit' => $droit,
        ]);
    }
}
