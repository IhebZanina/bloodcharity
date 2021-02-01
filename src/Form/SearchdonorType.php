<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchdonorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('City', TextType::class, [
                'label' => false,
                'attr' => [
                    'max_length' => 10,
                    'required' => true,
                    'placeholder' => 'Search in',
                    'class' => ' form-control rounded border border-info',
                ]
            ])

            ->add('Search_blood', SubmitType::class, [
                'label' => ' Search',

                'attr' => [
                    'class' => 'section-bg btn btn-lg btn-outline-info rounded  border border-info icofont-search-map ',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
