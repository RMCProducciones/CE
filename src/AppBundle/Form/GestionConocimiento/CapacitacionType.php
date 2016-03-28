<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CapacitacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('capacitador')
			 ->add('nombre', 'text', array('label' => 'Nombre Capacitacion'))						
			 ->add('fecha_publicacion', 'date', array('label' => 'Fecha de Publicación', 'widget' => 'single_text'))
			 ->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			 ->add('fecha_finalizacion', 'date', array('label' => 'Fecha de Finalización', 'widget' => 'single_text'))
			 ->add('tipo', 'entity', array('label' => 'Tipo de Capacitacion', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_capacitacion')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             
			 ->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			))
			->add('modalidad', 'entity', array('label' => 'Modalidad', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'modalidad_capacitacion')
										            ->orderBy('l.orden', 'ASC');
										    },));	

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'Capacitacion';
    }
}
