<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CLEARType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			
			->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			->add('fecha_finalizacion', 'date', array('label' => 'Fecha de Finalizacion', 'widget' => 'single_text'))			
			->add('municipio', 'entity', array('class' => 'AppBundle:Municipio'))
			->add('lugar_realizacion_CLEAR', 'text', array('label' => 'Lugar Realizacion CLEAR'))
		;
    }
    
    public function getName()
    {
        return 'CLEAR';
    }
}
