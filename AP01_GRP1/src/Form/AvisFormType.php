<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class AvisFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreAvis', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Titre de l'avis",
                    'cols' => "30",
                    'rows' => "1",
                    'style' => "font-weight:700; margin-bottom:10px"
                ],
                'label' => false,
                ])
            ->add('texteAvis', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Partager votre experience",
                    'cols' => "30",
                    'rows' => "10"
                ],
                'label' => false,
            ])
            ->add('noteAvis', HiddenType::class, [
                'data' => '0',
                
            ])
            ->remove('idUtilAvis')
            ->remove('dateAvis')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
