<?php

namespace AppBundle\Form\GestionFinanciera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ParticipanteType extends AbstractType
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
			->add('segundo_apellido')
			->add('primer_nombre')
			->add('segundo_nombre')
			->add('genero', 'entity', array(
				'class' => 'AppBundle:Listas', 
				
				'query_builder' => function(EntityRepository $er) {
			        return $er->createQueryBuilder('l')
			        	->where('l.dominio = :dominio')
			        	->andWhere('l.active = 1')
			        	->setParameter('dominio', 'genero')
			            ->orderBy('l.orden', 'ASC');
			    },))
			->add('fecha_nacimiento', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('edad_inscripcion', 'text', array('label' => 'Edad al momento de la inscripción'))
			
			->add('pertenencia_etnica', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'pertenencia_etnica')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('grupo_indigena', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'grupo_indigena')
										            ->orderBy('l.orden', 'ASC')
										            ->addOrderBy('l.descripcion', 'ASC');
										    },))
			->add('desplazado', 'checkbox', array('label' => 'Desplazado por la violencia' , 'required' => false))
			->add('discapacidad', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'discapacidad')
										            ->orderBy('l.orden', 'ASC');
										    },))
		
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
			->add('ocupacion', 'entity', array('class' => 'AppBundle:Listas',
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
			->add('telefono_fijo')
			->add('telefono_celular')
			->add('correo_electronico', 'email',array('label' => 'Correo eléctronico','required' => false))
			->add('estado_civil', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_civil')
										            ->orderBy('l.orden', 'ASC');
										    },))
	
			
		;
    }
    //->add('genero_conyugue')
    //->add('correo_electronico_conyugue', 'email', array('required' => false))
    public function getName()
    {
        return 'Participante';
    }
}
