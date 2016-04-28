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



use AppBundle\Form\GestionEmpresarial\TerritorioAprendizajeType;
use AppBundle\Form\GestionEmpresarial\RutaSoporteType;
use AppBundle\Form\GestionEmpresarial\RutaFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class TerritorioController extends Controller
{
	    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/gestion", name="territorioaprendizajeGestion")
     */
    public function territorioaprendizajeGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
            array('active' => '1')
            
        );

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $territorios, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Territorio:territorio-gestion.html.twig', 
        	array( 'territorios' => $territorios,
        		   'pagination' => $pagination));
    }




    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/nuevo", name="territorioaprendizajeNuevo")
     */
    public function territorioaprendizajeNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();
        
        $form = $this->createForm(new TerritorioAprendizajeType(), $territorio);
        
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
            
            $territorio = $form->getData();

            $territorio->setActive(true);
            $territorio->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($territorio);
            $em->flush();

            return $this->redirectToRoute('territorioaprendizajeGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Territorio:territorio-nuevo.html.twig', array('form' => $form->createView()));
    }




    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/editar", name="territorioaprendizajeEditar")
     */
    public function territorioaprendizajeEditarAction(Request $request, $idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();

        $territorio = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );

        $form = $this->createForm(new TerritorioAprendizajeType(), $territorio);
        
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

            $territorio = $form->getData();

            $territorio->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $territorio->setUsuarioModificacion($usuarioModificacion);

            $em->flush();

            return $this->redirectToRoute('territorioaprendizajeGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Territorio:territorio-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTerritorioAprendizaje' => $idTerritorioAprendizaje,
                    'territorio' => $territorio,
            )
        );

    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/eliminar", name="territorioaprendizajeEliminar")
     */
    public function territorioaprendizajeEliminarAction(Request $request, $idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();

        $territorio = $em->getRepository('AppBundle:TerritorioAprendizaje')->find($idTerritorioAprendizaje);              

        $em->remove($territorio);
        $em->flush();

        return $this->redirect($this->generateUrl('territorioaprendizajeGestion'));

    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion", name="territorioAprendizajeOrganizacion")
     */
    public function territorioAprendizajeOrganizacionAction(Request $request, $idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );     

        $asignacionesTerritoriosOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('territorio_aprendizaje' => $territorioAprendizaje)
        ); 

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionTerritorioAprendizaje atc WHERE organizacion = atc.organizacion AND atc.territorio_aprendizaje = :territorio_aprendizaje) AND o.active = 1');
        $query->setParameter('territorio_aprendizaje', $territorioAprendizaje);
        $organizaciones = $query->getResult();      

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $organizaciones, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Territorio:organizacion-territorio-gestion-asignacion.html.twig', 
            array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritoriosOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje,
                'pagination1' => $pagination1
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="territorioAprendizajeAsignarOrganizacion")
     */
    public function territorioAprendizajeAsignarOrganizacionAction($idTerritorioAprendizaje, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );  
           
        $asignacionesTerritorioOrganizacion = new AsignacionOrganizacionTerritorioAprendizaje();

        $asignacionesTerritorioOrganizacion->setOrganizacion($organizaciones);
        $asignacionesTerritorioOrganizacion->setTerritorioAprendizaje($territorioAprendizaje);        
        $asignacionesTerritorioOrganizacion->setActive(true);
        $asignacionesTerritorioOrganizacion->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesTerritorioOrganizacion);
        $em->flush();



        return $this->redirectToRoute('territorioAprendizajeOrganizacion', 
            array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritorioOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion/{idTerritorioOrganizacion}/eliminar", name="territorioAprendizajeEliminarOrganizacion")
     */
    public function territorioAprendizajeEliminarOrganizacionAction(Request $request, $idTerritorioAprendizaje, $idTerritorioOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesTerritorioOrganizacion = new AsignacionOrganizacionTerritorioAprendizaje();

        $asignacionesTerritorioOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->find(
            $idTerritorioOrganizacion); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesTerritorioOrganizacion);
        $em->flush();

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );     

        $asignacionesTerritoriosOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('territorio_aprendizaje' => $territorioAprendizaje)
        ); 

        return $this->redirectToRoute('territorioAprendizajeOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritorioOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje
            ));    
        
    }   
}