<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ContactFormType;
use App\Entity\Contact;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;



class ContactController extends AbstractController
{
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        //Créer un nouveau "contact"
        $contact = new Contact();

        //Récupérer l'utilisateur connecté
        $user = $this->security->getUser(); 

        //Créer le formulaire
        $contactForm = $this->createForm(ContactFormType::class, $contact, [
            'user' => $user,
        ]);
         
        //Traiter la requête du formulaire
        $contactForm->handleRequest($request);
 
        //Vérifier que le formulaire est soumis et est validé
        if($contactForm->isSubmitted() && $contactForm->isValid())
        {
            // Vérifier si un utilisateur est connecté
            if (!$user instanceof UserInterface) {
            // Rediriger l'utilisateur vers la page d'inscription (ajustez le nom de la route selon vos besoins)
            return $this->redirectToRoute('app_login');
            }

            else  {
            $contact->setSujetContact($contactForm->get('sujetContact')->getData());
            $contact->setMessageContact($contactForm->get('messageContact')->getData());
            $contact->setIdUtilContact($user);
 
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_confirm');
            }
 
        }

        // Récupérer la liste des contacts si l'utilisateur a le droit
        $contactList = [];
        if ($user instanceof UserInterface && $user->getDroitUtil() == 1) {
            $contactList = $this->getDoctrine()->getRepository(Contact::class)->findAll();
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
            'contacts' => $contactList,
        ]);
    }

    /**
    * @Route("/contact/delete/{id}", name="app_contact_delete", methods={"DELETE"})
    */
    public function delete(Request $request, Contact $contact): Response
    {
        //Récupérer l'utilisateur connecté
        $user = $this->security->getUser();

        if ($user->getDroitUtil() == 1)
        {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($contact);
        $entityManager->flush();

        return $this->redirectToRoute('app_contact');
        }
        else {
            // Utilisateur sans droits
            $this->addFlash('error', 'Vous n\'avez pas les droits pour supprimer ce contact.');
            return $this->redirectToRoute('app_contact');
        }
    }

    /**
    * @Route("/contact/confirm", name="app_contact_confirm")
    */
    public function confirm(): Response
    {
        return $this->render('contact/confirm.html.twig');
    }
}
