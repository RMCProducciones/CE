<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class PasantiaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			
			->add('nombre_pasantia','text', array('label' => 'Nombre Pasantia'))
			->add('observaciones')
			;
		}
    
    public function getName()
    {
        return 'pasantia';
    }
}
