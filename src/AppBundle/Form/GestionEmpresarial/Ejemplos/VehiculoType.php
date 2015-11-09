<?php

namespace Pacto\PactoBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Formulario para crear y manipular entidades de tipo Vehiculo.
 * Como se utiliza en la parte pública del sitio, algunas propiedades de
 * la entidad no se incluyen en el formulario.
 */
class VehiculoType extends AbstractType
{
	private $idPais;
	
	public function __construct($idPais)
    {
        $this->idPais = $idPais;
    }
	
	
    public function buildForm(FormBuilder $builder, array $options) 
    {
		$idPais_f = $this->idPais;
		
		$builder
			->add('placa')
			->add('transportador')
			->add('tipo_vehiculo', 'entity', array(
				'class' => 'PactoBundle:TipoVehiculo',
				'query_builder' => function(EntityRepository $er) use ($idPais_f) {
					return $er->createQueryBuilder('e')
							->where('e.pais = :pais_id')
							->setParameter('pais_id', $idPais_f); 
					},
				'empty_value' => 'No Aplica', 
				'required' => false
			))
			->add('tipo_contenedor', 'entity', array('class' => 'PactoBundle:TipoContenedor', 'empty_value' => 'No Aplica', 'required' => false))
			->add('tipo_equipo_especial', 'entity', array('class' => 'PactoBundle:TipoEquipoEspecial', 'empty_value' => 'No Aplica', 'required' => false))
			->add('refrigerado', 'checkbox', array('required' => false))
			->add('fiscal', 'checkbox', array('required' => false))
			->add('ciudad')
			->add('fecha_inicio_disponibilidad', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('fecha_fin_disponibilidad', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('disponibilidad_peso')
			->add('disponibilidad_cubicaje')
			->add('comentarios')
			->add('disponible', 'checkbox', array('required' => false))
		;
		
		/*$builder
            ->add('nombre')
            ->add('apellidos')
            ->add('email', 'email')
            
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'options' => array('label' => 'Contraseña'),
                'required' => false
            ))
            
            ->add('direccion')
            ->add('permite_email', 'checkbox', array('required' => false))
            ->add('fecha_nacimiento', 'birthday')
            ->add('dni')
            ->add('numero_tarjeta')
            
            ->add('ciudad', 'entity', array(
                'class' => 'Cupon\\CiudadBundle\\Entity\\Ciudad',
                'empty_value' => 'Selecciona una ciudad',
                'query_builder' => function(EntityRepository $repositorio) {
                    return $repositorio->createQueryBuilder('c')
                        ->orderBy('c.nombre', 'ASC');
                },
            ))
        ;*/
    }
    
    public function getName()
    {
        return 'frontend_vehiculo';
    }
}
