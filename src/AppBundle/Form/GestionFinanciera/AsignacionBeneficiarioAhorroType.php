<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AsignacionBeneficiarioAhorroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('fecha_inicio', 'date', array('label' => 'Fecha de Realizacion de Apertura', 'widget' => 'single_text'))			 
             ->add('meta_ahorro_activacion')
             ->add('meta_ahorro_mensual')             
             ->add('telefono_celular')
             ->add('beneficiario_ahorro_otro_programa', 'checkbox', array('required' => false));
             
	}		
			
    
    
	
    public function getName()
    {
        return 'asignacionBeneficiarioAhorro';
    }
}
