<?php

namespace AppBundle\Controller\GestionFinanciera;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use AppBundle\Entity\CapacitacionFinanciera;
use AppBundle\Entity\CapacitacionFinancieraSoporte;
use AppBundle\Entity\DocumentoSoporte;


use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraSoporteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class CapacitacionFinancieraController extends Controller
{
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/gestion", name="capacitacionFinancieraGestion")
     */
    public function capacitacionFinancieraGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinancieras= $em->getRepository('AppBundle:CapacitacionFinanciera')->findBY(
            array('active' => 1)            
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $capacitacionFinancieras, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-gestion.html.twig', 
            array( 'capacitacionFinancieras' => $capacitacionFinancieras,
                    'pagination' => $pagination
                )
            );
    }  
    
     /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/nuevo", name="capacitacionFinancieraNuevo")
     */
    public function capacitacionFinancieraNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();
        
        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setActive(true);
            $capacitacionFinanciera->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacionFinanciera->setUsuarioCreacion($usuario);


            
            $em->persist($capacitacionFinanciera);
            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-nuevo.html.twig', array('form' => $form->createView()));
    } 


 /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/editar", name="capacitacionFinancieraEditar")
     */
    public function capacitacionFinancieraEditarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );

        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);
        
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

            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setFechaModificacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacionFinanciera->setUsuarioModificacion($usuario);


            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCapacitacionFinanciera' => $idCapacitacionFinanciera,
                    'capacitacionFinanciera' => $capacitacionFinanciera,
            )
        );

    }
/**
     * @Route("/gestion-financiera/cprograma-capacitacion-financiera/apacitacion/{idCapacitacionFinanciera}/eliminar", name="capacitacionFinancieraEliminar")
     */
    public function capacitacionFinancieraEliminarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->find($idCapacitacionFinanciera);              

        $em->remove($capacitacionFinanciera);
        $em->flush();

        return $this->redirect($this->generateUrl('capacitacionFinancieraGestion'));

    }



/**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte", name="capacitacionFinancieraSoporte")
     */
    public function capacitacionFinancieraSoporteAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $form = $this->createForm(new CapacitacionFinancieraSoporteType(), $capacitacionFinancieraSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '1', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '0', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );
        
        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $capacitacionFinancieraSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarCapacitacionFinancieraSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'capacitacionFinanciera' => $idCapacitacionFinanciera
                    )
                );  
            
                foreach ($actualizarCapacitacionFinancieraSoportes as $actualizarCapacitacionFinancieraSoporte){
                    echo $actualizarCapacitacionFinancieraSoporte->getId()." ".$actualizarCapacitacionFinancieraSoporte->getTipoSoporte()."<br />";
                    $actualizarCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
                    $actualizarCapacitacionFinancieraSoporte->setActive(0);
                    $em->flush();
                }
                
                $capacitacionFinancieraSoporte->setCapacitacionFinanciera($capacitacionFinanciera);
                $capacitacionFinancieraSoporte->setActive(true);
                $capacitacionFinancieraSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($capacitacionFinancieraSoporte);
                $em->flush();

                return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte/{idCapacitacionFinancieraSoporte}/borrar", name="capacitacionFinancieraSoporteBorrar")
     */
    public function capacitacionFinancieraSoporteBorrarAction(Request $request, $idCapacitacionFinanciera, $idCapacitacionFinancieraSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $capacitacionFinancieraSoporte = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idCapacitacionFinancieraSoporte)
        );
        
        $capacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
        $capacitacionFinancieraSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
        
    }

   }

