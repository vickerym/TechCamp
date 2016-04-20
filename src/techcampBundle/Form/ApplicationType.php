<?php

namespace techcampBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('student', null, array('attr' => array('style'=> 'display:none;')))
            ->add('camp', null, array('attr' => array('style'=> 'display:none;')))
			->add('reviewed')
			->add('accepted')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'techcampBundle\Entity\Application'
        ));
    }
}
