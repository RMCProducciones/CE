<?php

namespace AppBundle\Form\GesionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class POAType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('año')
			->add('presupuesto')		
		;
    }
    
    public function getName()
    {
        return 'POA';
    }
}
