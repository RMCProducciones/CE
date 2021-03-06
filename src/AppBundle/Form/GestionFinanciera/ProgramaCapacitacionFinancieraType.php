<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ProgramaCapacitacionFinancieraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('talento_financiero')							
			  ->add('lugar')	
			 ->add('estado', 'entity', array('label' => 'Estado', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_capacitacion_financiera')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             	->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			));

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'ProgramaCapacitacionFinanciera';
    }
}
