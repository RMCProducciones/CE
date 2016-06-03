<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class ActividadFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('actividad','filter_text', array('label' => 'Actividad'))
            ->add('mejoras','filter_text', array('label' => 'Mejora'))            
            ->add('duracion','filter_text', array('label' => 'Duración'));
    }

    public function getBlockPrefix()
    {
        return 'actividadFilter';
    }

     public function getName()
    {
        return 'actividadFilter';
    }
    
}
