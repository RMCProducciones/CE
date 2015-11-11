<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BeneficiarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('tipo_documento')
			->add('numero_documento')
			->add('primer_apellido')
			->add('segundo_apellido', 'text', array('required' => false))
			->add('primer_nombre')
			->add('segundo_nombre', 'text', array('required' => false))
			->add('genero')
			->add('fecha_nacimiento', 'date')
			->add('edad_inscripcion')
			->add('corte_sisben')
			->add('puntaje_sisben')
			->add('pertenencia_etnica')
			->add('grupo_indigena')
			->add('desplazado', 'checkbox', array('required' => false))
			->add('red_unidos', 'checkbox', array('required' => false))
			->add('rol_grupo_familiar')
			->add('hijos_menores_5')
			->add('miembros_nucleo_familiar')
			->add('sabe_leer', 'checkbox', array('required' => false))
			->add('sabe_escribir', 'checkbox', array('required' => false))
			->add('nivel_estudios')
			->add('ocupacion')
			->add('tipo_vivienda')
			->add('telefono_fijo')
			->add('telefono_celular')
			->add('correo_electronico', 'email')
			->add('estado_civil')
			->add('tipo_documento_conyugue')
			->add('numero_documento_conyugue', 'text', array('required' => false))
			->add('primer_apellido_conyugue', 'text', array('required' => false))
			->add('segundo_apellido_conyugue', 'text', array('required' => false))
			->add('primer_nombre_conyugue', 'text', array('required' => false))
			->add('segundo_nombre_conyugue', 'text', array('required' => false))
			
			->add('telefono_fijo_conyugue', 'text', array('required' => false))
			->add('telefono_celular_conyugue', 'text', array('required' => false))
			
			
		;
    }
    //->add('genero_conyugue')
    //->add('correo_electronico_conyugue', 'email', array('required' => false))
    public function getName()
    {
        return 'beneficiario';
    }
}
