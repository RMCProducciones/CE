<?php

namespace AppBundle\Form\GestionListasValor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ListasValorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('dominio')
			->add('descripcion');
	}		
			
    
    
	
    public function getName()
    {
        return 'ListasValor';
    }
}
