<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TallerFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

       
            ->add('lugar', 'filter_text', array('label' => 'Lugar del Taller'))  
            ->add('asistentes', 'filter_text', array('label' => 'Asistentes'))            
          
            
		
			;
		}
    
    public function getBlockPrefix()
    {
        return 'tallerFilter';
    }

     public function getName()
    {
        return 'tallerFilter';
    }
}
