<?php

namespace AppBundle\Form\gesion_empresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GrupoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('convocatoria')
			->add('municipio')
			->add('tipo')
			->add('fecha_inscripcion')
			->add('codigo')
			->add('nombre')
			->add('direccion')
			->add('rural', 'check', array('required' => false))
			->add('barrio', 'text', array('required' => false))
			->add('corregimiento', 'text', array('required' => false))
			->add('vereda', 'text', array('required' => false))
			->add('cacerio', 'text', array('required' => false))
			->add('figura_legal_constitucion', 'text', array('required' => false))
			->add('numero_identificacion_tributaria', 'text', array('required' => false))
			->add('fecha_constitucion_legal', 'date', array('required' => false))
			->add('telefono_fijo', 'text', array('required' => false))
			->add('telefono_celular')
			->add('correo_electronico', 'email', array('required' => false))
			->add('entidad_financiera_cuenta')
			->add('tipo_cuenta')
			->add('save', 'submit')
		;
    }
    
    public function getName()
    {
        return 'grupo';
    }
}
