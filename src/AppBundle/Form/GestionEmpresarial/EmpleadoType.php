<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		
			->add('periodicidad', 'entity', array(			
				  'class' => 'AppBundle:Listas',
				  'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('l')
						->where('l.dominio = :dominio')
						->andWhere('l.active = 1')
						->setParameter('dominio', 'periodicidad')
						->orderBy('l.orden', 'ASC');
				},
			))
											
			->add('nombre', 'text', array('label' => 'Nombre del Empleado'))			
			->add('sexo', 'entity', array(
				'label' => 'Genero',
				'class' => 'AppBundle:Listas', 
				
				'query_builder' => function(EntityRepository $er) {
			        return $er->createQueryBuilder('l')
			        	->where('l.dominio = :dominio')
			        	->andWhere('l.active = 1')
			        	->setParameter('dominio', 'genero')
			            ->orderBy('l.orden', 'ASC');
			    },))
			->add('socio_organizacion', 'checkbox', array('label' => 'Es socio de la organización', 'required' => false))
			->add('fecha_ingreso', 'date', array('label' => 'Fecha de Ingreso', 'widget' => 'single_text'))
			->add('fecha_nacimiento', 'date', array('label' => 'Fecha de nacimiento', 'widget' => 'single_text'))
			->add('edad_al_ingreso', 'text', array('label' => 'Edad al Ingreso'))
			->add('periodo_pago', 'text', array('label' => 'Periodo Pagado'))
			->add('remuneracion__bruta_anual', 'text', array('label' => 'Remuneracion Anual'))
			
			
			;
    
    }
	
    public function getName()
    {
        return 'empleado';
    }
}
