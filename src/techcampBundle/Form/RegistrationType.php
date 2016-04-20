<?php

namespace techcampBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('firstName')
				->add('lastName')
				->add('email')
				->add('phoneNumber')
				->add('streetName')
				->add('cityName')
				->add('stateName')
				->add('zipCode')
				;
	}
	
	public function getParent()
	{
		return 'FOS\UserBundle\Form\Type\RegistrationFormType';
	}
	
	public function getBlockPrefix()
	{
		return 'techcamp_user_registration';
	}
	
	public function getFirstName()
	{
		return $this->getBlockPrefix();
	}
}
