<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class BeneficiarioAhorroCorteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('fecha_realizacion', 'date', array('label' => 'Fecha de Realizacion del Corte', 'widget' => 'single_text'))			 
             ->add('ahorro_corte','text', array('label' => 'Saldo Corte'));
             
	}		
			
    
    
	
    public function getName()
    {
        return 'beneficiarioAhorroCorte';
    }
}
