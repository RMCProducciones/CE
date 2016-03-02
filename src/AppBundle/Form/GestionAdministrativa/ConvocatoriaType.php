<?php

namespace AppBundle\Form\GestionAdministrativa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConvocatoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('poa')
			->add('numero')
			->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			->add('fecha_cierre', 'date', array('label' => 'Fecha de Cierre', 'widget' => 'single_text'))
		;
    }
    
    public function getName()
    {
        return 'convocatoria';
    }
}
