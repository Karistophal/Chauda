<?php

namespace App\Form;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ModifPrestaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libPrestation', TextType::class, [
                'label' => 'Libellé de la prestation : ',
            ])
            ->add('descPrestation', TextareaType::class, [
                'label' => 'Message : ',
                'attr' => [
                    'rows' => 10,
                    'style' => 'resize: vertical',
                ]
            ])
                    
            ->add('prixHT', NumberType::class, [
                'html5' => true,
                'label' => 'Prix HT (€) : ',
            ])

            ->add('prixTTC', NumberType::class, [
                'html5' => true,
                'label' => 'Prix TTC (€) : ',
            ])

            ->add('mainOeuvre', NumberType::class, [
                'html5' => true,
                'label' => "Main d'oeuvre nécessaire : ",
            ])

            ->add('dureePrestation', NumberType::class, [
                'html5' => true,
                'label' => 'Durée de la prestation (en heure(s)) : ',
            ])

            ->add('image', TextareaType::class, [
                'label' => "Lien de l'image : "
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class,
        ]);
    }
}
