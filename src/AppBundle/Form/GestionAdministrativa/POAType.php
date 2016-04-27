<?php

namespace AppBundle\Form\GestionAdministrativa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class POAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('anio', 'text', array('label' => 'Año para el que esta el presupuesto'))
			->add('presupuesto', 'text', array('label' => 'Presupuesto que se tiene '))		
		;
    }
    
    public function getName()
    {
        return 'poa';
    }
}
