<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class BeneficiarioAhorroCorteFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        
        $builder->add('fecha_realizacion', 'filter_date', array('label' => 'Fecha de Realizacion del Corte', 'widget' => 'single_text'));            
        
    }

    public function getBlockPrefix()
    {
        return 'beneficiarioAhorroCortoFilter';
    }

     public function getName()
    {
        return 'beneficiarioAhorroCortoFilter';
    }
    
}
