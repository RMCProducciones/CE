<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ListaRolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('rol', 'entity', array(
				'class' => 'AppBundle:Listas',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'rol')
						->orderBy('l.orden', 'ASC');
				})
			)

		;
    }
    public function getName()
    {
        return 'idRolIntegrante';
    }
}