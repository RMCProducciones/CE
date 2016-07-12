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

use AppBundle\Entity\Evento;
use AppBundle\Entity\EventoSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\EventoType;
use AppBundle\Form\GestionConocimiento\EventoSoporteType;
use AppBundle\Form\GestionConocimiento\EventoFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class EventoController extends Controller
{	
	/**
     * @Route("/gestion-conocimiento/evento/gestion", name="eventoGestion")
     */
    public function eventoGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$eventos= $em->getRepository('AppBundle:Evento')->findBY(
            array('active' => 1)            
        ); */

    $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Evento')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new EventoFilterType());

    
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

        return $this->render('AppBundle:GestionConocimiento/Evento:evento-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'eventos' => $query,
                    'pagination' => $pagination
                )
            );
    }  
	
	 /**
     * @Route("/gestion-conocimiento/evento/nuevo", name="eventoNuevo")
     */
    public function eventoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();
        
        $form = $this->createForm(new EventoType(), $evento);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $evento = $form->getData();

            $evento->setActive(true);
            $evento->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $evento->setUsuarioCreacion($usuario);


            
            $em->persist($evento);
            $em->flush();

            return $this->redirectToRoute('eventoGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento/Evento:evento-nuevo.html.twig', array('form' => $form->createView()));
    } 

    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/editar", name="eventoEditar")
     */
    public function eventoEditarAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();

        $evento = $em->getRepository('AppBundle:Evento')->findOneBy(
            array('id' => $idEvento)
        );

        $form = $this->createForm(new EventoType(), $evento);
        
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

            $evento = $form->getData();

            

            $evento->setFechaModificacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $evento->setUsuarioModificacion($usuario);


  

            $em->flush();

            return $this->redirectToRoute('eventoGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Evento:evento-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idEvento' => $idEvento,
                    'evento' => $evento,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/eliminar", name="eventoEliminar")
     */
    public function eventoEliminarAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();

        $evento = $em->getRepository('AppBundle:Evento')->find($idEvento);              

        $em->remove($evento);
        $em->flush();

        return $this->redirect($this->generateUrl('eventoGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/documentos-soporte", name="eventoSoporte")
     */
    public function eventoSoporteAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();

        $eventoSoporte = new EventoSoporte();
        
        $form = $this->createForm(new EventoSoporteType(), $eventoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:EventoSoporte')->findBy(
            array('active' => '1', 'evento' => $idEvento),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:EventoSoporte')->findBy(
            array('active' => '0', 'evento' => $idEvento),
            array('fecha_creacion' => 'ASC')
        );
        
        $evento = $em->getRepository('AppBundle:Evento')->findOneBy(
            array('id' => $idEvento)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $eventoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'evento_tipo_soporte'
                    )
                );
                
                $actualizarEventoSoportes = $em->getRepository('AppBundle:EventoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'evento' => $idEvento
                    )
                );  
            
                foreach ($actualizarEventoSoportes as $actualizarEventoSoporte){
                    echo $actualizarEventoSoporte->getId()." ".$actualizarEventoSoporte->getTipoSoporte()."<br />";
                    $actualizarEventoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarEventoSoporte->setActive(0);
                    $em->flush();
                }
                
                $eventoSoporte->setEvento($evento);
                $eventoSoporte->setActive(true);
                $eventoSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($eventoSoporte);
                $em->flush();

                return $this->redirectToRoute('eventoSoporte', array( 'idEvento' => $idEvento));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Evento:evento-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }

    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/documentos-soporte/{idEventoSoporte}/descargar", name="eventoSoporteRecuperarArchivo")
     */
    public function eventoSoporteDescargarAction(Request $request, $idEvento, $idEventoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:EventoSoporte')->findOneBy(
            array('id' => $idEventoSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/documentos-soporte/{idEventoSoporte}/borrar", name="eventoSoporteBorrar")
     */
    public function eventoSoporteBorrarAction(Request $request, $idEvento, $idEventoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $eventoSoporte = new EventoSoporte();
        
        $eventoSoporte = $em->getRepository('AppBundle:EventoSoporte')->findOneBy(
            array('id' => $idEventoSoporte)
        );
        
        $eventoSoporte->setFechaModificacion(new \DateTime());
        $eventoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('eventoSoporte', array( 'idEvento' => $idEvento));
        
    }
	
}
