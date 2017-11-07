<?php

namespace Sides\PollBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Sides\PollBundle\Form\OpinionType;

/**
 * PollType
 */
class PollType extends AbstractType {

    /**
     * Build Form
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class)
                ->add('published', CheckboxType::class, array(
                    'label' => 'Published ?',
                    'required' => false,
                ))
                ->add('closed', CheckboxType::class, array(
                    'label' => 'Closed ?',
                    'required' => false,
                ))
                ->add('opinions', CollectionType::class, array(
                    'entry_type' => OpinionType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
        ));
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName() {
        return 'poll';
    }

    /**
     * Set Default Options
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'opinion_form' => 'Sides\PollBundle\Form\OpinionType',
            'cascade_validation' => true
        ));
    }

}
