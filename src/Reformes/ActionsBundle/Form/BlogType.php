<?php

namespace Reformes\ActionsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DatetimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BlogType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class)
                ->add('corps',TextareaType::class)
                ->add('dateEdition', DateType::class, array(
                    'format' => 'dd MM yyyy'
                ))
                ->add('dateExpiration',DateType::class, array(
                    'format' => 'dd MM yyyy'
                ))
                ->add('stateCode', ChoiceType::class, array(
                    'choices' => array(
                        'Actif' => 'Actif',
                        'Inactif' => 'Inactif',
                        'Permenant' => 'Permenant',
                    ),
                    'attr' => array('class' => 'dropdown')

                ));
//                ->add('dateEdit')
//                ->add('dateCreate');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Reformes\ActionsBundle\Entity\Blog'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reformes_actionsbundle_blog';
    }


}
