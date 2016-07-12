<?php

namespace AppBundle\Controller\GestionConocimiento;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Capacitacion;
use AppBundle\Entity\CapacitacionSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\CapacitacionType;
use AppBundle\Form\GestionConocimiento\CapacitacionSoporteType;
use AppBundle\Form\GestionConocimiento\CapacitacionFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class CapacitacionController extends Controller
{
    	
	/**
     * @Route("/gestion-conocimiento/capacitacion/gestion", name="capacitacionGestion")
     */
    public function capacitacionGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$capacitaciones= $em->getRepository('AppBundle:Capacitacion')->findBY(
            array('active' => 1)            
        ); */

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Capacitacion')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new CapacitacionFilterType());

    
        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);           
        }

        $filterBuilder->andWhere('q.active = 1');
        
        if (isset($_GET['selMunicipio']) && $_GET['selMunicipio'] != "?") {
             $filterBuilder->andWhere('m.id = :idMunicipio')
            ->setParameter('idMunicipio', $_GET['selMunicipio']);
        }
        else{
            if (isset($_GET['selDepartamento']) && $_GET['selDepartamento'] != "?") {
                $filterBuilder->andWhere('d.id = :idDepartamento')
                ->setParameter('idDepartamento', $_GET['selDepartamento']);
            }
            if (isset($_GET['selZona']) && $_GET['selZona'] != "?") {
                $filterBuilder->andWhere('z.id = :idZona')
                ->setParameter('idZona', $_GET['selZona']);
            }      
        }

        //var_dump($filterBuilder->getDql());
        //die("");

        $query = $filterBuilder->getQuery();
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionConocimiento/Capacitacion:capacitacion-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'capacitaciones' => $query,
                    'pagination' => $pagination
                )
            );
    }  
	
	 /**
     * @Route("/gestion-conocimiento/capacitacion/nuevo", name="capacitacionNuevo")
     */
    public function capacitacionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();
        
        $form = $this->createForm(new CapacitacionType(), $capacitacion);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacion = $form->getData();

            $capacitacion->setActive(true);
            $capacitacion->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacion->setUsuarioCreacion($usuario);


            
            $em->persist($capacitacion);
            $em->flush();

            return $this->redirectToRoute('capacitacionGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento/Capacitacion:capacitacion-nuevo.html.twig', array('form' => $form->createView()));
    } 


  /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/editar", name="capacitacionEditar")
     */
    public function capacitacionEditarAction(Request $request, $idCapacitacion)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();

        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->findOneBy(
            array('id' => $idCapacitacion)
        );

        $form = $this->createForm(new CapacitacionType(), $capacitacion);
        
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

            $capacitacion = $form->getData();

            

            $capacitacion->setFechaModificacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacion->setUsuarioModificacion($usuario);

  

            $em->flush();

            return $this->redirectToRoute('capacitacionGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Capacitacion:capacitacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCapacitacion' => $idCapacitacion,
                    'capacitacion' => $capacitacion,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/eliminar", name="capacitacionEliminar")
     */
    public function capacitacionEliminarAction(Request $request, $idCapacitacion)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();

        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->find($idCapacitacion);              

        $em->remove($capacitacion);
        $em->flush();

        return $this->redirect($this->generateUrl('capacitacionGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/documentos-soporte", name="capacitacionSoporte")
     */
    public function capacitacionSoporteAction(Request $request, $idCapacitacion)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $capacitacionSoporte = new CapacitacionSoporte();
        
        $form = $this->createForm(new CapacitacionSoporteType(), $capacitacionSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
            array('active' => '1', 'capacitacion' => $idCapacitacion),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
            array('active' => '0', 'capacitacion' => $idCapacitacion),
            array('fecha_creacion' => 'ASC')
        );
        
        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->findOneBy(
            array('id' => $idCapacitacion)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $capacitacionSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'capacitacion_tipo_soporte'
                    )
                );
                
                $actualizarCapacitacionSoportes = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'capacitacion' => $idCapacitacion
                    )
                );  
            
                foreach ($actualizarCapacitacionSoportes as $actualizarCapacitacionSoporte){
                    echo $actualizarCapacitacionSoporte->getId()." ".$actualizarCapacitacionSoporte->getTipoSoporte()."<br />";
                    $actualizarCapacitacionSoporte->setFechaModificacion(new \DateTime());
                    $actualizarCapacitacionSoporte->setActive(0);
                    $actualizarCapacitacionSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $capacitacionSoporte->setCapacitacion($capacitacion);
                $capacitacionSoporte->setActive(true);
                $capacitacionSoporte->setFechaCreacion(new \DateTime());
                $capacitacionSoporte->setUsuarioCreacion($usuario);

                $em->persist($capacitacionSoporte);
                $em->flush();

                return $this->redirectToRoute('capacitacionSoporte', array( 'idCapacitacion' => $idCapacitacion));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Capacitacion:capacitacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idCapacitacion' => $idCapacitacion
            )
        );
        
    }

    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/documentos-soporte/{idCapacitacionSoporte}/descargar", name="capacitacionSoporteRecuperarArchivo")
     */
    public function capacitacionSoporteDescargarAction(Request $request, $idCapacitacion, $idCapacitacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:CapacitacionSoporte')->findOneBy(
            array('id' => $idCapacitacionSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/documentos-soporte/{idCapacitacionSoporte}/borrar", name="capacitacionSoporteBorrar")
     */
    public function capacitacionSoporteBorrarAction(Request $request, $idCapacitacion, $idCapacitacionSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $capacitacionSoporte = new CapacitacionSoporte();        

        $capacitacionSoporte = $em->getRepository('AppBundle:CapacitacionSoporte')->findOneBy(
            array('id' => $idCapacitacionSoporte)
        );
                
        $capacitacionSoporte->setFechaModificacion(new \DateTime());
        $capacitacionSoporte->setActive(0);
        $capacitacionSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('capacitacionSoporte', array( 'idCapacitacion' => $idCapacitacion));
        
    }   
		
}
