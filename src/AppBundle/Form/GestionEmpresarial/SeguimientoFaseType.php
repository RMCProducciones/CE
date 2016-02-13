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
				'widget' => 'single_text'
			))

			
			->add('actividad_productiva','text', array('label' => 'Actividad Productiva'))
			->add('descripcion_actividad_productiva','text', array('label' => 'Descripción Actividad'))
			->add('logros','text', array('label' => 'Logros'))
			->add('calificacion','text', array('label' => 'Calificacion'))
			->add('observaciones','text', array('label' => 'Observaciones'))
			->add('resultado_componente_organizacional','text', array('label' => 'Resultado Componente Organizacional'))
			->add('resultado_componente_productivo','text', array('label' => 'Resultado Componente Productivo'))
			->add('resultado_componente_comercial','text', array('label' => 'Resultado Componente Comercial'))
			->add('resultado_componente_administrativo','text', array('label' => 'Resultado Componente Administrativo'))
			->add('resultado_componente_financiero','text', array('label' => 'Resultado Componente Financiero'))
			
					
				
		;
    }
    
    public function getName()
    {
        return 'seguimientofase';
    }
}
