<?php

namespace Pacto\PactoBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Formulario para crear y manipular entidades de tipo Servicio.
 * Como se utiliza en la parte pública del sitio, algunas propiedades de
 * la entidad no se incluyen en el formulario.
 */
class ServicioLTLType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
			->add('usuario')
			->add('origen')
			->add('destino')
			->add('fecha_recogida_desde', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('fecha_recogida_hasta', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('elevador_recogida', 'checkbox', array('required' => false))
			->add('tipo_lugar_recogida')
			->add('fecha_entrega_desde', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('fecha_entrega_hasta', 'date', array(
					'widget' => 'single_text',
					'format' => 'yyyy-MM-dd HH:mm',
					))
			->add('elevador_entrega', 'checkbox', array('required' => false))
			->add('tipo_lugar_entrega')
			->add('unidades_peso')
			->add('unidades_longitud')
		;
		
		//Campo que no es de la entidad
		//$builder->add('acepto', 'checkbox', array('property_path' => false));
		
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
        return 'frontend_usuario';
    }
}
