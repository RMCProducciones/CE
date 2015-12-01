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
			->add(
				'archivos', 
				'collection', 
				array(
					'type' => 'file',
					'allow_add' => true,
					'allow_delete' => true,
					'prototype' => true,
					'options'=>array(
                    'required'  => false,
                    'attr'  => array(
						'class' => 'unidades'
					),
                )
			)
		);
    }
    
    public function getName()
    {
        return 'grupoSoporte';
    }
}
