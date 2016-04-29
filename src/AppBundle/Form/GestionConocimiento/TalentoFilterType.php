<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TalentoFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo', 'filter_entity', array('label' => 'Tipo de Talento', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_talento')
										            ->orderBy('l.orden', 'ASC');
										    },))		
            ->add('numero_documento', 'filter_text', array('label' => 'Número de documento'))											
			->add('primer_apellido', 'filter_text')			
			->add('primer_nombre', 'filter_text')			
			->add('genero', 'filter_entity', array('class' => 'AppBundle:Listas', 
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'genero')
										            ->orderBy('l.orden', 'ASC');
										    },))
			
			 ->add('area_desempeno_principal', 'filter_text')
			 ->add('area_desempeno_secundario', 'filter_text');
			 

											
		
	}		
			
    
    
	
    public function getBlockPrefix()
    {
        return 'talentoFilter';
    }

     public function getName()
    {
        return 'talentoFilter';
    }
}
