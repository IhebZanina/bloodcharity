<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoctorRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('UserName',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'UserName',  
                    'class' => 'form-control rounded border border-danger input',
                ]
            ])


            ->add('Password',  PasswordType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Password',
                    'data-rule'=>"minlen:4" ,'data-msg'=>"Please enter at least 4 chars",
                    'class' => 'form-control rounded border border-danger',
                ]
            ])
            ->add('ConfirmPassword',  PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Confirm Password',
                    'data-rule'=>"minlen:4" ,'data-msg'=>"Please enter at least 4 chars",
                    'class' => 'form-control rounded border border-danger',
                ]
            ])

            
            

            ->add('Add_User', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
