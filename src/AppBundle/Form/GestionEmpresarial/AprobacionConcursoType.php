<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AprobacionConcursoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('aprobacion')
			->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio del concurso', 'widget' => 'single_text'))
			->add('fecha_finalizacion', 'date', array('label' => 'Fecha de finalizacion del concurso', 'widget' => 'single_text'));
			
	}		
			
    
    
	
    public function getName()
    {
        return 'AprobacionConcurso';
    }
}
