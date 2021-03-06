<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('synopsis', TextType::class, ['label' => 'Synopsis'])
            ->add('poster', TextType::class, [
                'required' => false, 'label' => 'Photo'])
            ->add('country', TextType::class , ['label' => 'Le pays'])
            ->add('year', TextType::class, ['placeholder' => 'L\'année'])
            ->add('category', TextType::class, ['placeholder' => 'Catégorie'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
