<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class FeriaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
											
			->add('tipo', 'filter_entity', array(
				'class' => 'AppBundle:Listas',
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'tipo_feria')
						->orderBy('l.orden', 'ASC');
				}
			))
											
			

			->add('lugar', 'filter_text')			
			->add('nombre', 'filter_text');
    }
    
    public function getBlockPrefix()
    {
        return 'feriaFilter';
    }

     public function getName()
    {
        return 'feriaFilter';
    }
}
