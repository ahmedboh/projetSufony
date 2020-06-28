<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCli',null,['attr'=>['placeholder'=>" Nom de Client" ]])
            ->add('prenom',null,['attr'=>['placeholder'=> "Prenom de Client" ]])
            ->add('adresse',null,['attr'=>['placeholder'=> "Adresse de Client" ]])
            ->add('email',null,['attr'=>['placeholder'=>" Email de Client" ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
