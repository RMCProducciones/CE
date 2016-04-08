<?php

namespace AppBundle\Controller\GestionListasValor;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Listas;

use AppBundle\Form\GestionListasValor\ListasValorType;
//use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ListasValorController extends Controller
{
/**
     * @Route("/lista-valor/gestion", name="listasValorGestion")
     */
    public function listasValorGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        

        $listas = $em->getRepository('AppBundle:Listas')->findBy(
            array('active' => '1')            
        );

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $listas, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );
 
        
        return $this->render('AppBundle:GestionListasValor:listas-valor-gestion.html.twig', 
            array( 'listas' => $listas,
                   'pagination' => $pagination
            )
        );
    }

    /**
     * @Route("/lista-valor/nuevo", name="listasValorNuevo")
     */
    public function listasValorNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $listas = new Listas();
        
        $form = $this->createForm(new ListasValorType(), $listas);
        
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
            
            $listas = $form->getData();            
                 
            $listas->setActive(true);
            $listas->setFechaCreacion(new \DateTime());           
            $em->persist($listas);
            $em->flush();

            return $this->redirectToRoute('listasValorGestion');
        }
        
        return $this->render('AppBundle:GestionListasValor:listas-valor-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/lista-valor/{idListas}/editar", name="listasValorEditar")
     */
    public function listasValorEditarAction(Request $request, $idListas)
    {
        $em = $this->getDoctrine()->getManager();

        $listas = $em->getRepository('AppBundle:Listas')->findOneBy(
            array('id' => $idListas)            
        );
        
        $form = $this->createForm(new ListasValorType(), $listas);
        
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
            
            $listas = $form->getData();            
                 
            $listas->setActive(true);
            $listas->setFechaCreacion(new \DateTime());           
            $em->persist($listas);
            $em->flush();

            return $this->redirectToRoute('listasValorGestion');
        }
        
        return $this->render('AppBundle:GestionListasValor:listas-valor-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/lista-valor/{idListas}/eliminar", name="listasValorEliminar")
     */
    public function listasValorEliminarAction(Request $request, $idListas)
    {
        $em = $this->getDoctrine()->getManager();
        $listas = new Listas();

        $listas = $em->getRepository('AppBundle:Listas')->find($idListas);              

        $em->remove($listas);
        $em->flush();

        return $this->redirect($this->generateUrl('listasValorGestion'));

    }

    /**
     * @Route("/lista-valor/{dato}/filtro", name="listasValorFiltro")
     */
    public function listasValorFiltroAction(Request $request, $dato)
    {
        $em = $this->getDoctrine()->getManager();

        echo $dato;        

        $idListas = $em->getRepository('AppBundle:Listas')->findOneBy(
            array('id' => $dato));

        $idListas->getDominio();

        $listas = $em->getRepository('AppBundle:Listas')->findBy(
            array('dominio' => $idListas->getDominio()));

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $listas, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );
         
        return $this->render('AppBundle:GestionListasValor:listas-valor-gestion.html.twig', 
            array( 'listas' => $listas,
                   'pagination' => $pagination
            )
        );       

    }

}

