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
                ->add('FirstName',  TextType::class, [
                'mapped' => false,
                'label' => false,
                'attr' => [
                    'max_length' => 15, 'required' => false,
                    'placeholder' => 'Your Name',  
                    'class' => 'form-control rounded border border-danger',
                ]
            ])


                ->add('MyEmail',  EmailType::class, [
                'mapped' => false,

                'label' => false,
                'attr' => [
                    'max_length' => 25, 'required' => true,
                    'placeholder' => 'Your Email',
                    'class' => 'form-control rounded border border-danger',

                ]
            ])

                ->add('Subject',  TextType::class, [
                'mapped' => false,
                'label' => false,
                'attr' => [
                    'max_length' => 25, 'required' => true,
                    'placeholder' => 'Subject',  
                    'class' => 'form-control rounded border border-danger',
                ]
            ])

                ->add('Message',  TextareaType::class, [
                'mapped' => false,
                'label' => false,
                'attr' => [
                    'max_length' => 50, 'required' => true,
                    'placeholder' => 'Message',  
                    'class' => 'form-control rounded border border-danger ',
                    'name'=>'message',
                ]
            ])

                ->add('Send_Message', SubmitType::class);
    }

  
}

