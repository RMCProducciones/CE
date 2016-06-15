<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class RutaTerritorioFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('nombre_territorio', 'filter_text', array('label' => 'Nombre Territorio'));
        

    }

    public function getBlockPrefix()
    {
        return 'rutaTerritorioFilter';
    }

     public function getName()
    {
        return 'rutaTerritorioFilter';
    }
    
}