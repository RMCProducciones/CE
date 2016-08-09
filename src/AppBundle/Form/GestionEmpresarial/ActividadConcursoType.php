<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ActividadConcursoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('actividad','textarea')
			->add('mejoras')
			->add('recursos')
			->add('duracion', 'integer', array('label' => 'Duración'))
			->add('semana_inicio', 'integer', array('label' => 'Semana Inició'))
			->add('semana_finalizacion', 'integer', array('label' => 'Semana Finalización'));
	}		
			
    
    
	
    public function getName()
    {
        return 'ActividadConcurso';
    }
}
