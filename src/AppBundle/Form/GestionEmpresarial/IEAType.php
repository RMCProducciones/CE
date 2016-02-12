<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class IEAType extends AbstractType
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

			->add('linea_productiva', 'entity', array('label' => 'Linea Productiva', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'linea_productiva')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('actividad_productiva','text', array('label' => 'Actividad Productiva'))
			->add('descripcion_actividad_productiva','text', array('label' => 'Actividad Productiva'))
			->add('logros','text', array('label' => 'Logros'))
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
        return 'IEA';
    }
}
