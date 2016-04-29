<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TerritorioAprendizajeFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			
			->add('nombre_territorio','filter_text', array('label' => 'Nombre del Territorio'))
			->add('observaciones', 'filter_text')
			;
		}
    
    public function getBlockPrefix()
    {
        return 'territorioFilter';
    }

     public function getName()
    {
        return 'territorioFilter';
    }
}
