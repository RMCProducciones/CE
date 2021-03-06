<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EventoSoporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipoSoporte', 'entity', array(
				'class' => 'AppBundle:DocumentoSoporte',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'evento_tipo_soporte')
						->orderBy('l.orden', 'ASC');
				},
			))
			->add('file', 'file', array('required' => true))
		;
    }
    
    public function getName()
    {
        return 'eventoSoporte';
    }
}
