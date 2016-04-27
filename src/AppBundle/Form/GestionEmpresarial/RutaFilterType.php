<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class RutaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('nombre_ruta', 'filter_text', array('label' => 'Nombre Ruta'));
        $builder->add('observaciones', 'filter_text', array('label' => 'Observaciones'));

    }

    public function getBlockPrefix()
    {
        return 'rutaFilter';
    }

     public function getName()
    {
        return 'rutaFilter';
    }
    
}