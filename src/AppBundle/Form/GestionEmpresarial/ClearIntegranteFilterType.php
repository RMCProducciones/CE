<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class ClearIntegranteFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('nombre', 'filter_text', array('label' => 'Nombre'));
        $builder->add('primer_apellido', 'filter_text', array('label' => 'Primer Apellido'));
        $builder->add('numero_documento', 'filter_text', array('label' => 'Número de Documento'));

    }

    public function getBlockPrefix()
    {
        return 'clearIntegranteFilter';
    }

     public function getName()
    {
        return 'clearIntegranteFilter';
    }
    
}