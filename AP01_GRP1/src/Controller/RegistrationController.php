<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */

     private $security;

     public function __construct(Security $security)
     {
         $this->security = $security;
     }

     public function index(Security $security): Response
     {
         // Si l'utilisateur est déjà connecté, redirigez-le vers la page de présentation
         if ($security->getUser()) {
             return $this->redirectToRoute('presentation');
         }
     
         return $this->redirectToRoute('app_register');
     }

    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateur();
        $user->setDroitUtil(0);
        $user->setLoginUtil('test');
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the plain password
            $user->setMdpUtil(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Set additional fields from the form
            $user->setNomUtil($form->get('nomUtil')->getData());
            $user->setPrenomUtil($form->get('prenomUtil')->getData());

            $entityManager->persist($user);
            $entityManager->flush();
            // Do anything else you need here, like sending an email

            return $this->redirectToRoute('/preview');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
