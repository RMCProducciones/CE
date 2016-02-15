<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EvaluacionFaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

			
			->add('calificacion')
			->add('aprobado', 'checkbox',
                array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            ))
			;
		}
    
    public function getName()
    {
        return 'evaluacionfase';
    }
}
