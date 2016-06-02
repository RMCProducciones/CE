<?php

namespace AppBundle\Form\Backend\Parametrizacion;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class RolFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
       $builder
            ->add('rol', 'filter_text', array('label' => 'Rol'));
        ;        

    }

    public function getBlockPrefix()
    {
        return 'rolFilter';
    }

     public function getName()
    {
        return 'rolFilter';
    }
    
}