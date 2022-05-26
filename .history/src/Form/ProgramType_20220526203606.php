<?php

namespace App\Form;

use App\Entity\Category;
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
            ->add('title', TextType::class, ['placeholder' => 'Titre'])
            ->add('synopsis', TextType::class, ['placeholder' => 'Synopsis'])
            ->add('poster', TextType::class, [
                'required' => false,])
            ->add('country', TextType::class , ['placeholder' => 'Le pays'])
            ->add('year', TextType::class, ['placeholder' => 'L\'anné'])
            ->add('category', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
            'data_class' => Category::class,
        ]);
    }
}
