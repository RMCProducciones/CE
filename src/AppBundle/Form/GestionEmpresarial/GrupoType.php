<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class GrupoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			 ->add('municipio', 'entity', array(
			 	'class' => 'AppBundle:Municipio',
			 ))
											
			 ->add('tipo', 'entity', array(
			 	'class' => 'AppBundle:Listas',
			 	'query_builder' => function(EntityRepository $er) {
			 		return $er->createQueryBuilder('l')
			 			->where('l.dominio = :dominio')
			 			->andWhere('l.active = 1')
			 			->setParameter('dominio', 'tipo_grupo')
			 			->orderBy('l.orden', 'ASC');
			 	}
			 ))

			->add('rural', 'checkbox', array('required' => false))
			
			->add('nombre')
			->add('direccion','text', array('label' => 'Dirección'))
			
			 ->add('descripcion', 'textarea', array('required' => false, 'label' => 'Descripción'))
		
			 ->add('numero_identificacion_tributaria', 'text', array('label' => 'Numero identificación tributaria','required' => false))
			 ->add('fecha_constitucion_legal', 'date', array('label' => 'Fecha de constitución legal del grupo', 'widget' => 'single_text','required' => false))
			 ->add('telefono_fijo', 'number', array('required' => false,'label' => 'Teléfono fijo'))
			 ->add('telefono_celular','text', array('label' => 'Teléfono celular','required' => false))
			 ->add('correo_electronico', 'email', array('label' => 'Correo electrónico','required' => false))
			
			
			 ->add('figura_legal_constitucion', 
			 	'entity', 
			 	array(
			 		'label' => 'Figura legal constitución',
			 		'class' => 'AppBundle:Listas',
			 		'required' => false,
			 		'query_builder' => function(EntityRepository $er) {
			 			return $er->createQueryBuilder('l')
			 				->where('l.dominio = :dominio')
			 				->andWhere('l.active = 1')
			 				->setParameter('dominio', 'figura_legal_constitucion')
			 			    ->orderBy('l.orden', 'ASC');
			 		}
			 	)
			 )
			  ->add('convocatoria', 'entity', array(
			 	'class' => 'AppBundle:Convocatoria',
			 	'query_builder' => function(EntityRepository $er) {
			 		return $er->createQueryBuilder('c')
			 			->where('c.active = 1')
			 			->orderBy('c.fecha_inicio', 'ASC');
			 	}
			 ))
			;
    }
    
    public function getName()
    {
        return 'grupo';
    }
}
