<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class InfoFinancieraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
		->add('entidad_financiera_cuenta', 'entity', array('class' => 'AppBundle:Listas',
				                            'required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'entidad_financiera')
										            ->orderBy('l.orden', 'ASC');
										    },))
			
			->add('tipo_cuenta', 'entity', array('class' => 'AppBundle:Listas',
				                            'required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_cuenta')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('numero_cuenta','text', array('label' => 'Numero de Cuenta','required' => false));
			
	}		
			
    
    
	
    public function getName()
    {
        return 'InfoFinanciera';
    }
}
