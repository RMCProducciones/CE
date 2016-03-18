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
			->add('duracion')
			->add('semana_inicio')
			->add('semana_finalizacion');
	}		
			
    
    
	
    public function getName()
    {
        return 'ActividadConcurso';
    }
}
