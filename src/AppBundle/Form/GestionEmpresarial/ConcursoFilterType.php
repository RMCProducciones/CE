<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityRepository;

class ConcursoFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('tipo', 'filter_entity', array(
            
                'class' => 'AppBundle:Listas',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dominio = :dominio')
                        ->andWhere('l.active = 1')
                        ->setParameter('dominio', 'tipo_concurso')
                        ->orderBy('l.orden', 'ASC');
                },
            ));
        $builder->add('modalidad', 'filter_entity', array(
                
                'class' => 'AppBundle:Listas',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->where('l.dominio = :dominio')
                        ->andWhere('l.active = 1')
                        ->setParameter('dominio', 'modalidad')
                        ->orderBy('l.orden', 'ASC');
                },
            ));
        $builder->add('tematica', 'filter_text', array('label' => 'Temática'));
        

    }

    public function getBlockPrefix()
    {
        return 'concursoFilter';
    }

     public function getName()
    {
        return 'concursoFilter';
    }
    
}