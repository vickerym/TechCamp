<?php

namespace techcampBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('gradeLevel')
            ->add('schoolName')
            ->add('ethnicity')
            ->add('shirtSize')
			->add('canPickUp')
			->add('canPickUp2')
			->add('emergencyName')
			->add('relationship')
			->add('emergencyNumber')
			->add('emergencyAdditionalPhone')
			->add('emergencyAdditionalComments');
			
			if(isset($options['attr']['reviewed']) && $options['attr']['reviewed'] == true)
			{
				$builder->add('reviewed');
			}     
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'techcampBundle\Entity\Student'
        ));
    }
}
