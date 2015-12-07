<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class BecaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
										
			 ->add('fecha_publicacion', 'date', array('label' => 'Fecha de Publicación', 'widget' => 'single_text'))
			 ->add('fecha_inicio', 'date', array('label' => 'Fecha de Inicio', 'widget' => 'single_text'))
			 ->add('fecha_finalizacion', 'date', array('label' => 'Fecha de Finalización', 'widget' => 'single_text'))
			 ->add('tipo', 'entity', array('label' => 'Tipo de Beca', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_beca')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             ->add('entidad')
			 ->add('nombre')
			 ->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			))
			->add('modalidad', 'entity', array('label' => 'Modalidad', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'modalidad_beca')
										            ->orderBy('l.orden', 'ASC');
										    },))	

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'Talento';
    }
}
