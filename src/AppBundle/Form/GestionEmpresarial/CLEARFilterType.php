<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class CLEARFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			
			->add('fecha_inicio', 'filter_date', array('label' => 'Fecha de inicio', 'widget' => 'single_text'))
			->add('fecha_finalizacion', 'filter_date', array('label' => 'Fecha de Finalización', 'widget' => 'single_text'))			
			
		;
    }
    
    public function getBlockPrefix()
    {
        return 'clearFilter';
    }

     public function getName()
    {
        return 'clearFilter';
    }
}
