<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class PolizaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			 ->add('grupo')	;					
			 
			 
            
			 	

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'Poliza';
    }
}
