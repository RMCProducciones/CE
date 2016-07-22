<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class BeneficiarioType extends AbstractType
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
			->add('primer_nombre')
			->add('segundo_nombre', 'text', array('required' => false))
			->add('genero', 'entity', array(
				'class' => 'AppBundle:Listas', 
				
				'query_builder' => function(EntityRepository $er) {
			        return $er->createQueryBuilder('l')
			        	->where('l.dominio = :dominio')
			        	->andWhere('l.active = 1')
			        	->setParameter('dominio', 'genero')
			            ->orderBy('l.orden', 'ASC');
			    },))
			->add('rural', 'checkbox', array('required' => false))
			->add('fecha_nacimiento', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('edad_inscripcion', 'text', array('label' => 'Edad al momento de la inscripción'))
			->add('corte_sisben', 'entity', array('class' => 'AppBundle:Listas',
												  'label' => 'Area SISBEN',
										    	  'query_builder' => function(EntityRepository $er) {
										          return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'area_sisben')
										            ->orderBy('l.orden', 'ASC');										            
										    },))
			->add('puntaje_sisben', 'number')
			->add('grupo_indigena', 'entity', array('class' => 'AppBundle:Listas','required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'grupo_indigena')
										            ->orderBy('l.orden', 'ASC')
										            ->addOrderBy('l.descripcion', 'ASC');
										    },))
			->add('pertenencia_etnica', 'entity', array('label' => 'Pertenencia étnica',
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'pertenencia_etnica')
										            ->orderBy('l.orden', 'ASC');
										    },))
			

			->add('desplazado', 'checkbox', array('label' => 'Desplazado por la violencia', 'required' => false))
			->add('discapacidad', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'discapacidad')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('red_unidos', 'checkbox', array('label' => 'Pertenece a la Red Unidos', 'required' => false))
			->add('rol_grupo_familiar', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'rol_grupo_familiar')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('hijos_menores_5', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'hijos_menores_5')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('miembros_nucleo_familiar', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'miembros_nucleo_familiar')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('sabe_leer', 'checkbox', array('required' => false))
			->add('sabe_escribir', 'checkbox', array('required' => false))
			->add('nivel_estudios', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'nivel_estudios')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('ocupacion', 'entity', array('label' => 'Ocupación','class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'ocupacion')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('tipo_vivienda', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_vivienda')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('direccion', 'text', array('label' => 'Dirección'))
			
			->add('descripcion', 'text', array('required' => false))
		
			->add('telefono_fijo', 'text', array('label' => 'Teléfono fijo','required' => false))
			->add('telefono_celular', 'text', array('label' => 'Teléfono celular','required' => false))
			->add('correo_electronico', 'email',array('label' => 'Correo eléctronico','required' => false))
			->add('estado_civil', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_civil')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('tipo_documento_conyugue', 'entity', array('class' => 'AppBundle:Listas','required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_documento')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('numero_documento_conyugue', 'text', array('required' => false))
			->add('primer_apellido_conyugue', 'text', array('required' => false))
			->add('segundo_apellido_conyugue', 'text', array('required' => false))
			->add('primer_nombre_conyugue', 'text', array('required' => false))
			->add('segundo_nombre_conyugue', 'text', array('required' => false))
			
			->add('telefono_fijo_conyugue', 'text', array('label' => 'Teléfono fijo conyugue','required' => false))
			->add('telefono_celular_conyugue', 'text', array('label' => 'Teléfono movil conyugue','required' => false))
			
			
		;
    }
    //->add('genero_conyugue')
    //->add('correo_electronico_conyugue', 'email', array('required' => false))
    public function getName()
    {
        return 'beneficiario';
    }
}
