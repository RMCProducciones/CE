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
            ->add('fecha_inicio_propuesta', 'date', array('label' => 'Fecha de Inicio de la feria Propuesta', 'widget' => 'single_text'))
            ->add('fecha_finalizacion_propuesta', 'date', 
            array('label' => 'Fecha de finalizacion de la feria Propuesta', 'widget' => 'single_text'))
			;
		}
    
    public function getName()
    {
        return 'ruta';
    }
}
