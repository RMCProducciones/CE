<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;


class IntegranteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo_documento', 'entity', array('label' => 'Tipo de documento', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_documento')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('numero_documento', 'text', array('label' => 'Número de documento'))
			->add('primer_apellido')
			->add('segundo_apellido', 'text', array('required' => false))
			->add('primer_nombre', 'text',array('label' => 'Primer Nombre'))
			->add('segundo_nombre', 'text', array('required' => false))
			->add('genero', 'entity', array('class' => 'AppBundle:Listas', 'expanded' => true, 
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'genero')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('fecha_nacimiento', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('entidad')
			->add('cargo', 'text', array('label' => 'Cargo dentro del comite de concursos'))						
			->add('direccion', 'text', array('label' => 'Dirección'))
			->add('telefono_fijo', 'text', array('label' => 'Teléfono fijo'))
			->add('telefono_celular', 'text', array('label' => 'Teléfono celular'))
			->add('correo_electronico', 'email',array('label' => 'Correo electrónico'))
			->add('nivel_estudios', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'nivel_estudios')
										            ->orderBy('l.orden', 'ASC');
										    },))
			
			->add('pertenencia_etnica', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'pertenencia_etnica')
										            ->orderBy('l.orden', 'ASC');
										    },))
			
				
			
			
			
		;
    }
    
    public function getName()
    {
        return 'integrante';
    }
}
