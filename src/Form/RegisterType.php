<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class,['label'=> 'votre prenom',
                'attr'=>[
                    'placeholder'=>'MERCI POUR VOTRE PRENOM'
                ]
            ])
            ->add('lastname',TextType::class,['label'=> 'votre nom','attr'=>[
                'placeholder'=>'MERCI POUR VOTRE NOM'
            ]])
            ->add('email',EmailType::class,['label'=> 'votre EMAIL','attr'=>[
                'placeholder'=>'MERCI POUR VOTRE EMAIL'
            ]])
            ->add('password',PasswordType::class,['label'=> 'votre mot de passe','attr'=>[
                'placeholder'=>'MERCI POUR VOTRE mot de passe'
            ]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
