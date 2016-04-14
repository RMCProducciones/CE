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

use AppBundle\Entity\Concurso;


use AppBundle\Form\GestionEmpresarial\AprobacionConcursoType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class AprobacionConcursoController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/gestion-aprobacion", name="aprobacionGestion")
     */
   public function aprobacionGestionAction(Request $request, $idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        
        $aprobacion=$em->getRepository('AppBundle:Concurso')->findBy(
            array('id'=> $idConcurso)
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $aprobacion, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionConcurso:aprobacion-gestion.html.twig',
         array( 'aprobacion' => $aprobacion,
        'idConcurso' => $idConcurso,
        'pagination' => $pagination)
         );
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-aprobacion/{idConcurso}/editar", name="aprobacionEditar")
     */
    public function aprobacionEditarAction(Request $request, $idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        $aprobacion = new Concurso();

          $aprobacion=$em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id'=> $idConcurso)
        ); 

        $form = $this->createForm(new AprobacionConcursoType(), $aprobacion);
        
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

            $em->persist($aprobacion);
            $em->flush();

            return $this->redirectToRoute('aprobacionGestion', array('idConcurso' => $idConcurso));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/AprobacionConcurso:aprobacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),    
                    'idConcurso' => $idConcurso,
                    'aprobacion' => $aprobacion,
            )
        );

    }
  


}

