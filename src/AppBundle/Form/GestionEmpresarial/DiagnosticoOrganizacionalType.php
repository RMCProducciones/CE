<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;


class DiagnosticoOrganizacionalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
        ->add('productivaA')	
        ->add('productivaB')
        ->add('productivaC')
        ->add('productivaD')
        ->add('productivaE')
        ->add('productivaF')
        ->add('comercialA')    
        ->add('comercialB')
        ->add('comercialC')
        ->add('comercialD')
        ->add('comercialE')
        ->add('financieraA')    
        ->add('financieraB')
        ->add('financieraC')
        ->add('financieraD')
        ->add('financieraE')
        ->add('financieraF')
        ->add('administrativaA')    
        ->add('administrativaB')
        ->add('administrativaC')
        ->add('administrativaD')
        ->add('administrativaE')
        ->add('organizacionalA')    
        ->add('organizacionalB')
        ->add('organizacionalC')
        ->add('organizacionalD')
        ->add('organizacionalE')
        ->add('organizacionalF')
    
			->add('fecha_visita', 'date', array('label' => 'Fecha de la Visita', 'widget' => 'single_text'))
						
			
			
			
		;
    }
    
    public function getName()
    {
        return 'diagramaorganizacional';
    }
}
