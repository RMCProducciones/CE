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

use AppBundle\Entity\DistribucionPremio;
use AppBundle\Entity\ActividadConcurso;

use AppBundle\Form\GestionEmpresarial\DistribucionPremioType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class DistribucionPremioController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion", name="distribucionGestion")
     */
   public function distribucionGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $distribucion = $em->getRepository('AppBundle:DistribucionPremio')->findBY(
            array('active' => 1)          
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $distribucion, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/DistribucionPremio:distribucion-gestion.html.twig', 
            array( 'distribucion' => $distribucion,
                'pagination' => $pagination
                )
            );
    }

    
     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion/nuevo", name="distribucionNuevo")
     */
    public function distribucionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $distribucion = new DistribucionPremio();
        
        $form = $this->createForm(new DistribucionPremioType(), $distribucion);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $distribucion = $form->getData();

            $distribucion->setActive(true);
            $distribucion->setFechaCreacion(new \DateTime());


            
            $em->persist($distribucion);
            $em->flush();

            return $this->redirectToRoute('distribucionGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/DistribucionPremio:distribucion-nuevo.html.twig', array('form' => $form->createView()));
    } 

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion/{idDistribucionPremio}/editar", name="distribucionEditar")
     */
    public function distribucionEditarAction(Request $request, $idDistribucionPremio)
    {
        $em = $this->getDoctrine()->getManager();
        $distribucion = new DistribucionPremio();

        $distribucion = $em->getRepository('AppBundle:DistribucionPremio')->findOneBy(
            array('id' => $idDistribucionPremio)
        );

        $form = $this->createForm(new DistribucionPremioType(), $distribucion);
        
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

            $distribucion = $form->getData();

            $distribucion->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('distribucionGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/DistribucionPremio:distribucion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idDistribucionPremio' => $idDistribucionPremio,
                    'distribucion' => $distribucion,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion/{idDistribucionPremio}/eliminar", name="distribucionEliminar")
     */
    public function distribucionEliminarAction(Request $request, $idDistribucionPremio)
    {
        $em = $this->getDoctrine()->getManager();
        $distribucion = new DistribucionPremio();

        $distribucion = $em->getRepository('AppBundle:DistribucionPremio')->find($idDistribucionPremio);              

        $em->remove($distribucion);
        $em->flush();

        return $this->redirect($this->generateUrl('distribucionGestion'));

    }





    


}

