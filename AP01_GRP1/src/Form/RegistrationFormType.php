<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
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
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Mot de passe',
                        'class' => 'register-password-input',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe :',
                    'label_attr' => ['class' => 'register-label'],
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'placeholder' => 'Confirmer votre mot de passe',
                        'class' => 'register-password-input',
                    ],
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'S\'il vous plaît entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractère',
                        'max' => 64,
                    ]),
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
