<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class OrganizacionFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
			
            ->add('nombre_organizacion', 'filter_text', array('label' => 'Nombre Organización'))
            ->add('linea_productiva', 'filter_entity', array('label' => 'Linea Productiva', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'linea_productiva')
										            ->orderBy('l.orden', 'ASC');
										    },))
            ->add('tipo_producto', 'filter_text', array('label' => 'Tipo Producto '));
    }
   
    public function getBlockPrefix()
    {
        return 'organizacionFilter';
    }

     public function getName()
    {
        return 'organizacionFilter';
    }
}
