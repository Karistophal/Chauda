<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Validator\Constraints\RegexConstraint;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomUtil', TextType::class, [
                'label' => 'Nom :',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'register-input',
                ],
                'label_attr' => [
                    'class' => 'register-label',
                ],
                'constraints' => [
                    new RegexConstraint([
                        'fieldName' => 'prenomUtil',
                    ]),
                ],
            ])
            ->add('prenomUtil', TextType::class, [
                'label' => 'Prénom :',
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => 'register-input',
                ],
                'label_attr' => [
                    'class' => 'register-label',
                ],
                'constraints' => [
                    new RegexConstraint([
                        'fieldName' => 'nomUtil',
                    ]),
                ],
            ])
            ->add('emailUtil', EmailType::class, [
                'label' => 'Email :',
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'register-input',
                ],
                'label_attr' => [
                    'class' => 'register-label',
                ],
            ])
            ->remove('loginUtil')
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'first_options' => [
                    'label' => 'Mot de passe :',
                    'label_attr' => ['class' => 'register-label'],
                    'error_bubbling' => true,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Mot de passe',
                        'class' => 'register-password-input',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe :',
                    'label_attr' => ['class' => 'register-label'],
                    'error_bubbling' => true,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Confirmer votre mot de passe',
                        'class' => 'register-password-input',
                    ],
                    'invalid_message' => 'Les mots de passe ne correspondent pas.',
                ],
                'constraints' => [
                    new RegexConstraint(), // Utilisation de la contrainte personnalisée
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
