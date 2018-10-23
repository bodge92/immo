<?php

namespace App\Form;

use App\Entity\Disponibilite;
use App\Entity\Proprietaire;
use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;   

class DisponibiliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDispoStart')
            ->add('dateDispoEnd')
            ->add('proprietaire', EntityType::class, array(
                'class'=> Proprietaire::class,
                'choice_label'=> 'nomprop'
            )
            )
            ->add('annonce', EntityType::class, array(
                'class'=> Annonce::class,
                'choice_label'=>'adressemailbien'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Disponibilite::class,
        ]);
    }
}
