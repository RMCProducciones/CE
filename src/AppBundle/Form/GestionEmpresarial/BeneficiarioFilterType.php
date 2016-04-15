<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

class BeneficiarioFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('primer_nombre', 'filter_text');
        $builder->add('segundo_nombre', 'filter_text');
    }

    public function getBlockPrefix()
    {
        return 'beneficiarioFilter';
    }

     public function getName()
    {
        return 'beneficiarioFilter';
    }
    
}
