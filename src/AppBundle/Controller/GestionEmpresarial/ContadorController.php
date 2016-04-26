<?php

namespace AppBundle\Controller\GestionEmpresarial;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Contador;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\ContadorSoporte;
use AppBundle\Entity\AsignacionContadorGrupo;



use AppBundle\Form\GestionEmpresarial\ContadorSoporteType;
use AppBundle\Form\GestionEmpresarial\ContadorType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ContadorController extends Controller
{
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/gestion", name="contadorGestion")
     */
    public function contadorGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $contador = $em->getRepository('AppBundle:Contador')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $contador, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-gestion.html.twig', 
            array( 
                'contador' => $contador,
                'pagination' => $pagination
            )
        );
    }
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/nuevo", name="contadorNuevo")
     */
    public function contadorNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $form = $this->createForm(new ContadorType(), $contador);
        
        $form->add(
            'guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $contador = $form->getData();                                 
            $contador->setActive(true);
            $contador->setFechaCreacion(new \DateTime());


            $em->persist($contador);
            $em->flush();

            return $this->redirectToRoute('contadorGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-nuevo.html.twig', 
            array(
                'form' => $form->createView(),                
            )
        );
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/editar", name="contadorEditar")
     */
    public function contadorEditarAction(Request $request, $idContador)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $contador = $em->getRepository('AppBundle:Contador')->findOneBy(
            array('id' => $idContador)
        );

        $form = $this->createForm(new ContadorType(), $contador);
        
        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            $contador = $form->getData();

            $contador->setActive(true);
            $contador->setFechaCreacion(new \DateTime());

            $em->flush();

            return $this->redirectToRoute('contadorGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idContador' => $idContador,
                    'contador' => $contador,                    
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/eliminar", name="contadorEliminar")
     */
    public function contadorEliminarAction(Request $request, $idContador)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $contador = $em->getRepository('AppBundle:Contador')->find($idContador);              

        $em->remove($contador);
        $em->flush();

        return $this->redirect($this->generateUrl('contadorGestion'));

    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/documentos-soporte", name="contadorSoporte")
     */
    public function contadorSoporteAction(Request $request, $idContador)
    {
        $em = $this->getDoctrine()->getManager();

        $contadorSoporte = new ContadorSoporte();
        
        $form = $this->createForm(new ContadorSoporteType(), $contadorSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
            array('active' => '1', 'contador' => $idContador),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
            array('active' => '0', 'contador' => $idContador),
            array('fecha_creacion' => 'ASC')
        );
        
        $contador = $em->getRepository('AppBundle:Contador')->findOneBy(
            array('id' => $idContador)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $contadorSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'contador_tipo_soporte'
                    )
                );
                
                $actualizarContadorSoportes = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'contador' => $idContador
                    )
                );  
            
                foreach ($actualizarContadorSoportes as $actualizarContadorSoporte){
                    echo $actualizarContadorSoporte->getId()." ".$actualizarContadorSoporte->getTipoSoporte()."<br />";
                    $actualizarContadorSoporte->setFechaModificacion(new \DateTime());
                    $actualizarContadorSoporte->setActive(0);
                    $em->flush();
                }
                
                $contadorSoporte->setContador($contador);
                $contadorSoporte->setActive(true);
                $contadorSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($contadorSoporte);
                $em->flush();

                return $this->redirectToRoute('contadorSoporte', array( 'idContador' => $idContador,
                                                                        ));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes                
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/documentos-soporte/{idContadorSoporte}/borrar", name="contadorSoporteBorrar")
     */
    public function contadorSoporteBorrarAction(Request $request, $idContador, $idContadorSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $ContadorSoporte = new ContadorSoporte();
        
        $contadorSoporte = $em->getRepository('AppBundle:ContadorSoporte')->findOneBy(
            array('id' => $idContadorSoporte)
        );
        
        $contadorSoporte->setFechaModificacion(new \DateTime());
        $contadorSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('contadorSoporte', array( 'idContador' => $idContador));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-contador", name="grupoContador")
     */
    public function contadorGrupoAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );
        
        $contadores = new Contador();

        $asignacionesContadorGrupo = $em->getRepository('AppBundle:AsignacionContadorGrupo')->findBy(
            array('grupo' => $grupo)
        ); 

        if($asignacionesContadorGrupo == null){
            $query = $em->createQuery('SELECT c FROM AppBundle:Contador c WHERE c.id NOT IN (SELECT contador.id FROM AppBundle:Contador contador JOIN AppBundle:AsignacionContadorGrupo acg WHERE contador = acg.contador AND acg.grupo = :grupo) AND c.active = 1');
            $query->setParameter(':grupo', $grupo);
            $contadores = $query->getResult(); 
        }else{
            $contadores = array();
        }

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
        $contadores, /* fuente de los datos*/
        $request->query->get('page', 1)/*número de página*/,
        5/*límite de resultados por página*/
        );       

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:asignar-contador-grupo.html.twig', 
            array(
                'contadores' => $contadores,
                'asignacionesContadorGrupo' => $asignacionesContadorGrupo,
                'idGrupo' => $idGrupo,
                'grupo'=>$grupo,
                'pagination1' => $pagination1
            ));     
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-contador/{idContador}/nueva-asignacion", name="grupoContadorAsignacion")
     */
    public function asignarContadorGrupoAction($idGrupo, $idContador)
    {

        $em = $this->getDoctrine()->getManager();

        $contador = $em->getRepository('AppBundle:Contador')->findOneBy(
            array('id' => $idContador)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );        
           
        $asignacionContadorGrupo = new AsignacionContadorGrupo();

        $asignacionContadorGrupo->setGrupo($grupo);        
        $asignacionContadorGrupo->setContador($contador);
        $asignacionContadorGrupo->setActive(true);
        $asignacionContadorGrupo->setFechaCreacion(new \DateTime());

        $em->persist($asignacionContadorGrupo);
        $em->flush();



        return $this->redirectToRoute('grupoContador', 
            array(
                'contador' => $contador,          
                'asignacionContadorGrupo' => $asignacionContadorGrupo,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-contador/{idAsignacionContador}/eliminar", name="grupoContadorEliminar")
     */
    public function eliminarContadorGrupoAction($idGrupo, $idAsignacionContador)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionContadorGrupo = new AsignacionContadorGrupo();

        $asignacionContadorGrupo = $em->getRepository('AppBundle:AsignacionContadorGrupo')->find($idAsignacionContador); 

        $em->remove($asignacionContadorGrupo);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $contadores = new Contador();

        $asignacionesContadorGrupo = $em->getRepository('AppBundle:AsignacionContadorGrupo')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT c FROM AppBundle:Contador c WHERE c.id NOT IN (SELECT contador.id FROM AppBundle:Contador contador JOIN AppBundle:AsignacionContadorGrupo acg WHERE contador = acg.contador AND acg.grupo = :grupo) AND c.active = 1');
        $query->setParameter(':grupo', $grupo);
        $contadores = $query->getResult();

        return $this->redirectToRoute('grupoContador', 
            array(
                'contador' => $contadores,          
                'asignacionContadorGrupo' => $asignacionContadorGrupo,                
                'idGrupo' => $idGrupo
            ));       
        
    }   

}

