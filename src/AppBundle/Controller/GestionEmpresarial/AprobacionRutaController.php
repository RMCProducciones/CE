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


use AppBundle\Form\GestionEmpresarial\AprobacionRutaType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class AprobacionRutaController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/gestion-aprobacion", name="aprobacionrutaGestion")
     */
   public function aprobacionrutaGestionAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        
        $aprobacion=$em->getRepository('AppBundle:Ruta')->findBy(
            array('id'=> $idRuta)
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $aprobacion, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionRuta:aprobacion-gestion.html.twig',
         array( 'aprobacion' => $aprobacion,
        'idRuta' => $idRuta,
        'pagination' => $pagination)
         );
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/gestion-aprobacion/{idRuta}/editar", name="aprobacionrutaEditar")
     */
    public function aprobacionrutaEditarAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        $aprobacion = new Ruta();

          $aprobacion=$em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id'=> $idRuta)
        ); 

        $form = $this->createForm(new AprobacionRutaType(), $aprobacion);
        
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

            $aprobacion = $form->getData();
             //$aprobacion->setCoordinador($this->getUser());//$this->container->get('security.context')->getToken()->getUser();


            $em->persist($aprobacion);
            $em->flush();

            return $this->redirectToRoute('aprobacionrutaGestion', array('idRuta' => $idRuta));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionRuta:aprobacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),    
                    'idRuta' => $idRuta,
                    'aprobacion' => $aprobacion,
            )
        );

    }
  


}

