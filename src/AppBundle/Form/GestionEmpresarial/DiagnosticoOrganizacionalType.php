<?php

namespace AppBundle\Form\GestionEmpresarial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;


class DiagnosticoOrganizacionalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			
	 	->add('productivaA', 'choice', array(
        'label' => '¿Cómo es la forma en la que producimos ,transformamos o prestamos el servicio?.',
        'choices'  => array(

        'Cada uno de los(as) de las personas que integran el grupo produce en forma distinta.' => 1,        
        'Existen algunos(as) personas del grupo que están unificando los procesos de producción.' => 2,
        'Existen procesos de producción iguales para todos los socios.' => 3,

    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaB', 'choice', array(
        'label' => '¿Cómo Cumplimos los requisitos de distintos clientes?.',    
        'choices'  => array(
            
        'No diferenciamos requisitos técnicos para nuestros clientes.' => 1, 
        'Cumplimos con algunos requisitos técnicos para algunos clientes.' => 2,
        'Producimos teniendo en cuenta requisitos técnico de distintos clientes.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaC', 'choice', array(
        'label' => '¿Cómo compramos los insumos?.',
        'choices'  => array(
            
        'Cada uno compra en forma individual los insumos que requiere.' => 1,
        'Hacemos compras de algunos insumos en conjunto' => 2,
        'Hacemos la totalidad de las compras de insumos de acuerdo con las necesidades de todos' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaD', 'choice', array(
        'label' => '¿Tenemos los registros y aplicamos las normas sanitarias que exigen el mercado?.',
        'choices'  => array(
            
        'El mercado que tenemos no nos exige registros ni normas sanitarias.' => 1,
        'Estamos iniciando el registro de algunas normas sanitarias.' => 2,
        'Cumplimos con el registro y normas sanitarias que nos exige el mercado.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaE', 'choice', array(
        'label' => '¿Que nivel de calidad tenemos en nuestros productos en el mercado que atentemos?.',
        'choices'  => array(
            
        'No tenemos que cumplir requisitos de calidad para el mercado que atendemos.' => 1,
        'No cumplimos con algunos requisitos de calidad del mercado que atendemos.' => 2,
        'Cumplimos con los requisitos de calidad del mercado especializado al que hemos logrado llegar.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('productivaF', 'choice', array(
        'label' => '¿Hacemos control de calidad del producto o servicio.?',
        'choices'  => array(
            
        'No controlamos la calidad del producto o servicio ' => 1,
        'Tenemos algunos procesos de control de calidad del producto o servicio.' => 2,
        'Tenemos control de calidad y hacemos seguimiento a la calidad de los productos.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))

        ->add('comercialA', 'choice', array(
        'label' => '¿Cómo fijamos el precio de venta de los productos y/o servicios?.',
        'choices'  => array(

        'No fijamos el precio de venta' => 1,        
        'Con algunos clientes podemos negociar el precio y algunas condiciones comerciales.' => 2,
        'Podemos fijar el precio directamente con los clientes.' => 3,

    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('comercialB', 'choice', array(
        'label' => '¿En que forma vendemos?.',
        'choices'  => array(
            
        'Cada Productor vende su producto en forma individual.' => 1, 
        'Tenemos algunos grandes clientes y hacemos algunas grandes ventas en conjunto.' => 2,
        'Trabajamos conjuntamente para atender negocios en los que vendamos en conjunto' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('comercialC', 'choice', array(
        'label' => '¿Como conseguimos los clientes?.',
        'choices'  => array(
            
        'Los clientes nos buscan y compran los productos' => 1,
        'Identificamos los clientes para disminuir la intermediación.' => 2,
        'Conocemos el mercado y buscamos clientes constantemente.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('comercialD', 'choice', array(
        'label' => '¿Hemos desarrollado nuevos productos?.',
        'choices'  => array(
            
        'El mercado no nos exige el desarrollo de nuevos productos.' => 1,
        'Hemos visto la oportunidad de desarrollar nuevos productos, pero no tenemos la tecnologia necesaria.' => 2,
        'Hemos desarrollado nuevos productos solicitados por los clientes.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('comercialE', 'choice', array(
        'label' => '¿Cómo damos a conocer nuestros productos a los clientes?.',
        'choices'  => array(
            
        'Contamos a las personas conocidas sobre el producto que tenemos' => 1,
        'Tenemos catálogos de productos, pero falta desarrollar más.' => 2,
        'Hacemos promoción de los productos por diferentes medios (publicidad, ferias entre otros).' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))



        ->add('financieraA', 'choice', array(
        'label' => '¿Cómo determinamos la utilidad de nuestros productos ?.',
        'choices'  => array(

        'No tenemos en cuenta los costos para establecer la utilidad.' => 1,        
        'Se tienen en cuenta costos de producción y administrativos. para conocer la ganancia neta.' => 2,
        'Se conoce la totalidad de los costos internos y externos para determinar la ganancia neta.' => 3,

    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('financieraB', 'choice', array(
        'label' => '¿Contamos con algun mecanismo de capitalización fuera de los bancos u otras instituciones bancarias ?.',
        'choices'  => array(
            
        'No contamos con ningun mecanismo de financiacion interna.' => 1, 
        'Si contamos con un fondo de ahorro y credito pero actualmente no funciona.' => 2,
        'Si contamos con un fondo de ahorro y credito y actualmente funciona.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('financieraC', 'choice', array(
        'label' => '¿Como conseguimos recursos para el grupo?.',
        'choices'  => array(
            
        'No gestionamos para conseguir recursos' => 1,
        'En ocasiones hemos conseguido recursos de forma grupal.' => 2,
        'Presentamos proyectos y gestionamos de forma grupal para conseguir recursos.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('financieraD', 'choice', array(
        'label' => '¿Cómo planificamos el uso del dinero en nuestro negocio?.',
        'choices'  => array(
            
        'No planificamos el uso del dinero,gastamos en lo urgente.' => 1,
        'Planificamos algunas veces comprando lo que se decide que es prioritario.' => 2,
        'Planificamos el uso del dinero de acuerdo a lo que dicen los socios.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('financieraE', 'choice', array(
        'label' => '¿Cómo llevamos la información contable de la organización?.',
        'choices'  => array(
            
        'No llevamos la contabilidad.' => 1,
        'Contamos con un libro de ingresos y egresos soportando todos los gastos.' => 2,
        'Tenemos un contador que lleva la contabilidad del grupo.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('financieraF', 'choice', array(
        'label' => '¿Contamos con un plan de trabajo a mediano plazo ?.',
        'choices'  => array(
            
        'No contamos con un plan de trabajo' => .1,
        'Se tienen planeadas algunas actividades del negocio.' => 2,
        'Contamos con un documento escrito del plan de trabajo de nuestro grupo.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))

        ->add('administrativaA', 'choice', array(
        'label' => '¿Cómo tenemos organizados los papeles y documentos del grupo?.',
        'choices'  => array(

        'No tenemos un archivo con los documentos del negocio.' => 1,        
        'Tenemos los papeles y documentos del grupo, pero en desorden.' => 2,
        'Tenemos ordenados y archivados la totalidad de los documentos del grupo.' => 3,

    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('administrativaB', 'choice', array(
        'label' => '¿Cómo realizamos las labores administrativas en nuestro grupo?.',
        'choices'  => array(
            
        'No tenemos personal administrativo.' => 1, 
        'Las tareas se reparten entre el lider y los integrantes del grupo.' => 2,
        'Se cuenta con personal administrativo que paga el grupo.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('administrativaC', 'choice', array(
        'label' => '¿Contamos con manuales administrativos y reglamentos de trabajo?.',
        'choices'  => array(
            
        'No contamos con manuales administrativos y/o reglamentos de trabajo.' => 1,
        'Estan en proceso algunos reglamentos basicos de trabajo.' => 2,
        'Tenemos los reglamentos y manuales de trabajo que necesitamos.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,

))
        ->add('administrativaD', 'choice', array(
        'label' => '¿Vendemos con o sin factura?.',
        'choices'  => array(
            
        'Generalmente vendemos sin factura.' => 1,
        'Vendemos con factura a los clientes que lo exigen.' => 2,
        'Vendemos la totalidad de lo vendido con factura.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('administrativaE', 'choice', array(
        'label' => '¿Cómo nos repartimos las labores al interior de la institución?.',
        'choices'  => array(
            
        'No hay tareas asignadas ni plan de trabajo.' => 1,
        'Existen algunos comites de trabajo.' => 2,
        'Existen funciones definidas, hay una clara division del trabajo.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))

        ->add('organizacionalA', 'choice', array(
        'label' => '¿Con que frecuencia nos reunimos para analizar temas de nuestro negocio?.',
        'choices'  => array(

        'Nos reunimos muy ocasionalmente.' => 1,        
        'Se cita a asamblea normal o extraordinaria cuando es necesario, solo cuando existe.' => 2,
        'Los socios se reunen constantemente o minimo cuando lo dictan los estatutos.' => 3,

    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('organizacionalB', 'choice', array(
        'label' => '¿Trabajamos en proyectos que mejoren la condición de los asociados?.',
        'choices'  => array(
            
        'Todavia no hemos hecho proyectos que beneficien a la mayoria.' => 1, 
        'Tenemos algunos proyectos que han mejorado la situación de los asociados.' => 2,
        'Tenemos proyectos que estan beneficiando la calidad de vida de los asociados.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('organizacionalC', 'choice', array(
        'label' => '¿Comó participamos en el grupo?.',
        'choices'  => array(
            
        'Se cuentan con pocas actividades colectivas.' => 1,
        'Tenemos participación de los lideres de la asociación y algunos socios.' => 2,
        'La mayoria de los miembros del grupo participan en diferentes actividades.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
    
))
        ->add('organizacionalD', 'choice', array(
        'label' => '¿Comó observamos el progreso de nuestro grupo?.',
        'choices'  => array(
            
        'No hacemos seguimiento al desarrollo de las actividades de nuestro grupo.' => 1,
        'Programamos tareas pero no les hacemos seguimiento.' => 2,
        'Normalmente llevamos actas de seguimiento para saber como va el proceso del grupo.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true,
))
        ->add('organizacionalE', 'choice', array(
        'label' => '¿Cómo elaboramos y presentamos los proyectos ante las entidades?.',
        'choices'  => array(
            
        'No hemos elaborado o presentado nunca un proyecto.' => 1,
        'En algunos proyectos nos ayudan personas externas.' => 2,
        'Somos independientes al formular proyectos.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true))

    ->add('organizacionalF', 'choice', array(
        'label' => '¿Los miembros del grupo han tenido la oportunidad de capacitarse?.',
        'choices'  => array(
            
        'Nuestro proceso asociativo es reciente y faltan programas de capacitación para los asociados.' => 1,
        'Hemos capacitado a los socios en algunas areas.' => 2,
        'Hemos gestionado con entidades externas programas de capacitación.' => 3,
    ),
        'multiple'  => false,
        'expanded'  => true,
    // *this line is important*
    'choices_as_values' => true))
			


			->add('fecha_visita', 'date', array('label' => 'Fecha de la Visita', 'widget' => 'single_text'))
						
			
			
			
		;
    }
    
    public function getName()
    {
        return 'diagramaorganizacional';
    }
}
