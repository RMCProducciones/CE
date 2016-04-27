<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ParticipanteFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 					
			 ->add('numero_documento', 'filter_text', array('label' => 'Número de documento'))
			 ->add('primer_nombre', 'filter_text', array('label' => 'Primer Nombre'))			 
			 ->add('primer_apellido', 'filter_text', array('label' => 'Primer Apellido'));
	}
        
    
	
    public function getBlockPrefix()
    {
        return 'participanteFilter';
    }

     public function getName()
    {
        return 'participanteFilter';
    }
}
