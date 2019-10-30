<?php

namespace App\Form;

use App\Entity\Destination;
use App\Entity\Pays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Ville', TextType::class, [
            'label' => 'Ville de la destination',
            'label_attr' => [
                'class' => 'pr-3'
            ]
        ])
            ->add('Latitude')
            ->add('Longitude')
            ->add('Pays', EntityType::class,[
                'class' => Pays::class,
                'choice_label'=> 'Nom',
                'label' => 'Pays de la destination'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Destination::class,
        ]);
    }
}
