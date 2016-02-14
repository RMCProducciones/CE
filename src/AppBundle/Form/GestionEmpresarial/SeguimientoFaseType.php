<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class SeguimientoFaseType extends AbstractType
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

			
			->add('actividad_productiva','text', array('label' => 'Actividad Productiva'))
			->add('descripcion_actividad_productiva','text', array('label' => 'Descripción Actividad'))
			->add('logros','text', array('label' => 'Logros'))			
			->add('observaciones','textarea', array('label' => 'Observaciones', 'required' => false))
			->add('resultado_componente_organizacional','textarea', array('label' => 'Resultado Componente Organizacional', 'required' => false))
			->add('resultado_componente_productivo','textarea', array('label' => 'Resultado Componente Productivo', 'required' => false))
			->add('resultado_componente_comercial','textarea', array('label' => 'Resultado Componente Comercial', 'required' => false))
			->add('resultado_componente_administrativo','textarea', array('label' => 'Resultado Componente Administrativo', 'required' => false))
			->add('resultado_componente_financiero','textarea', array('label' => 'Resultado Componente Financiero', 'required' => false))
			
					
				
		;
    }
    
    public function getName()
    {
        return 'seguimientofase';
    }
}
