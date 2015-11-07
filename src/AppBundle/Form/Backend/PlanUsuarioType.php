<?php

namespace Pacto\PactoBundle\Form\Backend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

class PlanUsuarioType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
			->add('usuario')
			->add('meses', 'integer', array('property_path' => false))
			->add('plan')
			->add('codigo_registro', 'text', array('required' => false))
		;
	}
    
    public function getName()
    {
        return 'plan_usuario';
    }
}
