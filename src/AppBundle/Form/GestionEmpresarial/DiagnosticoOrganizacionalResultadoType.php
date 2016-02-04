<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;


class DiagnosticoOrganizacionalResultadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			
->add('totalProductiva', 'text', array('required' => false))
->add('totalComercial', 'text', array('required' => false))
->add('totalFinanciera', 'text', array('required' => false))
->add('totalAdministrativa', 'text', array('required' => false))
->add('totalOrganizacional', 'text', array('required' => false))
->add('total', 'text', array('required' => false))


 ->add('fecha_visita', 'date', array('label' => 'Fecha de la Visita', 'widget' => 'single_text'))
						
			
			
			
		;
    }
    
    public function getName()
    {
        return 'diagramaorganizacional';
    }
}
