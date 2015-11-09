<?php

namespace AppBundle\Form\gesion_empresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GrupoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('municipio')
			->add('tipo_documento')
			->add('numero_documento')
			->add('primer_apellido')
			->add('segundo_apellido',array('required' => false))
			->add('primer_nombre')
			->add('segundo_nombre',array('required' => false))
			->add('genero')
			->add('fecha_nacimiento', 'date')
			->add('edad')
			->add('corte_sisben')
			->add('puntaje_sisben')
			->add('pertenencia_etnica')
			->add('grupo_indigena')
			->add('desplazado_violencia')
			->add('red_unidos')
			->add('rol_grupo_familiar')
			->add('hijos_menores_5')
			->add('miembros_nucleo_familiar',array('required' => false))
			->add('sabe_leer')
			->add('sabe_escribir')
			->add('nivel_estudios',array('required' => false))
			->add('ocupacion',array('required' => false))
			->add('tipo_vivienda',array('required' => false))
			->add('telefono_fijo',array('required' => false))
			->add('telefono_movil')
			->add('correo_electronico', 'email')
			->add('estado_civil')
			->add('tipo_documento_conyuge',array('required' => false))
			->add('numero_documento_conyuge',array('required' => false))
			->add('primer_apellido_conyuge',array('required' => false))
			->add('segundo_apellido_conyuge',array('required' => false))
			->add('primer_nombre_conyuge',array('required' => false))
			->add('segundo_nombre_conyuge',array('required' => false))
			->add('genero_conyuge',array('required' => false))
			>add('telefono_fijo_conyuge',array('required' => false))
			->add('telefono_movil_conyuge',array('required' => false))
			->add('correo_electronico_conyuge', 'email',array('required' => false))
			
		;
    }
    
    public function getName()
    {
        return 'beneficiario';
    }
}
