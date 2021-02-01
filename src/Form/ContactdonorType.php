<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactdonorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('First_Name',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => false,
                    'placeholder' => 'Your Name',  
                    'class' => 'form-control rounded border border-info',
                ]
            ])


                ->add('Last_Name',  EmailType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 25, 'required' => true,
                    'placeholder' => 'Your Email',
                    'class' => 'form-control rounded border border-info',

                ]
            ])

                ->add('City',  TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 25, 'required' => true,
                    'placeholder' => 'Subject',  
                    'class' => 'form-control rounded border border-info',
                ]
            ])

                ->add('CIN_Passport',  TextareaType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 50, 'required' => true,
                    'placeholder' => 'Message',  
                    'class' => 'form-control rounded border border-info ',
                    'name'=>'message',
                ]
            ])

                ->add('Send_Message', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

