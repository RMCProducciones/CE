<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EvaluacionFasesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('calificacion_iea', 'text', array('label' => '','required' => false))
            ->add('calificacion_pi', 'text', array('label' => '','required' => false))
            ->add('calificacion_pn', 'text', array('label' => '','required' => false))
			
            ->add('apto_iea', 'checkbox', array('label' => 'IEA', 'required' => false))
            ->add('apto_pi', 'checkbox', array('label' => 'PI formal', 'required' => false))        
            ->add('apto_pn', 'checkbox', array('label' => 'PN', 'required' => false))
            ->add('no_aprobado', 'checkbox', array('label' => 'No Aprobado', 'required' => false))
            ->add('observaciones', 'textarea', array('required' => false))
            ;
		}
    
    public function getName()
    {
        return 'evaluacionFases';
    }
}
