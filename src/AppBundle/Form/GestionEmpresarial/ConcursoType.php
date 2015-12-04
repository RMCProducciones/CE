<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ConcursoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('tipo', 'entity', array(
				'class' => 'AppBundle:Listas',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'tipo_grupo')
						->orderBy('l.orden', 'ASC');
				},
			))
											
			->add('fecha_bases', 'date', array(
				'label' => 'Fecha de Bases', 
				'widget' => 'single_text'
			))
			
			->add('modalidad', 'entity', array(
				'class' => 'AppBundle:Listas',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'modalidad')
						->orderBy('l.orden', 'ASC');
				},
			))
			
			->add('tematica','textarea')
			->add('ambito')
			->add('problematica')
			->add('actividades')
			->add('resultados')
			->add('valor')
			->add('distribucion')
			->add('criterios');
			
    
    }
	
    public function getName()
    {
        return 'grupo';
    }
}
