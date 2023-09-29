<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;



class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujetContact', TextType::class, [
                'label' => 'Sujet :',
                'attr' => [
                    'placeholder' => 'Sujet',
                ]
            ])

            ->add('messageContact', TextareaType::class, [
                'label' => 'Message :',
                'attr' => [
                    'rows' => 6,
                    'placeholder' => 'Message',
                    'class' => 'msg',
                    'style' => 'resize: vertical',
                    ]
            ])
            ->add('idUtilContact')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'user' => null,
        ]);
    }
}
