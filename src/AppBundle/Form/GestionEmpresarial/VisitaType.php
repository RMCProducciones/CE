<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class VisitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		     
		    ->add('fecha', 'date', array('label' => 'Fecha de la Visita', 'widget' => 'single_text')) 								
			->add('objetivo', 'textarea', array('label' => 'Objetivo de la Visita'))	
			->add('agenda', 'textarea', array('label' => 'Agenda de la Visita'))
			->add('lugar', 'text', array('label' => 'Lugar de la Visita'))		
		    ->add('asistentes', 'text', array('label' => 'Numero asistentes de la Visita'))	
			->add('comite_compras', 'checkbox', array('label' => 'Comite de Compras', 'required' => false))
			->add('funcionamiento_comite_compras', 'entity', array('label' => 'Funcionamiento Comite de compras', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'funcionamiento')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('comite_vamos_bien', 'checkbox', array('label' => 'Comite vamos bien', 'required' => false))
			->add('funcionamiento_comite_vamos_bien', 'entity', array('label' => 'Funcionamiento Comite vamos bien', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'funcionamiento')
										            ->orderBy('l.orden', 'ASC');
										    },))


            ->add('logros_compras', 'textarea', array('label' => 'Logros Compras'))
            ->add('logros_vamos_bien', 'textarea', array('label' => 'Logros comite vamos bien'))
			->add('contador', 'checkbox', array('label' => 'Contador', 'required' => false))
			->add('desempeno_contador', 'entity', array('label' => 'Desempeño Contador', 
											'class' => 'AppBundle:Listas',
										    'query_builder' => function(EntityRepository $er) {
										        return $er->createQueryBuilder('l')
										        	->where('l.dominio = :dominio')
										        	->andWhere('l.active = 1')
										        	->setParameter('dominio', 'funcionamiento')
										            ->orderBy('l.orden', 'ASC');
										    },))
			->add('observaciones_contador', 'textarea', array('label' => 'Observaciones Contador'))
			->add('observaciones_presupuesto_asignado', 'textarea', array('label' => 'Observaciones Presupuesto Asignado'))
			->add('cambios_presupuesto_asignado', 'checkbox', array('label' => 'Cambios Presupuesto', 'required' => false))
			->add('cambios_razones_presupuesto_asignado', 'textarea', array('label' => 'Cambios Presupuesto Asignado'))
			->add('desempeno_organizacional', 'textarea', array('label' => 'Desempeño Organizacional'))
			->add('desempeno_productivo', 'textarea', array('label' => ' Desempeño Productivo'))
			->add('desempeno_comercial', 'textarea', array('label' => 'Desempeño Comercial'))
			->add('desempeno_administrativo', 'textarea', array('label' => 'Desempeño Administrativo'))
			->add('desempeno_financiero', 'textarea', array('label' => 'Desempeño Financiero'))
            ->add('cambios_integrantes_grupo', 'checkbox', array('label' => 'Cambios Integrante Grupo', 'required' => false))			
			->add('cambios_razones_integrantes_grupo', 'textarea', array('label' => 'Razones cambio Integrantes '))
			->add('observaciones', 'textarea', array('label' => 'Observaciones '))
			->add('compromisos', 'textarea', array('label' => 'Compromisos'))
			->add('interventoria', 'checkbox', array('label' => 'Interventoria', 'required' => false))			
			->add('razones_interventoria', 'textarea', array('label' => 'Razones Interventoria '))


			;
    
    }
	
    public function getName()
    {
        return 'visita';
    }
}
