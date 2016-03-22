<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ExperienciaExitosaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('fecha_registro', 'date', array('label' => 'Fecha de Registro', 'widget' => 'single_text'))
			->add('numero_empleos')
			->add('ventas_mes')
			->add('produccion_mensual')
			->add('fuentes_financiacion')
			->add('valor_recursos_financiacion')
			->add('tipo_poblacion')
			->add('proceso_productivo','textarea')
			->add('testimonio_poblacion','textarea')
			->add('acciones_minimizacion_impacto_ambiental','textarea')
			->add('impacto_comunidad','textarea')
			->add('innovacion','textarea')
			->add('observaciones','textarea');
		
	}		
			
    
    
	
    public function getName()
    {
        return 'ExperienciaExitosa';
    }
}
