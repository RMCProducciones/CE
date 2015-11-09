<?php

namespace AppBundle\Form\GesionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CLEARType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo')
			->add('fecha_inicio','date')
			->add('fecha_finalizacion','date')
			->add('zona')
			->add('departamento')
			->add('municipio')
			->add('lugar_realizacion')
		;
    }
    
    public function getName()
    {
        return 'CLEAR';
    }
}
