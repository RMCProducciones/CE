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
			->add('convocatoria', 'entity', array('class' => 'AppBundle:Convocatoria'))
			->add('zona', 'entity', array('mapped' => false, 'class' => 'AppBundle:Zona',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.active = 1')
										            ->orderBy('l.nombre', 'ASC');
										    },))
			->add('departamento', 'entity', array('mapped' => false, 'class' => 'AppBundle:Departamento',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.active = 1')
										            ->orderBy('l.nombre', 'ASC');
										    },))
			->add('municipio', 'entity', array('class' => 'AppBundle:Municipio'))
			->add('tipo', 'entity', array('class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_grupo')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('fecha_inscripcion', 'date', array('label' => 'Fecha de Inscripción', 'widget' => 'single_text'))
			->add('codigo')
			->add('nombre')
			->add('direccion')
			->add('rural', 'checkbox', array('required' => false))
			->add('barrio', 'text', array('required' => false))
			->add('corregimiento', 'text', array('required' => false))
			->add('vereda', 'text', array('required' => false))
			->add('cacerio', 'text', array('required' => false))
			->add('figura_legal_constitucion', 'text', array('required' => false))
			->add('numero_identificacion_tributaria', 'text', array('required' => false))
			->add('fecha_constitucion_legal', 'date', array('label' => 'Fecha de constitucion legal del grupo', 'widget' => 'single_text'))
			->add('telefono_fijo', 'text', array('required' => false))
			->add('telefono_celular')
			->add('correo_electronico', 'email')
			->add('entidad_financiera_cuenta')
			->add('tipo_cuenta')
		;
    }
    
    public function getName()
    {
        return 'grupo';
    }
}
