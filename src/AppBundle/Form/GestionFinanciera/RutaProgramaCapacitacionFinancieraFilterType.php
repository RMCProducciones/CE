<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class RutaProgramaCapacitacionFinancieraFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	



	}		
			
    
    
	
    public function getBlockPrefix()
    {
        return 'programaCapacitacionFinancieraGestionFilter';
    }

     public function getName()
    {
        return 'programaCapacitacionFinancieraGestion';
    }
}
