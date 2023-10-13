<?php

namespace App\Form;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutPrestaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libPrestation', TextareaType::class, [
                'label' => 'Libellé de la prestation :',
            ])
            ->add('descPrestation', TextareaType::class, [
                'label' => 'Message :',
                'attr' => [
                    'rows' => 10,
                    'style' => 'resize: vertical'
                    ]
            ])
                    
            ->add('prixHT')
            ->add('prixTTC')
            ->add('mainOeuvre')
            ->add('dureePrestation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class,
        ]);
    }
}
