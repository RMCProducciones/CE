<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class FeriaType extends AbstractType
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
						->setParameter('dominio', 'tipo_feria')
						->orderBy('l.orden', 'ASC');
				}
			))
											
			->add('fecha_propuesta', 'date', array(
				'label' => 'Fecha de Inscripción', 
				'widget' => 'single_text'
			))

			->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			))

			->add('lugar')			
			->add('nombre')
			->add('entidades','text', array('label' => 'Entidades'))
			->add('presentacion','text', array('label' => 'Presentación Feria'))
			->add('objetivo','text', array('label' => 'objetivo Feria'))
			->add('objetivos_especificos','text', array('label' => 'objetivos especificos Feria'))			
				
		;
    }
    
    public function getName()
    {
        return 'feria';
    }
}
