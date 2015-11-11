<?php

namespace AppBundle\Form\GesionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConvocatoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('poa')
			->add('fecha_inicio', 'date')
			->add('fecha_cierre', 'date')
			->add('numero', 'checkbox', array('required' => false))
		;
    }
    
    public function getName()
    {
        return 'convocatoria';
    }
}
