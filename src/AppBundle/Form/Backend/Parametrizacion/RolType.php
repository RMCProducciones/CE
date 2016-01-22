<?php

namespace AppBundle\Form\Backend\Parametrizacion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('rol')
			->add('permiso')
		;
    }
    
    public function getName()
    {
        return 'rol';
    }
}
