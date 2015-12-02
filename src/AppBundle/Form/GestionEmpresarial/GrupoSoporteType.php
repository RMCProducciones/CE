<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class GrupoSoporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipoSoporte', 'entity', array(
				'class' => 'AppBundle:Listas',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'grupo_tipo_soporte')
						->orderBy('l.orden', 'ASC');
				},
			))
			->add('file')
		;
    }
    
    public function getName()
    {
        return 'grupoSoporte';
    }
}
