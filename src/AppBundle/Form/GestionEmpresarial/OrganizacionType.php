<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class OrganizacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
			
            ->add('nombre_organizacion', 'text', array('label' => 'Nombre Organización'))
            ->add('linea_productiva', 'entity', array('label' => 'Linea Productiva', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'linea_productiva')
										            ->orderBy('l.orden', 'ASC');
										    },))
            ->add('tipo_producto', 'text', array('label' => 'Tipo Producto '))
            ->add('fecha_inscripcion', 'date', array('label' => 'Fecha de inscripción', 'widget' => 'single_text'))
            ->add('direccion', 'text', array('label' => 'Dirección'))
			->add('rural', 'checkbox', array('required' => false))
			->add('barrio', 'text', array('required' => false))
			->add('corregimiento', 'text', array('required' => false))
			->add('vereda', 'text', array('required' => false))
			->add('cacerio', 'text', array('required' => false))
			->add('municipio', 'entity', array(
				'class' => 'AppBundle:Municipio',
			))

			->add('tipo_documento_contacto', 'entity', array('label' => 'Tipo de documento', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'tipo_documento')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('numero_documento_contacto', 'text', array('label' => 'Número de documento'))
			
			->add('primer_apellido_contacto')
			->add('segundo_apellido_contacto', 'text', array('required' => false))
			->add('primer_nombre_contacto')
			->add('segundo_nombre_contacto', 'text', array('required' => false))
			
			->add('telefono_fijo_contacto', 'text', array('label' => 'Teléfono fijo'))
			->add('telefono_celular_contacto', 'text', array('label' => 'Teléfono celular'))
			->add('correo_electronico_contacto', 'email',array('label' => 'Correo eléctronico'))
			->add('ruta', 'checkbox', array('label' => 'Ruta' , 'required' => false))
			->add('pasantia', 'checkbox', array('label' => 'Pasantia' , 'required' => false))
			->add('observaciones', 'text', array('label' => 'Observaciones'))
			
			
		;
    }
   
    public function getName()
    {
        return 'organizacion';
    }
}
