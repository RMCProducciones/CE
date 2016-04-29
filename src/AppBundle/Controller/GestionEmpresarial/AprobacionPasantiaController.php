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


use AppBundle\Form\GestionEmpresarial\AprobacionPasantiaType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class AprobacionPasantiaController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/gestion-aprobacion", name="aprobacionpasantiaGestion")
     */
   public function aprobacionpasantiaGestionAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        
        $aprobacion=$em->getRepository('AppBundle:Pasantia')->findBy(
            array('id'=> $idPasantia)
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $aprobacion, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionPasantia:aprobacion-gestion.html.twig',
         array( 'aprobacion' => $aprobacion,
        'idPasantia' => $idPasantia,
        'pagination' => $pagination)
         );
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/gestion-aprobacion/{idPasantia}/editar", name="aprobacionpasantiaEditar")
     */
    public function aprobacionpasantiaEditarAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        $aprobacion = new Pasantia();

          $aprobacion=$em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id'=> $idPasantia)
        ); 

        $form = $this->createForm(new AprobacionPasantiaType(), $aprobacion);
        
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

            return $this->redirectToRoute('aprobacionpasantiaGestion', array('idPasantia' => $idPasantia));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionPasantia:aprobacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),    
                    'idPasantia' => $idPasantia,
                    'aprobacion' => $aprobacion,
            )
        );

    }
  


}

