<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class HabilitacionFasesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        	->add('mot_no_formal', 'checkbox', array('label' => 'MOT no formal', 'required' => false))
			->add('mot_formal', 'checkbox', array('label' => 'MOT formal', 'required' => false))		
			->add('iea', 'checkbox', array('label' => 'IEA', 'required' => false))
			->add('pn', 'checkbox', array('label' => 'PN', 'required' => false))	
            ->add('no_aprobado', 'checkbox', array('label' => 'No Aprobado', 'required' => false))
            ->add('observaciones', 'textarea', array('required' => false))    
		;
    }
    
    public function getName()
    {
        return 'habilitacionFases';
    }
}
