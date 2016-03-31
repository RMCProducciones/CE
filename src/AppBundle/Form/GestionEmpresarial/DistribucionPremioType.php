<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class DistribucionPremioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('posicion')
			->add('valor');
			
	}		
			
    
    
	
    public function getName()
    {
        return 'DistribucionPremio';
    }
}
