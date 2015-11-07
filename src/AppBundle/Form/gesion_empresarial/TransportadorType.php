<?php

namespace Pacto\PactoBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Formulario para crear y manipular entidades de tipo Transportador.
 * Como se utiliza en la parte pública del sitio, algunas propiedades de
 * la entidad no se incluyen en el formulario.
 */
class TransportadorType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
			->add('nombre')
			->add('email', 'email')
			->add('password', 'repeated', array(
				'type' => 'password',
				'invalid_message' => 'Las dos contraseñas deben coincidir',
				'options' => array('label' => '_')
			))
			->add('logo', 'file', array('required' => false))
			->add('web', 'text', array('required' => false))
			->add('direccion')
			->add('telefono')
			->add('fax', 'text', array('required' => false))
			->add('celular', 'text')
			->add('tipo_documento')
			->add('numero_documento')
			->add('estado', 'text', array('property_path' => false))
			->add('ciudad')
			->add('codigo_registro', 'text', array('required' => false))
		;
		
    }
    
    public function getName()
    {
        return 'frontend_transportador';
    }
}
