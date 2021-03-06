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
use AppBundle\Form\GestionEmpresarial\ContadorFilterType;
use AppBundle\Form\GestionEmpresarial\ContadorAsignacionFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

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

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        /*$contador = $em->getRepository('AppBundle:Contador')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Contador')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ContadorFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");    

         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-gestion.html.twig', 
            array(
                'form' => $form->createView(), 
                'contador' => $query,
                'pagination' => $pagination,
                'tipoUsuario' => $valuesFieldBlock[3]
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

             $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $contador->setUsuarioCreacion($usuario);


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
            $contador->setFechaModificacion(new \DateTime());

             $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $contador->setUsuarioModificacion($usuario);

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
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

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
                    $actualizarContadorSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $contadorSoporte->setContador($contador);
                $contadorSoporte->setActive(true);
                $contadorSoporte->setFechaCreacion(new \DateTime());
                $contadorSoporte->setUsuarioCreacion($usuario);

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
                'histotialSoportes' => $histotialSoportes,
                'idContador' => $idContador                
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/documentos-soporte/{idContadorSoporte}/borrar", name="contadorSoporteBorrar")
     */
    public function contadorSoporteBorrarAction(Request $request, $idContador, $idContadorSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $ContadorSoporte = new ContadorSoporte();
        
        $contadorSoporte = $em->getRepository('AppBundle:ContadorSoporte')->findOneBy(
            array('id' => $idContadorSoporte)
        );
        
        $contadorSoporte->setFechaModificacion(new \DateTime());
        $contadorSoporte->setActive(0);
        $contadorSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('contadorSoporte', array( 'idContador' => $idContador));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/documentos-soporte/{idContadorSoporte}/descargar", name="contadorSoporteRecuperarArchivo")
     */
    public function contadorSoporteDescargarAction(Request $request, $idContador, $idContadorSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:ContadorSoporte')->findOneBy(
            array('id' => $idContadorSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
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

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
        ->getRepository('AppBundle:Contador')
        ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ContadorAsignacionFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT contador.id FROM AppBundle:Contador contador JOIN AppBundle:AsignacionContadorGrupo acg WHERE contador = acg.contador AND acg.grupo = :grupo)')
        ->setParameter(':grupo', $grupo);

        $query = $filterBuilder->getQuery();

        }else{

            $form = $this->get('form.factory')->create(new ContadorAsignacionFilterType());
            $query = array();
        }

        $mostrarFiltros = sizeof($asignacionesContadorGrupo);

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
        $query, /* fuente de los datos*/
        $request->query->get('page', 1)/*número de página*/,
        5/*límite de resultados por página*/
        );       

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:asignar-contador-grupo.html.twig', 
            array(
                'form' => $form->createView(),
                'contadores' => $query,
                'asignacionesContadorGrupo' => $asignacionesContadorGrupo,
                'idGrupo' => $idGrupo,
                'grupo'=>$grupo,
                'pagination1' => $pagination1,
                'mostrarFiltros' => $mostrarFiltros
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

