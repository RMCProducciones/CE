<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TerritorioAprendizajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			
			->add('nombreTerritorio','text', array('label' => 'Nombre del Territorio'))
			->add('observaciones')
			;
		}
    
    public function getName()
    {
        return 'territorioaprendizaje';
    }
}
