<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class,['label'=> 'votre prenom',
                'attr'=>[
                    'placeholder'=>'Merci pour votre prenom'
                ]
            ])
            ->add('lastname',TextType::class,['label'=> 'votre nom','attr'=>[
                'placeholder'=>'Veuillez entrer votre nom'
            ]])
            ->add('email',EmailType::class,['label'=> 'votre email','attr'=>[
                'placeholder'=>'Merci pour votre Email'
            ]])
            ->add('password',RepeatedType::class,[
                'type'=> PasswordType::class,
                'invalid_message'=>'le mot de passe et la confirmation doivent etre identique',
                'label'=> 'votre mot de passe',
                'required'=>true,
                'fisrt_options'=>['label'=>'Mot de passe'],
                'second_options'=>['label'=>'Mot de passe']

            ])
            ->add('password_confirm',PasswordType::class,
                [
                    'label'=> 'Confirmez votre mot de passe',
                    'mapped'=> false,
                    'attr'=>[
                'placeholder'=>'MERCI POUR VOTRE mot de passe'

            ]
                ])
            ->add('submit', SubmitType::class,['label'=> 's inscrire']);
        ;


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
