<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TallerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			->add('fecha', 'date', array('label' => 'Fecha del taller', 'widget' => 'single_text'))
            ->add('objetivo', 'textarea', array('label' => 'Objetivo del Taller'))
            ->add('agenda', 'textarea', array('label' => 'Agenda del taller'))
            ->add('lugar', 'text', array('label' => 'Lugar del Taller'))
            ->add('asistentes', 'text', array('label' => 'Numero de personas asistentes taller'))
            ->add('observaciones', 'textarea', array('label' => 'Observaciones del Taller'))
            ->add('compromisos', 'textarea', array('label' => 'Compromisos del Taller'))
		
			;
		}
    
    public function getName()
    {
        return 'taller';
    }
}
