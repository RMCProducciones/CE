<?php

namespace AppBundle\Form\GesionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class IntegrantesCLEARType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo_documento')
			->add('numero_documento')
			->add('primer_apellido')
			->add('segundo_apellido')
			->add('primer_nombre')
			->add('segundo_nombre',array('required' => false))
			->add('genero')
			->add('fecha_nacimiento', 'date')
			->add('pertenencia_etnica')
			->add('grupo_indigena')
			->add('nivel_estudios',array('required' => false))
			->add('entidad_representa')
			->add('cargo_entidad')
			->add('telefono_fijo',array('required' => false))
			->add('telefono_movil')
			->add('correo_electronico', 'email')
		;
    }
    
    public function getName()
    {
        return 'integrantesCLEAR';
    }
}
