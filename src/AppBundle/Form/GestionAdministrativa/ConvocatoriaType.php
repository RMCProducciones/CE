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
			->add('fecha_inicio', 'date')
			->add('fecha_cierre', 'date')
		;
    }
    
    public function getName()
    {
        return 'convocatoria';
    }
}
