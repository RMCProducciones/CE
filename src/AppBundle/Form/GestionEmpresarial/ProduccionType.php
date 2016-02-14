<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ProduccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('periodicidad', 'entity', array(			
				  'class' => 'AppBundle:Listas',
				  'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'periodicidad')
						->orderBy('l.orden', 'ASC');
				},
			))
											
			->add('producto', 'text', array('label' => 'Descripción'))			
			->add('unidad_medida', 'text', array('label' => 'Unidad de Medida'))
			->add('cantidad_inicial', 'text', array('label' => 'Cantidad Inicial'))
			->add('valor_inicial', 'text', array('label' => 'Valor Inicial'))
			->add('cantidad_final', 'text', array('label' => 'Cantidad Final'))
			->add('valor_final')
			
			;
    
    }
	
    public function getName()
    {
        return 'produccion';
    }
}
