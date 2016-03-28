<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class PolizaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 
			 ->add('estado', 'entity', array('label' => 'Estado', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_ahorro')
										            ->orderBy('l.orden', 'ASC');
										    },))
			 ->add('consecutivo', 'text', array('label' => ' Consecutivo'))
			 ->add('cofinanciacion', 'text', array('label' => 'Coofinanciación'))
			 ;					
			 
			 
            
			 	

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'poliza';
    }
}
