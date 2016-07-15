<?php

namespace AppBundle\Form\GestionListasValor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;

class ListasValorFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      
        /*$builder->add('dominio', 'filter_entity', array('label' => 'Dominio', 
                                            'class' => 'AppBundle:Listas',
                                            'property'=>'dominio',
                                            'query_builder' => function(EntityRepository $er) {                                                
                                               return $er->createQueryBuilder('l') 
                                                    ->groupBy('l.dominio')
                                                    ->orderBy('l.dominio');
                                            },));*/

        /*$builder->add('dominio', 'filter_choice', array('label' => 'Dominio', 
                                            'choices' => array( //Generar un arry con esta forma para que funcione
                                                    'tipo_documento' => 'tipo_documento',
                                                    'genero' => 'genero',
                                                    'estado_civil'   => 'estado_civil'
                                                    ),
                                            ));*/

        /*$builder->add('dominio', 'filter_choice', array('label' => 'Dominio', 
                                            'choices' => array( //Generar un arry con esta forma para que funcione
                                                    'tipo_documento' => 'tipo_documento',
                                                    'genero' => 'genero',
                                                    'estado_civil'   => 'estado_civil'
                                                    ),
                                            ));*/


        $builder->add('dominio', 'filter_text');
        $builder->add('descripcion', 'filter_text');

    }

    public function getBlockPrefix()
    {
        return 'ListasValorFilter';
    }

     public function getName()
    {
        return 'ListasValorFilter';
    }
    
}
