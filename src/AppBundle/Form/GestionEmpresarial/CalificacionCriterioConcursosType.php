<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CalificacionCriterioConcursosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			
			->add('puntaje');
			
	}		
			
    
    
	
    public function getName()
    {
        return 'CalificacionCriterioConcurso';
    }
}
