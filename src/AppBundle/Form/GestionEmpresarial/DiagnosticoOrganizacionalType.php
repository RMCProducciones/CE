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
			
	 	->add('productivaA', 'choice', array(
        'choices'  => array(

        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaB', 'choice', array(
        'choices'  => array(
            
        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaC', 'choice', array(
        'choices'  => array(
            
        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaD', 'choice', array(
        'choices'  => array(
            
        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaE', 'choice', array(
        'choices'  => array(
            
        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaF', 'choice', array(
        'choices'  => array(
            
        '1' => 1,
        '2' => 2,
        '3' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
			
			->add('fecha_visita', 'date', array('label' => 'Fecha de la Visita', 'widget' => 'single_text'))
						
			
			
			
		;
    }
    
    public function getName()
    {
        return 'diagramaorganizacional';
    }
}
