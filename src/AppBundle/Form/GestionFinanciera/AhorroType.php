<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AhorroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('grupo')							
			 ->add('fecha_registro', 'date', array('label' => 'Fecha de Registro', 'widget' => 'single_text'))
			 ->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			 
			 ->add('estado', 'entity', array('label' => 'Estado', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_ahorro')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             ->add('incentivo_ahorro_colectivo');
			 	

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'Beca';
    }
}
