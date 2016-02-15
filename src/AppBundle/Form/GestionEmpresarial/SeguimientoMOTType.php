<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class SeguimientoMOTType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
																						
			->add('fecha_inicio', 'date', array(
				'label' => 'Fecha de Inicio', 
				'widget' => 'single_text'
			))
			->add('fecha_finalizacion', 'date', array(
				'label' => 'Fecha de Finalizacion', 
				'widget' => 'single_text',
				'required' => false
			))
			
			->add('observaciones','textarea', array('label' => 'Observaciones', 'required' => false))
			->add('indentificacion_recursos_tangibles','textarea', array('label' => 'Identificacion Recuros Tangibles', 'required' => false))
			->add('indentificacion_recursos_financieros','textarea', array('label' => 'Identificacion Recursos Financieros', 'required' => false))
			->add('indentificacion_recursos_intangibles','textarea', array('label' => 'Identificacion Recursos Intangibles', 'required' => false))
			->add('indentificacion_opciones_viables','textarea', array('label' => 'Identificacion Opciones Viables', 'required' => false))
			->add('viabilidad_negocio','textarea', array('label' => 'Viabilidad de Negocio', 'required' => false))
			
					
				
		;
    }
    
    public function getName()
    {
        return 'seguimientofase';
    }
}
