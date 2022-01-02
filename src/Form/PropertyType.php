<?php

namespace App\Form;

use App\Entity\Option;
use App\Entity\Property;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('nbplaces')
            ->add('nbportes')
            ->add('couleur')
            ->add('nbchevaux')
            ->add('price')
            ->add('assurance', ChoiceType::class,[
                'choices' => $this->getChoices()
            ])
            ->add('options',EntityType::class,[
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('marque')
            ->add('origin')
            ->add('serie')
            ->add('sold')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }

    private function getChoices()
    {
        $choices = Property::ASSURANCE;
        $output = [];
        foreach($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }




}


    