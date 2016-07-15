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
use AppBundle\Entity\DocumentoSoporte;

use AppBundle\Form\GestionListasValor\ListasValorType;
use AppBundle\Form\GestionListasValor\ListasDocumentoSoporteType;

use AppBundle\Form\GestionListasValor\ListasValorFilterType;
use AppBundle\Form\GestionListasValor\ListasDocumentoSoporteFilterType;


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

        /*$listas = $em->getRepository('AppBundle:Listas')->findBy(
            array('active' => '1')            
        );*/

        // initialize a query builder
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Listas')
            ->createQueryBuilder('l');

        $form = $this->get('form.factory')->create(new ListasValorFilterType());

        if ($request->query->has($form->getName())) {
            
            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));

            /*if ($request->getMethod() == 'GET') {
                echo $_GET["ListasValorFilter"]["dominio"];
                sdfasdfasd;
            }*/
            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);

            // now look at the DQL =)
            //var_dump($filterBuilder->getDql());
            //die("");
        }

        $query = $filterBuilder->getQuery();

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );
 
        
        return $this->render('AppBundle:GestionListasValor:listas-valor-gestion.html.twig', 
            array( 
                    'form' => $form->createView(),
                    'listas' => $query,
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


    /**
     * @Route("/lista-documento-soporte/gestion", name="listasDocumentoSoporteGestion")
     */
    public function listasDocumentoSoporteGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();        

        /*$documentoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findBy(
            array('active' => '1')            
        );*/

        // initialize a query builder
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:DocumentoSoporte')
            ->createQueryBuilder('l');

        $form = $this->get('form.factory')->create(new ListasDocumentoSoporteFilterType());

        if ($request->query->has($form->getName())) {
            
            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));

            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);

            // now look at the DQL =)
            //var_dump($filterBuilder->getDql());
            //die("");
        }
        $query = $filterBuilder->getQuery();

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );
 
        
        return $this->render('AppBundle:GestionListasValor:listas-documento-soporte-gestion.html.twig', 
            array( 
                    'form' => $form->createView(), 
                    'listas' => $query,
                    'pagination' => $pagination
            )
        );
    }

    /**
     * @Route("/lista-documento-soporte/nuevo", name="listasDocumentoSoporteNuevo")
     */
    public function listasDocumentoSoporteNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $documentoSoporte = new DocumentoSoporte();
        
        $form = $this->createForm(new ListasDocumentoSoporteType(), $documentoSoporte);
        
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
            
            $documentoSoporte = $form->getData();            
            
            $documentoSoporte->setAbreviatura("");
            $documentoSoporte->setObligatorio(true);
            $documentoSoporte->setOrden(true);     
            $documentoSoporte->setActive(true);
            $documentoSoporte->setFechaCreacion(new \DateTime());           
            $em->persist($documentoSoporte);
            $em->flush();

            return $this->redirectToRoute('listasDocumentoSoporteGestion');
        }
        
        return $this->render('AppBundle:GestionListasValor:listas-documento-soporte-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/lista-documento-soporte/{idListas}/editar", name="listasDocumentoSoporteEditar")
     */
    public function listasDocumentoSoporteEditarAction(Request $request, $idListas)
    {
        $em = $this->getDoctrine()->getManager();

        $documentoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
            array('id' => $idListas)            
        );
        
        $form = $this->createForm(new ListasDocumentoSoporteType(), $documentoSoporte);
        
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
            
            $documentoSoporte = $form->getData();            
                 
            $documentoSoporte->setAbreviatura("");
            $documentoSoporte->setObligatorio(true);
            $documentoSoporte->setOrden(true);     
            $documentoSoporte->setActive(true);
            $documentoSoporte->setFechaCreacion(new \DateTime());
            $em->persist($documentoSoporte);
            $em->flush();

            return $this->redirectToRoute('listasDocumentoSoporteGestion');
        }
        
        return $this->render('AppBundle:GestionListasValor:listas-documento-soporte-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/lista-documento-soporte/{idListas}/eliminar", name="listasDocumentoSoporteEliminar")
     */
    public function listasDocumentoSoporteEliminarAction(Request $request, $idListas)
    {
        $em = $this->getDoctrine()->getManager();
        $documentoSoporte = new DocumentoSoporte();

        $documentoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->find($idListas);              

        $em->remove($documentoSoporte);
        $em->flush();

        return $this->redirect($this->generateUrl('listasDocumentoSoporteGestion'));

    }

}

