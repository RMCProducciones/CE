<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ExperienciaExitosaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 					
			 ->add('fecha_registro', 'filter_date', array('label' => 'Fecha de Registro', 'widget' => 'single_text'));
			 
	}
        
    
	
     public function getBlockPrefix()
    {
        return 'experienciaFilter';
    }

     public function getName()
    {
        return 'experienciaFilter';
    }
}
