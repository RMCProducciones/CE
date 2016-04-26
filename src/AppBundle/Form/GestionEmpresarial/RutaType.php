<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class RutaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			
			->add('nombre_ruta','text', array('label' => 'Nombre Ruta'))
			->add('observaciones')
			;
		}
    
    public function getName()
    {
        return 'ruta';
    }
}
