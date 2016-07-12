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

use AppBundle\Entity\Pasantia;
use AppBundle\Entity\PasantiaSoporte;
use AppBundle\Entity\DocumentoSoporte;
use AppBundle\Entity\TerritorioAprendizaje;
use AppBundle\Entity\AsignacionOrganizacionPasantia;
use AppBundle\Entity\AsignacionOrganizacionTerritorioAprendizaje;
use AppBundle\Entity\Organizacion;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\AsignacionGrupoBeneficiarioPasantia;
use AppBundle\Entity\Listas;




use AppBundle\Form\GestionEmpresarial\PasantiaFilterType;
use AppBundle\Form\GestionEmpresarial\PasantiaType;
use AppBundle\Form\GestionEmpresarial\PasantiaSoporteType;
use AppBundle\Form\GestionEmpresarial\PasantiaTerritorioFilterType;
use AppBundle\Form\GestionEmpresarial\PasantiaGrupoFilterType;
use AppBundle\Form\GestionEmpresarial\PasantiaOrganizacionFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;





class PasantiaController extends Controller
{

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/gestion", name="pasantiaGestion")
     */
    public function pasantiaGestionAction(Request $request)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        /*$pasantias = $em->getRepository('AppBundle:Pasantia')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Pasantia')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new PasantiaFilterType());

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

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:pasantia-gestion.html.twig', 
            array( 'form' => $form->createView(), 
                'pasantias' => $query,
                'pagination' => $pagination,
                'tipoUsuario' => $valuesFieldBlock[3]
                )
            );
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/nuevo", name="pasantiaNuevo")
     */
    public function pasantiaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia= new Pasantia();
        
        $form = $this->createForm(new PasantiaType(), $pasantia);
        
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
            
            $pasantia = $form->getData();


            $pasantia->setActive(true);
            $pasantia->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $pasantia->setUsuarioCreacion($usuario);

            $em->persist($pasantia);
            $em->flush();

            return $this->redirectToRoute('pasantiaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:pasantia-nuevo.html.twig', array('form' => $form->createView()));
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/editar", name="pasantiaEditar")
     */
    public function pasantiaEditarAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia = new Pasantia();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        $form = $this->createForm(new PasantiaType(), $pasantia);
        
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

            $pasantia = $form->getData();

            $pasantia->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $pasantia->setUsuarioModificacion($usuarioModificacion);

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $pasantia->setUsuarioModificacion($usuario);

            $em->flush();

            return $this->redirectToRoute('pasantiaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:pasantia-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPasantia' => $idPasantia,
                    'pasantia' => $pasantia,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/eliminar", name="pasantiaEliminar")
     */
    public function pasantiaEliminarAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia = new Pasantia();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->find($idPasantia);              

        $em->remove($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaGestion');

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/documentos-soporte", name="pasantiaSoporte")
     */
    public function pasantiaSoporteAction(Request $request, $idPasantia)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));


        $pasantiaSoporte = new PasantiaSoporte();
        
        $form = $this->createForm(new PasantiaSoporteType(), $pasantiaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
            array('active' => '1', 'pasantia' => $idPasantia),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
            array('active' => '0', 'pasantia' => $idPasantia),
            array('fecha_creacion' => 'ASC')
        );
        
        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $pasantiaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'pasantia_tipo_soporte'
                    )
                );
                
                $actualizarPasantiaSoportes = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'pasantia' => $idPasantia
                    )
                );  
            
                foreach ($actualizarPasantiaSoportes as $actualizarPasantiaSoporte){
                    echo $actualizarPasantiaSoporte->getId()." ".$actualizarPasantiaSoporte->getTipoSoporte()."<br />";
                    $actualizarPasantiaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarPasantiaSoporte->setActive(0);
                    $actualizarPasantiaSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $pasantiaSoporte->setPasantia($pasantia);
                $pasantiaSoporte->setActive(true);
                $pasantiaSoporte->setFechaCreacion(new \DateTime());
                $pasantiaSoporte->setUsuarioCreacion($usuario);

                $em->persist($pasantiaSoporte);
                $em->flush();

                return $this->redirectToRoute('pasantiaSoporte', array( 'idPasantia' => $idPasantia));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:pasantia-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idPasantia' => $idPasantia
            )
        );
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/documentos-soporte/{idPasantiaSoporte}/descargar", name="pasantiaSoporteRecuperarArchivo")
     */
    public function pasantiaSoporteDescargarAction(Request $request, $idPasantia, $idPasantiaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:PasantiaSoporte')->findOneBy(
            array('id' => $idPasantiaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/documentos-soporte/{idPasantiaSoporte}/borrar", name="pasantiaSoporteBorrar")
     */
    public function pasantiaSoporteBorrarAction(Request $request, $idPasantia, $idPasantiaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $PasantiaSoporte = new PasantiaSoporte();
        
        $pasantiaSoporte = $em->getRepository('AppBundle:PasantiaSoporte')->findOneBy(
            array('id' => $idPasantiaSoporte)
        );
        
        $pasantiaSoporte->setFechaModificacion(new \DateTime());
        $pasantiaSoporte->setActive(0);
        $pasantiaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('pasantiaSoporte', array( 'idPasantia' => $idPasantia));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-territorio", name="pasantiaTerritorio")
     */
    public function pasantiaTerritorioAction(Request $request, $idPasantia)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        if($pasantia->getTerritorioAprendizaje() != null){            
            $idTerritorioAprendizaje = $pasantia->getTerritorioAprendizaje()->getId();        

            $territorioAsignado = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
                array('id' => $idTerritorioAprendizaje)
            );
            
        }else{

            $territorioAsignado = null;
        }       

        $form = $this->get('form.factory')->create(new PasantiaTerritorioFilterType());        

        if($pasantia->getTerritorioAprendizaje() == null){            
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
                        SELECT 
                            territorioAprendizaje.id 
                        FROM 
                            AppBundle:TerritorioAprendizaje territorioAprendizaje 
                            JOIN AppBundle:Pasantia pasantia 
                        WHERE 
                            territorioAprendizaje = pasantia.territorio_aprendizaje 
                            AND pasantia.territorio_aprendizaje = :territorio_aprendizaje
                            AND pasantia.id = :idPasantia) ')
        ->setParameter('territorio_aprendizaje', $pasantia)
        ->setParameter('idPasantia', $idPasantia);

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

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:territorio-pasantia-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'territorios' => $query,
                'asignacionesTerritorioPasantia' => $territorioAsignado,
                'idPasantia' => $idPasantia,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-territorio/{idTerritorio}/nueva-asignacion", name="pasantiaAsignarTerritorio")
     */
    public function pasantiaAsignarTerritorioAction($idPasantia, $idTerritorio)
    {

        $em = $this->getDoctrine()->getManager();

         $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorio)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );     

        $pasantia->setTerritorioAprendizaje($territorios);
        $pasantia->setActive(true);
        $pasantia->setFechaModificacion(new \DateTime());
        $pasantia->setUsuarioModificacion($usuario);


        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaTerritorio', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioPasantia' => $pasantia,                 
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantias/{idPasantia}/asignacion-territorio/{idTerritorio}/eliminar", name="pasantiaEliminarTerritorio")
     */
    public function pasantiaEliminarTerritorioAction(Request $request, $idPasantia, $idTerritorio)
    {
        $em = $this->getDoctrine()->getManager();    

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));            

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        $asignacionOrganizacionPasantia = new AsignacionOrganizacionPasantia();

        $asignacionOrganizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );       

        foreach($asignacionOrganizacionPasantia as $asignacionOrganizacionPasantiaActual){
            $em->remove($asignacionOrganizacionPasantiaActual);
        }

        $pasantia->setNullTerritorioAprendizaje();

        $pasantia->setFechaModificacion(new \DateTime());
        $pasantia->setUsuarioModificacion($usuario);
        
        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaTerritorio',
             array(
                'idPasantia' => $idPasantia
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion", name="pasantiaOrganizacion")
     */
    public function pasantiaOrganizacionAction(Request $request, $idPasantia)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
        
        $territorioAprendizaje = $pasantia->getTerritorioAprendizaje()->getId();

        
        $organizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );        

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionPasantia aoc WHERE organizacion = aoc.organizacion AND aoc.pasantia = :pasantia) AND o.active = 1 AND o.pasantia = 1');
            $query->setParameter('pasantia', $pasantia);
            $organizaciones = $query->getResult();

        $mostrarOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('organizacion' => $organizaciones, 'territorio_aprendizaje' => $territorioAprendizaje));


        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Organizacion')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new PasantiaOrganizacionFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionPasantia aoc WHERE organizacion = aoc.organizacion AND aoc.pasantia = :pasantia) AND q.pasantia = 1')
        ->setParameter('pasantia', $pasantia);

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
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:organizacion-pasantia-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'organizaciones' => $query, 
                'asignacionesOrganizacionPasantia' => $organizacionPasantia,
                'idPasantia' => $idPasantia,            
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                  
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="pasantiaAsignarOrganizacion")
     */
    public function pasantiaAsignarOrganizacionAction($idPasantia, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

         $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        $asignacionesOrganizacionPasantia = new AsignacionOrganizacionPasantia();

        $asignacionesOrganizacionPasantia->setOrganizacion($organizaciones);
        $asignacionesOrganizacionPasantia->setPasantia($pasantia);           
        $asignacionesOrganizacionPasantia->setActive(true);
        $asignacionesOrganizacionPasantia->setFechaCreacion(new \DateTime());
        $asignacionesOrganizacionPasantia->setUsuarioCreacion($usuario);

        $em->persist($asignacionesOrganizacionPasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaOrganizacion', 
            array(
                'organizaciones' => $organizaciones, 
                'asignacionesOrganizacionPasantia' => $asignacionesOrganizacionPasantia,
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion/{idAsignacionOrganizacionPasantia}/eliminar", name="pasantiaEliminarOrganizacion")
     */
    public function pasantiaEliminarOrganizacionAction(Request $request, $idPasantia, $idAsignacionOrganizacionPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesOrganizacionPasantia = new AsignacionOrganizacionPasantia();

        $asignacionesOrganizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->find($idAsignacionOrganizacionPasantia); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesOrganizacionPasantia);
        $em->flush();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        $asignacionesOrganizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->findBy(
            array('pasantia' => $pasantia)
        );  

        return $this->redirectToRoute('pasantiaOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesOrganizacionPasantia' => $asignacionesOrganizacionPasantia,
                'idPasantia' => $idPasantia
            ));    
        
    }

    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo", name="pasantiaGrupo")
     */
    public function pasantiaGrupoAction(Request $request, $idPasantia)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $municipioUsuario = $this->get('security.context')->getToken()->getUser()->getMunicipio();
        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        if($pasantia->getGrupo() != null){            
            $idGrupo = $pasantia->getGrupo()->getId();        

            $grupoAsignado = $em->getRepository('AppBundle:Grupo')->findBy(
                array('id' => $idGrupo)
            );
            
        }else{

            $grupoAsignado = null;
        }      



        $form = $this->get('form.factory')->create(new PasantiaGrupoFilterType());        

        $obj = new FilterLocation();

        $filterBuilder = $obj->queryFilter($request, $this, $form, $rolUsuario, $municipioUsuario, 'AppBundle:Grupo');

        if($pasantia->getGrupo() == null){

            $filterBuilder        
            ->andWhere('q.id NOT IN  (
                            SELECT 
                                grupo.id 
                            FROM 
                                AppBundle:Grupo grupo 
                                JOIN AppBundle:Pasantia pasantia 
                            WHERE 
                                grupo = pasantia.grupo 
                                AND pasantia.grupo = :grupo_pasantia
                                AND pasantia.id = :idPasantia                            
                        ) 
                        AND q.codigo IS NOT NULL')
                 //AND g.codigo IS NOT NULL ----> Mostrar solo los de codigo grupo
            ->setParameter('grupo_pasantia', $pasantia)
            ->setParameter('idPasantia', $idPasantia);

            $query = $filterBuilder->getQuery();
        
        }else{

            $query = array(); 

        }

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);
            

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:grupo-pasantia-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'grupos' => $query,
                'asignacionesGrupoPasantia' => $grupoAsignado,
                'idPasantia' => $idPasantia,
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="pasantiaAsignarGrupo")
     */
    public function pasantiaAsignarGrupoAction($idPasantia, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

         $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        //$asignacionesGrupoPasantia = new Pasantia();

        $pasantia->setGrupo($grupos);        
        $pasantia->setActive(true);
        $pasantia->setFechaModificacion(new \DateTime());
        $pasantia->setUsuarioModificacion($usuario);

        $em->persist($pasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoPasantia' => $pasantia,
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/eliminar", name="pasantiaEliminarGrupo")
     */
    public function pasantiaEliminarGrupoAction(Request $request, $idPasantia, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();  

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));              

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );    

        $asignacionGrupoBeneficiarioPasantia = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionGrupoBeneficiarioPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );       

        foreach($asignacionGrupoBeneficiarioPasantia as $asignacionGrupoBeneficiarioPasantiaActual){
            $em->remove($asignacionGrupoBeneficiarioPasantiaActual);
        }

        $pasantia->setNullGrupo();

        $pasantia->setFechaModificacion(new \DateTime());
        $pasantia->setUsuarioModificacion($usuario);

        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaGrupo',
             array(
                'idPasantia' => $idPasantia
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/asignacion-beneficiario", name="pasantiaGrupoBeneficiario")
     */
    public function pasantiaGrupoBeneficiarioAction(Request $request, $idPasantia, $idGrupo)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();    

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($pasantia->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioPasantia abc WHERE beneficiario = abc.beneficiario AND abc.pasantia = :pasantia) AND b.active = 1');
        $query->setParameter(':pasantia', $pasantia);
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
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Pasantia:beneficiario-grupo-pasantia-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosPasantia' => $beneficiariosPasantia,
                'idPasantia' => $idPasantia, 
                'idGrupo' => $idGrupo,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]               
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/nueva-asignacion", name="pasantiaAsignarGrupoBeneficiario")
     */
    public function pasantiaAsignarGrupoBeneficiarioAction($idPasantia, $idGrupo, $idBeneficiario)
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

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        $asignacionesGrupoBeneficiarioPasantia = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionesGrupoBeneficiarioPasantia->setBeneficiario($beneficiario);        
        $asignacionesGrupoBeneficiarioPasantia->setPasantia($pasantia);           
        $asignacionesGrupoBeneficiarioPasantia->setActive(true);
        $asignacionesGrupoBeneficiarioPasantia->setFechaCreacion(new \DateTime());
        $asignacionesGrupoBeneficiarioPasantia->setUsuarioCreacion($usuario);

        $em->persist($asignacionesGrupoBeneficiarioPasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaGrupoBeneficiario', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesGrupoBeneficiarioPasantia' => $asignacionesGrupoBeneficiarioPasantia,
                'idPasantia' => $idPasantia,
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/{idBeneficiarioPasantia}/eliminar", name="pasantiaEliminarGrupoBeneficiario")
     */
    public function pasantiaEliminarGrupoBeneficiarioAction(Request $request, $idPasantia, $idGrupo, $idBeneficiario, $idBeneficiarioPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoBeneficiarioPasantia = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionesGrupoBeneficiarioPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($idBeneficiarioPasantia); 

        $em->remove($asignacionesGrupoBeneficiarioPasantia);
        $em->flush();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($pasantia->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioPasantia abc WHERE beneficiario = abc.beneficiario AND abc.pasantia = :pasantia) AND b.active = 1');
        $query->setParameter(':pasantia', $pasantia);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('pasantiaGrupoBeneficiario',
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosPasantia' => $beneficiariosPasantia,
                'idPasantia' => $idPasantia, 
                'idGrupo' => $idGrupo,     
            ));      
        
    }  

    


}

