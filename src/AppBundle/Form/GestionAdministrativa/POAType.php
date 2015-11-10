<?php

namespace AppBundle\Form\GestionAdministrativa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class POAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('anio')
			->add('presupuesto')		
		;
    }
    
    public function getName()
    {
        return 'POA';
    }
}
