<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


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
            ->add('messageContact', TextType::class, [
                'label' => 'Message :',
                'attr' => [
                    'placeholder' => 'Message',
                ]
            ])
            ->add('idUtilContact')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
