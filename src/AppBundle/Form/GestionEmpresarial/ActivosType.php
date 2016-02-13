<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ActivosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('rubro', 'entity', array(			
				  'class' => 'AppBundle:Listas',
				  'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'rubro')
						->orderBy('l.orden', 'ASC');
				},
			))
											
			->add('descripcion', 'text', array('label' => 'Descripción'))			
			->add('unidad_medida', 'text', array('label' => 'Unidad Medida'))
			->add('cantidad_inicial', 'text', array('label' => 'Cantidad Inicial'))
			->add('valor_inicial', 'text', array('label' => 'Cantidad Inicial'))
			->add('cantidad_final', 'text', array('label' => 'Cantidad Inicial'))
			->add('valor_final')
			
			;
    
    }
	
    public function getName()
    {
        return 'activos';
    }
}