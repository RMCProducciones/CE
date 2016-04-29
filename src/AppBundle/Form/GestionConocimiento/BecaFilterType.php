<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class BecaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
										
			->add('tipo', 'filter_entity', array('label' => 'Tipo de Beca', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_beca')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             
			->add('nombre','filter_text')			 
			->add('modalidad', 'filter_entity', array('label' => 'Modalidad', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'modalidad_beca')
										            ->orderBy('l.orden', 'ASC');
										    },));	

											
		
	}		
			
    
    
	
    public function getBlockPrefix()
    {
        return 'becaFilter';
    }

     public function getName()
    {
        return 'becaFilter';
    }
}
