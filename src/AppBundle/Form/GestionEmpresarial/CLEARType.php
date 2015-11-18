<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CLEARType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo_CLEAR', 'text', array('label' => 'Tipo de CLEAR'))
			->add('fecha_inicio', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('fecha_finalizacion', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('municipio', 'entity', array('class' => 'AppBundle:Municipio'))
			->add('lugar_realizacion_CLEAR', 'text', array('label' => 'Lugar Realizacion CLEAR'))
		;
    }
    
    public function getName()
    {
        return 'CLEAR';
    }
}
