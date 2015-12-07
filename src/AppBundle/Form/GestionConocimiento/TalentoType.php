<?php

namespace AppBundle\Form\GestionConocimiento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TalentoType extends AbstractType
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
			->add('tipo', 'entity', array('label' => 'Tipo de Talento', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_talento')
										            ->orderBy('l.orden', 'ASC');
										    },))		
            ->add('numero_documento', 'text', array('label' => 'Número de documento'))											
			->add('primer_apellido')
			->add('segundo_apellido', 'text', array('required' => false))
			->add('primer_nombre')
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
			->add('edad_inscripcion', 'text', array('label' => 'Edad al momento de la inscripción'))
			->add('joven_rural')
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
											
			->add('rol_grupo_familiar', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'rol_grupo_familiar')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			))
			->add('direccion')
			->add('rural', 'checkbox', array('required' => false))
			->add('barrio', 'text', array('required' => false))
			->add('corregimiento', 'text', array('required' => false))
			->add('vereda', 'text', array('required' => false))
			->add('cacerio', 'text', array('required' => false))
			
			->add('telefono_fijo')
			->add('telefono_celular')
			->add('correo_electronico', 'email')
			->add('estado_civil', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'estado_civil')
										            ->orderBy('l.orden', 'ASC');
										    },))
											
			->add('organizacion')
			->add('fecha_inicio_talento', 'date', array('label' => 'Fecha de inicio talento', 'widget' => 'single_text'))								
											
			->add('nivel_estudios', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'nivel_estudios')
										            ->orderBy('l.orden', 'ASC');
										    },))	
             ->add('talento_madr')
			 ->add('talento_otros_lugares')
			 ->add('actividad_participado')
			 ->add('area_desempeno_principal')
			 ->add('area_desempeno_secundario')
			 ->add('area_desempeno_terciario');

											
		
	}		
			
    
    
	
    public function getName()
    {
        return 'Talento';
    }
}
