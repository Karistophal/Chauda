<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ContactFormType;
use App\Entity\Contact;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        //Créer un nouveau "contact"
        $contact = new Contact();
        $contact->setSujetContact('TEST');
        $contact->setMessageContact('Message de test voila voila');
         
        //Créer le formulaire
        $contactForm = $this->createForm(ContactFormType::class, $contact);
         
        //Traiter la requête du formulaire
        $contactForm->handleRequest($request);
 
        //Vérifier que le formulaire est soumis et est validé
        if($contactForm->isSubmitted() && $contactForm->isValid())
        {
            $contact->setSujetContact($contactForm->get('sujetContact')->getData());
            $contact->setMessageContact($contactForm->get('messageContact')->getData());
            $contact->setIdUtilContact($contactForm->get('idUtilContact')->getData());
 
            $entityManager->persist($contact);
            $entityManager->flush();
 
        }

        return $this->render('contact/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
