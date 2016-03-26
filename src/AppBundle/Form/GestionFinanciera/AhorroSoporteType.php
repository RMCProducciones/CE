<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AhorroSoporteType extends AbstractType
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
						->setParameter('dominio', 'ruta_tipo_soporte')
						->orderBy('l.orden', 'ASC');
				},
			))
			->add('file', 'file', array('required' => true))
		;
    }
    
    public function getName()
    {
        return 'ahorroSoporte';
    }
}
