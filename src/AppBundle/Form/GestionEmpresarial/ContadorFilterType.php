<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class ContadorFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('numero_documento', 'filter_text', array('label' => 'Número de documento'));
        $builder->add('primer_apellido', 'filter_text', array('label' => 'Primer apellido'));
        $builder->add('primer_nombre', 'filter_text', array('label' => 'Primer nombre'));
        $builder->add('genero', 'filter_entity', array(
                'class' => 'AppBundle:Listas', 
                
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dominio = :dominio')
                        ->andWhere('l.active = 1')
                        ->setParameter('dominio', 'genero')
                        ->orderBy('l.orden', 'ASC');
                },));
        $builder->add('numero_tarjeta', 'filter_text', array('label' => 'Numero Tarjeta'));

    }

    public function getBlockPrefix()
    {
        return 'contadorFilter';
    }

     public function getName()
    {
        return 'contadorFilter';
    }
    
}