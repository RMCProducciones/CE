<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CapacitacionFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('capacitador', 'filter_text')
			 ->add('nombre', 'filter_text', array('label' => 'Nombre Capacitacion'))						
			 ->add('tipo', 'filter_entity', array('label' => 'Tipo de Capacitacion', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_capacitacion')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             
			 ->add('modalidad', 'filter_entity', array('label' => 'Modalidad', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'modalidad_capacitacion')
										            ->orderBy('l.orden', 'ASC');
										    },));	

											
		
	}		
			
    
    
	
    public function getBlockPrefix()
    {
        return 'capacitacionFilter';
    }

     public function getName()
    {
        return 'capacitacionFilter';
    }
}