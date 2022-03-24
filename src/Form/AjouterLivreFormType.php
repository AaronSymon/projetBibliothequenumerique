<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjouterLivreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('datePublication')
            ->add('Auteur', EntityType::class, [
                'class'=> Auteur::class,
                'choice_label'=> function(Auteur $auteur){

                return $auteur->getPrenom() . $auteur->getNom() ;
                },
                'mapped'=> true,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('ajouterLivre',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
