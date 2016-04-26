<?php

namespace AppBundle\Form\GestionAdministrativa;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConvocatoriaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('poa', 'filter_entity', array(
                                                'label' => 'Año para el que esta el presupuesto',
                                                'class' => 'AppBundle:POA'
                                                ))
			->add('numero','filter_text', array('label' => 'Número de convocatorias'))
		
		;
    }
    
     public function getBlockPrefix()
    {
        return 'convocatoriaFilter';
    }

     public function getName()
    {
        return 'convocatoriaFilter';
    }
}
