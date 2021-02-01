<?php

namespace App\Form;

use App\Entity\Donor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BlooddonorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('CIN_Passport',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'CIN or Passport Number',  
                    'class' => 'form-control rounded border border-info input',
                ]
            ])


            ->add('First_Name',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'First Name',
                    'data-rule'=>"minlen:4" ,'data-msg'=>"Please enter at least 4 chars",
                    'class' => 'form-control rounded border border-info',
                ]
            ])

            ->add('Last_Name',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Last Name',
                    'class' => 'form-control rounded border border-info',

                ]
            ])

            ->add('Email',  EmailType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 30, 'required' => true,
                    'placeholder' => 'Email',
                    'class' => 'form-control rounded border border-info',

                ]
            ])

            ->add('Country', TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Country',
                    'class' => '  form-control rounded border border-info',
                ]
            ])

            ->add('City', TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'City',
                    'class' => '  form-control rounded border border-info',
                ]
            ])


            ->add('Phone', TelType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Phone Number',
                    'class' => 'form-control rounded border border-info',
                ]
            ])

           ->add('Age', DateType::class, [
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
              'label' => false,
                'attr' => [
                    'required' => true,
                   
                    'class' => 'form-control rounded border border-info',
                ]
            ])

            /*->add('Blood_Type', TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 3, 'required' => true,
                    'placeholder' => 'Your Blood Type',
                    'class' => 'form-control ',
                ]
            ]) */


              ->add('Job', TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => true,
                    'placeholder' => 'Job',
                    'class' => '  form-control rounded border border-info',
                ]
            ])

            ->add('Genre', ChoiceType::class,  [
                'placeholder' => 'Sexe',
                'label' => false,
                'choices' => [
                    'Female' => 'Female',
                    'Male' => 'Male',
                    'Other' => 'Other',
                ],
                'attr' => [
                    'required' => true,
                    'class' => ' btn btn-outline-info dropdown-toggle dropdown-item border border-info rounded bg-white',
                ],
            ])

            

            ->add('Donate_blood', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Donor::class,
        ]);
    }
}
