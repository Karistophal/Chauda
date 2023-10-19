<?php

// src/Form/PresentationTextType.php

namespace App\Form;

use App\Entity\Presentation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType; 

class PresentationTextType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('textePresentation', TextareaType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'resize' => 'none',
                ],
            ])
            ->add('experienceText', TextareaType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'background-color: transparent; border: none; outline: none; resize: none; font-family: inherit; font-size: inherit;',
                    'class' => 'card-text', 
                ],
            ])
            ->add('skillsText', TextareaType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'background-color: transparent; border: none; outline: none; resize: none; font-family: inherit; font-size: inherit;',
                    'class' => 'card-text', 
                ],
            ])
            ->add('certificationsText', TextareaType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'style' => 'background-color: transparent; border: none; outline: none; resize: none; font-family: inherit; font-size: inherit;',
                    'class' => 'card-text', 
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
