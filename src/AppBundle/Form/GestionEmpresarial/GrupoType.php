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
											
			
			
			->add('nombre')
			->add('direccion','text', array('label' => 'Dirección'))
			->add('rural', 'checkbox', array('required' => false))
			->add('barrio', 'text', array('required' => false))
			->add('corregimiento', 'text', array('required' => false))
			->add('vereda', 'text', array('required' => false))
			->add('cacerio', 'text', array('required' => false))
		
			->add('numero_identificacion_tributaria', 'text', array('label' => 'Numero identificación tributaria','required' => false))
			->add('fecha_constitucion_legal', 'date', array('label' => 'Fecha de constitución legal del grupo', 'widget' => 'single_text','required' => false))
			->add('telefono_fijo', 'number', array('required' => false,'label' => 'Teléfono fijo'))
			->add('telefono_celular','number', array('label' => 'Teléfono celular','required' => false))
			->add('correo_electronico', 'email', array('label' => 'Correo electrónico','required' => false))
			
			
			->add('figura_legal_constitucion', 'entity', array('label' => 'Figura legal constitución','class' => 'AppBundle:Listas','required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'figura_legal_constitucion')
										            ->orderBy('l.orden', 'ASC');
										    },))
											
			->add('entidad_financiera_cuenta', 'entity', array('class' => 'AppBundle:Listas',
				                            'required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'entidad_financiera')
										            ->orderBy('l.orden', 'ASC');
										    },))
			
			->add('tipo_cuenta', 'entity', array('class' => 'AppBundle:Listas',
				                            'required' => false,
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_cuenta')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('numero_cuenta','number', array('label' => 'Numero de Cuenta','required' => false))
		;
    }
    
    public function getName()
    {
        return 'grupo';
    }
}
