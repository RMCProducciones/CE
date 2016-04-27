<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AhorroFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 					
			 ->add('fecha_registro', 'filter_date', array('label' => 'Fecha de Registro', 'widget' => 'single_text'))
			 ->add('fecha_inicio', 'filter_date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			 
			 ->add('estado', 'filter_entity', array('label' => 'Estado', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_ahorro')
										            ->orderBy('l.orden', 'ASC');
										    }
										    )
			 );	
	}
        
    
	
    public function getBlockPrefix()
    {
        return 'ahorroFilter';
    }

     public function getName()
    {
        return 'ahorroFilter';
    }
}
