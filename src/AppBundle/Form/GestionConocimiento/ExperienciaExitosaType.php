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
			->add('numero_empleos','text', array('label' => 'Número de Empleos'))
			->add('ventas_mes')
			->add('produccion_mensual','text', array('label' => 'Producción Mensual'))
			->add('fuentes_financiacion','text', array('label' => 'Fuentes Financiación'))
			->add('valor_recursos_financiacion','text', array('label' => 'Valor Recursos Financiación'))
			->add('tipo_poblacion','text', array('label' => 'Tipo Población'))
			->add('proceso_productivo','textarea')
			->add('testimonio_poblacion','textarea', array('label' => 'Testimonio Población'))
			->add('acciones_minimizacion_impacto_ambiental','textarea', array('label' => 'Acciones Minimización Impacto Ambiental'))
			->add('impacto_comunidad','textarea')
			->add('innovacion','textarea', array('label' => 'Innovación'))
			->add('observaciones','textarea');
		
	}		
			
    
    
	
    public function getName()
    {
        return 'ExperienciaExitosa';
    }
}
