<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class BeneficiarioAhorroFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('primer_nombre', 'filter_text', array('label' => 'Primer Nombre'));
        $builder->add('primer_apellido', 'filter_text', array('label' => 'Primer Apellido'));       
        
        
    }

    public function getBlockPrefix()
    {
        return 'beneficiarioAhorroFilter';
    }

     public function getName()
    {
        return 'beneficiarioAhorroFilter';
    }
    
}
