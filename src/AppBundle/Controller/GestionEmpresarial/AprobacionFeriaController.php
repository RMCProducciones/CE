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

use AppBundle\Entity\Feria;


use AppBundle\Form\GestionEmpresarial\AprobacionFeriaType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class AprobacionFeriaController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/gestion-aprobacion", name="aprobacionferiaGestion")
     */
   public function aprobacionferiaGestionAction(Request $request, $idFeria)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        $aprobacion=$em->getRepository('AppBundle:Feria')->findBy(
            array('id'=> $idFeria)
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $aprobacion, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionFeria:aprobacion-gestion.html.twig',
         array( 'aprobacion' => $aprobacion,
        'idFeria' => $idFeria,
        'pagination' => $pagination,
        'tipoUsuario' => $valuesFieldBlock[3])
         ); 
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/gestion-aprobacion/{idFeria}/editar", name="aprobacionferiaEditar")
     */
    public function aprobaciondferiaEditarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $aprobacion = new Feria();

          $aprobacion=$em->getRepository('AppBundle:Feria')->findOneBy(
            array('id'=> $idFeria)
        ); 

        $form = $this->createForm(new AprobacionFeriaType(), $aprobacion);
        
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

            return $this->redirectToRoute('aprobacionferiaGestion', array('idFeria' => $idFeria));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionFeria:aprobacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),    
                    'idFeria' => $idFeria,
                    'aprobacion' => $aprobacion,
            )
        );

    }
  


}

