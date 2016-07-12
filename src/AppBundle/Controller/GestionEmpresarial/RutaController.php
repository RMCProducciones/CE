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

use AppBundle\Entity\Ruta;
use AppBundle\Entity\RutaSoporte;
use AppBundle\Entity\DocumentoSoporte;
use AppBundle\Entity\TerritorioAprendizaje;
use AppBundle\Entity\AsignacionOrganizacionRuta;
use AppBundle\Entity\AsignacionOrganizacionTerritorioAprendizaje;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\AsignacionGrupoBeneficiarioRuta;



use AppBundle\Form\GestionEmpresarial\RutaType;
use AppBundle\Form\GestionEmpresarial\RutaSoporteType;
use AppBundle\Form\GestionEmpresarial\RutaFilterType;
use AppBundle\Form\GestionEmpresarial\RutaTerritorioFilterType;
use AppBundle\Form\GestionEmpresarial\RutaGrupoFilterType;
use AppBundle\Form\GestionEmpresarial\RutaOrganizacionFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class RutaController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/gestion", name="rutaGestion")
     */
    public function rutaGestionAction(Request $request)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

       /* $rutas = $em->getRepository('AppBundle:Ruta')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Ruta')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new RutaFilterType());

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

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:ruta-gestion.html.twig', 
            array( 'form' => $form->createView(),
                'rutas' => $query,
                'pagination' => $pagination,
                'tipoUsuario' => $valuesFieldBlock[3]
                )
            );
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/nuevo", name="rutaNuevo")
     */
    public function rutaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();
        
        $form = $this->createForm(new RutaType(), $ruta);
        
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
            
            $ruta = $form->getData();


            $ruta->setActive(true);
            $ruta->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $ruta->setUsuarioCreacion($usuario);

            $em->persist($ruta);
            $em->flush();

            return $this->redirectToRoute('rutaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:ruta-nuevo.html.twig', array('form' => $form->createView()));
    }

    
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/editar", name="rutaEditar")
     */
    public function rutaEditarAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        $form = $this->createForm(new RutaType(), $ruta);
        
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

            $ruta = $form->getData();

            $ruta->setFechaModificacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $ruta->setUsuarioModificacion($usuario);


            $em->flush();

            return $this->redirectToRoute('rutaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:ruta-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idRuta' => $idRuta,
                    'ruta' => $ruta,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/eliminar", name="rutaEliminar")
     */
    public function rutaEliminarAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();

        $ruta = $em->getRepository('AppBundle:Ruta')->find($idRuta);              

        $em->remove($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaGestion');

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/documentos-soporte", name="rutaSoporte")
     */
    public function rutaSoporteAction(Request $request, $idRuta)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $rutaSoporte = new RutaSoporte();
        
        $form = $this->createForm(new RutaSoporteType(), $rutaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:RutaSoporte')->findBy(
            array('active' => '1', 'ruta' => $idRuta),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:RutaSoporte')->findBy(
            array('active' => '0', 'ruta' => $idRuta),
            array('fecha_creacion' => 'ASC')
        );
        
        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $rutaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarRutaSoportes = $em->getRepository('AppBundle:RutaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'ruta' => $idRuta
                    )
                );  
            
                foreach ($actualizarRutaSoportes as $actualizarRutaSoporte){
                    echo $actualizarRutaSoporte->getId()." ".$actualizarRutaSoporte->getTipoSoporte()."<br />";
                    $actualizarRutaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarRutaSoporte->setActive(0);
                    $actualizarRutaSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $rutaSoporte->setRuta($ruta);
                $rutaSoporte->setActive(true);
                $rutaSoporte->setFechaCreacion(new \DateTime());
                $rutaSoporte->setUsuarioCreacion($usuario);

                $em->persist($rutaSoporte);
                $em->flush();

                return $this->redirectToRoute('rutaSoporte', array( 'idRuta' => $idRuta));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:ruta-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idRuta' => $idRuta
            )
        );
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/documentos-soporte/{idRutaSoporte}/descargar", name="rutaSoporteRecuperarArchivo")
     */
    public function rutaSoporteDescargarAction(Request $request, $idRuta, $idRutaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:RutaSoporte')->findOneBy(
            array('id' => $idRutaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/documentos-soporte/{idRutaSoporte}/borrar", name="rutaSoporteBorrar")
     */
    public function rutaSoporteBorrarAction(Request $request, $idRuta, $idRutaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $RutaSoporte = new RutaSoporte();
        
        $rutaSoporte = $em->getRepository('AppBundle:RutaSoporte')->findOneBy(
            array('id' => $idRutaSoporte)
        );
        
        $rutaSoporte->setFechaModificacion(new \DateTime());
        $rutaSoporte->setActive(0);
        $rutaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('rutaSoporte', array( 'idRuta' => $idRuta));
        
    }



        /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio", name="rutaTerritorio")
     */
    public function rutaTerritorioAction(Request $request, $idRuta)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        if($ruta->getTerritorioAprendizaje() != null){            
            $idTerritorioAprendizaje = $ruta->getTerritorioAprendizaje()->getId();        

            $territorioAsignado = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
                array('id' => $idTerritorioAprendizaje)
            );
            
        }else{

            $territorioAsignado = null;
        }       

         $form = $this->get('form.factory')->create(new RutaTerritorioFilterType());        

        if($ruta->getTerritorioAprendizaje() == null){            
            $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:TerritorioAprendizaje')
            ->createQueryBuilder('q');

        

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (                        
                        SELECT territorioAprendizaje.id FROM AppBundle:TerritorioAprendizaje territorioAprendizaje JOIN AppBundle:Ruta arc WHERE territorioAprendizaje = arc.territorio_aprendizaje AND arc.territorio_aprendizaje = :territorio_aprendizaje) ')
        ->setParameter('territorio_aprendizaje', $ruta);

        $query = $filterBuilder->getQuery();

        }else{
            $query = array(); 
        }


        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:territorio-ruta-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'territorios' => $query,
                'asignacionesTerritorioRuta' => $territorioAsignado,
                'idRuta' => $idRuta,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio/{idTerritorio}/nueva-asignacion", name="rutaAsignarTerritorio")
     */
    public function rutaAsignarTerritorioAction($idRuta, $idTerritorio)
    {

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorio)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );     

        $ruta->setTerritorioAprendizaje($territorios);
        $ruta->setActive(true);
        $ruta->setFechaModificacion(new \DateTime());
        $ruta->setUsuarioModificacion($usuario);


        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaTerritorio', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioRuta' => $ruta,                 
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio/{idTerritorio}/eliminar", name="rutaEliminarTerritorio")
     */
    public function rutaEliminarTerritorioAction(Request $request, $idRuta, $idTerritorio)
    {
        $em = $this->getDoctrine()->getManager();               

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario)); 

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );                    

        $asignacionOrganizacionRuta = new AsignacionOrganizacionRuta();

        $asignacionOrganizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->findBy(
            array('ruta' => $idRuta)
        );       

        foreach($asignacionOrganizacionRuta as $asignacionOrganizacionRutaActual){
            $em->remove($asignacionOrganizacionRutaActual);
        }
        
        $ruta->setNullTerritorioAprendizaje();

        $ruta->setFechaModificacion(new \DateTime());
        $ruta->setUsuarioModificacion($usuario);

        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaTerritorio',
             array(
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion", name="rutaOrganizacion")
     */
    public function rutaOrganizacionAction(Request $request, $idRuta)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
        
        $territorioAprendizaje = $ruta->getTerritorioAprendizaje()->getId();

        
        $organizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->findBy(
            array('ruta' => $idRuta)
        );        

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionRuta aoc WHERE organizacion = aoc.organizacion AND aoc.ruta = :ruta) AND o.active = 1 AND o.ruta = 1');
            $query->setParameter('ruta', $ruta);
            $organizaciones = $query->getResult();

        $mostrarOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('organizacion' => $organizaciones, 'territorio_aprendizaje' => $territorioAprendizaje));



        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Organizacion')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new RutaOrganizacionFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionRuta aoc WHERE organizacion = aoc.organizacion AND aoc.ruta = :ruta) AND q.ruta = 1')
        ->setParameter('ruta', $ruta);

        $query = $filterBuilder->getQuery();



        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:organizacion-ruta-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'organizaciones' => $query, 
                'asignacionesOrganizacionRuta' => $organizacionRuta,
                'idRuta' => $idRuta,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                              
            ));        
        
    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="rutaAsignarOrganizacion")
     */
    public function rutaAsignarOrganizacionAction($idRuta, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        $asignacionesOrganizacionRuta = new AsignacionOrganizacionRuta();

        $asignacionesOrganizacionRuta->setOrganizacion($organizaciones);
        $asignacionesOrganizacionRuta->setRuta($ruta);           
        $asignacionesOrganizacionRuta->setActive(true);
        $asignacionesOrganizacionRuta->setFechaCreacion(new \DateTime());
        $asignacionesOrganizacionRuta->setUsuarioCreacion($usuario);


        $em->persist($asignacionesOrganizacionRuta);
        $em->flush();



        return $this->redirectToRoute('rutaOrganizacion', 
            array(
                'organizaciones' => $organizaciones, 
                'asignacionesOrganizacionRuta' => $asignacionesOrganizacionRuta,
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion/{idAsignacionOrganizacionRuta}/eliminar", name="rutaEliminarOrganizacion")
     */
    public function rutaEliminarOrganizacionAction(Request $request, $idRuta, $idAsignacionOrganizacionRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesOrganizacionRuta = new AsignacionOrganizacionRuta();

        $asignacionesOrganizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->find($idAsignacionOrganizacionRuta); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesOrganizacionRuta);
        $em->flush();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        $asignacionesOrganizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->findBy(
            array('ruta' => $ruta)
        );  

        return $this->redirectToRoute('rutaOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesOrganizacionRuta' => $asignacionesOrganizacionRuta,
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo", name="rutaGrupo")
     */
    public function rutaGrupoAction(Request $request, $idRuta)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $municipioUsuario = $this->get('security.context')->getToken()->getUser()->getMunicipio();
        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        if($ruta->getGrupo() != null){            
            $idGrupo = $ruta->getGrupo()->getId();        

            $grupoAsignado = $em->getRepository('AppBundle:Grupo')->findBy(
                array('id' => $idGrupo)
            );
            
        }else{

            $grupoAsignado = null;
        }       

        $form = $this->get('form.factory')->create(new RutaGrupoFilterType());        

        $obj = new FilterLocation();

        $filterBuilder = $obj->queryFilter($request, $this, $form, $rolUsuario, $municipioUsuario, 'AppBundle:Grupo');

        if($ruta->getGrupo() == null){             
            $filterBuilder
            ->andWhere('q.active = 1')
            ->andWhere('q.id NOT IN  (
                           SELECT 
                                grupo.id 
                           FROM 
                                AppBundle:Grupo grupo 
                           JOIN 
                                AppBundle:Ruta arc 
                           WHERE 
                                grupo = arc.grupo 
                                AND arc.grupo = :grupo                            
                        )   
                            AND q.codigo IS NOT NULL')
                 //AND g.codigo IS NOT NULL //----> Mostrar solo los de codigo grupo
            ->setParameter('grupo', $ruta);

            $query = $filterBuilder->getQuery();
        
        }else{

            $query = array(); 
        }
        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:grupo-ruta-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'grupos' => $query,
                'asignacionesGrupoRuta' => $grupoAsignado,
                'idRuta' => $idRuta,
                'pagination1' => $pagination1,
                'departamento' => $_GET['selDepartamento'],
                'zona' => $_GET['selZona'],
                'municipio' => $_GET['selMunicipio'],
                'campoDeshabilitadoDepartamento' => $valuesFieldBlock[0],
                'campoDeshabilitadoZona' => $valuesFieldBlock[1],
                'campoDeshabilitadoMunicipio' => $valuesFieldBlock[2],
                'tipoUsuario' => $valuesFieldBlock[3]
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="rutaAsignarGrupo")
     */
    public function rutaAsignarGrupoAction($idRuta, $idGrupo)
    {

       $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        //$asignacionesGrupoPasantia = new Pasantia();

        $ruta->setGrupo($grupos);        
        $ruta->setActive(true);
        $ruta->setFechaModificacion(new \DateTime());
        $ruta->setUsuarioModificacion($usuario);

        $em->persist($ruta);
        $em->flush();



        return $this->redirectToRoute('rutaGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoRuta' => $ruta,
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/eliminar", name="rutaEliminarGrupo")
     */
    public function rutaEliminarGrupoAction(Request $request, $idRuta, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();  

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));              

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        $asignacionGrupoBeneficiarioRuta = new AsignacionGrupoBeneficiarioRuta();

        $asignacionGrupoBeneficiarioRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->findBy(
            array('ruta' => $idRuta)
        );       

        foreach($asignacionGrupoBeneficiarioRuta as $asignacionGrupoBeneficiarioRutaActual){
            $em->remove($asignacionGrupoBeneficiarioRutaActual);
        }

        $ruta->setNullGrupo();
        $ruta->setFechaModificacion(new \DateTime());
        $ruta->setUsuarioModificacion($usuario);

        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaGrupo',
             array(
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/asignacion-beneficiario", name="rutaGrupoBeneficiario")
     */
    public function rutaGrupoBeneficiarioAction(Request $request, $idRuta, $idGrupo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->findBy(
            array('ruta' => $idRuta)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($ruta->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioRuta abc WHERE beneficiario = abc.beneficiario AND abc.ruta = :ruta) AND b.active = 1');
        $query->setParameter(':ruta', $ruta);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $mostrarBeneficiarios, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Ruta:beneficiario-grupo-ruta-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosRuta' => $beneficiariosRuta,
                'idRuta' => $idRuta, 
                'idGrupo' => $idGrupo,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                               
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/nueva-asignacion", name="rutaAsignarGrupoBeneficiario")
     */
    public function rutaAsignarGrupoBeneficiarioAction($idRuta, $idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

         $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        $asignacionesGrupoBeneficiarioRuta = new AsignacionGrupoBeneficiarioRuta();

        $asignacionesGrupoBeneficiarioRuta->setBeneficiario($beneficiario);        
        $asignacionesGrupoBeneficiarioRuta->setRuta($ruta);           
        $asignacionesGrupoBeneficiarioRuta->setActive(true);
        $asignacionesGrupoBeneficiarioRuta->setFechaCreacion(new \DateTime());
        $asignacionesGrupoBeneficiarioRuta->setUsuarioCreacion($usuario);

        $em->persist($asignacionesGrupoBeneficiarioRuta);
        $em->flush();



        return $this->redirectToRoute('rutaGrupoBeneficiario', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesGrupoBeneficiarioRuta' => $asignacionesGrupoBeneficiarioRuta,
                'idRuta' => $idRuta,
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/{idBeneficiarioRuta}/eliminar", name="rutaEliminarGrupoBeneficiario")
     */
    public function rutaEliminarGrupoBeneficiarioAction(Request $request, $idRuta, $idGrupo, $idBeneficiario, $idBeneficiarioRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoBeneficiarioRuta = new AsignacionGrupoBeneficiarioRuta();

        $asignacionesGrupoBeneficiarioRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($idBeneficiarioRuta); 

        $em->remove($asignacionesGrupoBeneficiarioRuta);
        $em->flush();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->findBy(
            array('ruta' => $idRuta)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($ruta->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioRuta abc WHERE beneficiario = abc.beneficiario AND abc.ruta = :ruta) AND b.active = 1');
        $query->setParameter(':ruta', $ruta);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('rutaGrupoBeneficiario',
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosRuta' => $beneficiariosRuta,
                'idRuta' => $idRuta, 
                'idGrupo' => $idGrupo,     
            ));      
        
    } 

    


}

