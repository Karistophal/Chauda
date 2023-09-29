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

            $contact->setSujetContact($contactForm->get('sujetContact')->getData());
            $contact->setMessageContact($contactForm->get('messageContact')->getData());
            $contact->setIdUtilContact($user);
 
            $entityManager->persist($contact);
            $entityManager->flush();
 
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }

    /**
     * @Route("/contact/liste", name="app_contact_liste")
     */
    public function listeContacts()
    {
        $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->render('contact/liste.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
