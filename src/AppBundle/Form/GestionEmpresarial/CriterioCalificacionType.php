<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CriterioCalificacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('criterio')
			->add('maximo_puntaje');
			
	}		
			
    
    
	
    public function getName()
    {
        return 'CriterioCalificacion';
    }
}
