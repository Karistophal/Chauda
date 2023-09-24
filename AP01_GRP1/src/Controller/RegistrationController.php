<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    ): Response {
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

            return $this->redirectToRoute('presentation');
        }

        // Vérifiez la contrainte de validation personnalisée (regex)
        $errors = $validator->validate($user);
        foreach ($errors as $error) {
            if ($error->getPropertyPath() === 'plainPassword') {
                $form->get('plainPassword')->addError(new ConstraintViolation(
                    $error->getMessage(),
                    $error->getMessage(),
                    [],
                    $user,
                    'plainPassword',
                    $error->getInvalidValue(),
                    null,
                    $error->getCode()
                ));
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
