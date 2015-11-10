<?php

namespace AppBundle\Form\GesionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConvocatoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('fecha_inicio', 'date')
			->add('fecha_cierre', 'date')
			->add('mot', 'checkbox', array('required' => false))
			->add('iea', 'checkbox', array('required' => false))
			->add('pi', 'checkbox', array('required' => false))
			->add('pn', 'checkbox', array('required' => false))
		;
    }
    
    public function getName()
    {
        return 'convocatoria';
    }
}
