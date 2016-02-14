<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class VentasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('periodicidad', 'entity', array(			
				  'class' => 'AppBundle:Listas',
				  'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'periodicidad')
						->orderBy('l.orden', 'ASC');
				},
			))
											
			->add('producto', 'text', array('label' => 'Descripción'))			
			->add('unidad_medida', 'text', array('label' => 'Unidad de Medida'))
			->add('valor_unitario_inicial', 'text', array('label' => 'Valor Unitario Inicial'))
			->add('cantidad_vendida_inicial', 'text', array('label' => 'Cantidad Vendida Inicial'))
			->add('valor_ventas_inicial', 'text', array('label' => 'Valor ventas Inicial'))
			->add('cantidad_consumo_inicial', 'text', array('label' => 'Cantidad Consumo inicial'))
			->add('valor_unitario_final', 'text', array('label' => 'Valor Unitario Final'))
			->add('cantidad_vendida_final', 'text', array('label' => 'Cantidad vendida Final'))
			->add('valor_ventas_final', 'text', array('label' => 'Valor ventas Final'))
			->add('cantidad_consumo_final', 'text', array('label' => 'Cantidad consumo Final'))
			
			
			;
    
    }
	
    public function getName()
    {
        return 'ventas';
    }
}
