<?php

namespace AppBundle\Form\GestionAdministrativa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class POAFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('anio', 'filter_text', array('label' => 'Año para el que esta el presupuesto'))
			->add('presupuesto', 'filter_text', array('label' => 'Presupuesto que se tiene '))		
		;
    }
    
     public function getBlockPrefix()
    {
        return 'poaFilter';
    }

     public function getName()
    {
        return 'poaFilter';
    }
}
