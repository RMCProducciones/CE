<?php

namespace AppBundle\Form\Backend\Parametrizacion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UsuarioFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('primer_nombre', 'filter_text', array('label' => 'Primer Nombre'));
        $builder->add('primer_apellido', 'filter_text', array('label' => 'Primer Apellido'));
        $builder->add('numero_documento', 'filter_text', array('label' => 'Número de Documento'));
        $builder->add('username', 'filter_text', array('label' => 'Nombre de usuario'));

    }

    public function getBlockPrefix()
    {
        return 'usuarioFilter';
    }

     public function getName()
    {
        return 'usuarioFilter';
    }
    
}