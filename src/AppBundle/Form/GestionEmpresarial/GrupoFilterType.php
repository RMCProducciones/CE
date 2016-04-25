<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class GrupoFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 

        $builder->add('tipo', 'filter_entity', array(
                'class' => 'AppBundle:Listas',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dominio = :dominio')
                        ->andWhere('l.active = 1')
                        ->setParameter('dominio', 'tipo_grupo')
                        ->orderBy('l.orden', 'ASC');
                }
            ));

        $builder->add('codigo', 'filter_text');
        $builder->add('nombre', 'filter_text');
        $builder->add('numero_identificacion_tributaria', 'filter_text', array('label' => 'Numero identificación tributaria'));
        $builder->add('figura_legal_constitucion', 'filter_entity', array('label' => 'Figura legal constitución','class' => 'AppBundle:Listas',
                                            'query_builder' => function(EntityRepository $er) {
                                                return $er->createQueryBuilder('l')
                                                    ->where('l.dominio = :dominio')
                                                    ->andWhere('l.active = 1')
                                                    ->setParameter('dominio', 'figura_legal_constitucion')
                                                    ->orderBy('l.orden', 'ASC');
                                            },));
    }

    public function getBlockPrefix()
    {
        return 'grupoFilter';
    }

     public function getName()
    {
        return 'grupoFilter';
    }
    
}
