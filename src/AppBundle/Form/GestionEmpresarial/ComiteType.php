<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ComiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			
			->add('fecha_inicio', 'date', array('label' => 'Fecha de inicio', 'widget' => 'single_text'))
			->add('fecha_finalizacion', 'date', array('label' => 'Fecha de Finalización', 'widget' => 'single_text'))			
			->add('municipio', 'entity', array('class' => 'AppBundle:Municipio'))
			->add('lugar_realizacion_comite', 'text', array('label' => 'Lugar Realización Comite'))
		;
    }
    
    public function getName()
    {
        return 'comite';
    }
}
