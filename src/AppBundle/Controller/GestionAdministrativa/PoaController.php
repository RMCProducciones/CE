<?php

namespace AppBundle\Controller\GestionAdministrativa;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use AppBundle\Entity\POA;
use AppBundle\Entity\POASoporte;
use AppBundle\Form\GestionAdministrativa\POAType;
use AppBundle\Form\GestionAdministrativa\POASoporteType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class PoaController extends Controller
{
    
	/**
     * @Route("/gestion-administrativa/poa/POAGestion", name="POAGestion")
     */
    public function POAGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $poas = $em->getRepository('AppBundle:POA')->findAll(); 

        $paginator  = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
            $poas, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionAdministrativa/Poa:POA-gestion.html.twig', 
            array( 'poas' => $poas,
                   'pagination' => $pagination
                   )
            );
    }

	/**
     * @Route("/gestion-administrativa/poa/nuevo", name="POANuevo")
     */
    public function POANuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $poa = new POA();
        
        $form = $this->createForm(new POAType(), $poa);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $poa = $form->getData();

            $poa->setActive(true);
            //$poa->setUsuarioCreacion( $this->get('security.token_storage')->getToken()->getUser() );
            //$poa->setUsuarioCreacion($em->getRepository('AppBundle:Usuario')->findOneBy(array('id'=>'1')))
            $poa->setFechaCreacion(new \DateTime());

            
            $em->persist($poa);
            $em->flush();

            return $this->redirectToRoute('POAGestion');
        }
		 return $this->render('AppBundle:GestionAdministrativa/Poa:POA-nuevo.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/editar", name="POAEditar")
     */
    public function POAEditarAction(Request $request, $idPOA)
    {
        $em = $this->getDoctrine()->getManager();
        $poa = new POA();

        $poa = $em->getRepository('AppBundle:POA')->findOneBy(
            array('id' => $idPOA)
        );

        $form = $this->createForm(new POAType(), $poa);
        
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

            $poa = $form->getData();

            

            $poa->setFechaModificacion(new \DateTime());

  

            $em->flush();

            return $this->redirectToRoute('POAGestion');
        }

        return $this->render(
            'AppBundle:GestionAdministrativa/Poa:POA-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPOA' => $idPOA,
                    'poa' => $poa,
            )
        );

    }



    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/eliminar", name="POAEliminar")
     */
    public function POAEliminarAction(Request $request, $idPOA)
    {
        $em = $this->getDoctrine()->getManager();
        $poa = new POA();

        $poa = $em->getRepository('AppBundle:POA')->find($idPOA);              

        $em->remove($poa);
        $em->flush();

        return $this->redirect($this->generateUrl('POAGestion'));

    }

    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/documento-soporte", name="POASoporte")
     */
    public function POASoporteAction(Request $request, $idPOA)
    {
        $em = $this->getDoctrine()->getManager();

        $poaSoporte = new POASoporte();
        
        $form = $this->createForm(new POASoporteType(), $poaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:POASoporte')->findBy(
            array('active' => '1', 'poa' => $idPOA),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:POASoporte')->findBy(
            array('active' => '0', 'poa' => $idPOA),
            array('fecha_creacion' => 'ASC')
        );
        
        $poa = $em->getRepository('AppBundle:POA')->findOneBy(
            array('id' => $idPOA)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $poaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarPOASoportes = $em->getRepository('AppBundle:POASoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'poa' => $idPOA
                    )
                );  
            
                foreach ($actualizarPOASoportes as $actualizarPOASoporte){
                    echo $actualizarPOASoporte->getId()." ".$actualizarPOASoporte->getTipoSoporte()."<br />";
                    $actualizarPOASoporte->setFechaModificacion(new \DateTime());
                    $actualizarPOASoporte->setActive(0);
                    $em->flush();
                }
                
                $poaSoporte->setPOA($poa);
                $poaSoporte->setActive(true);
                $poaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($poaSoporte);
                $em->flush();

                return $this->redirectToRoute('POASoporte', array( 'idPOA' => $idPOA));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionAdministrativa/Poa:POA-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/documentos-soporte/{idPOASoporte}/borrar", name="POASoporteBorrar")
     */
    public function POASoporteBorrarAction(Request $request, $idPOA, $idPOASoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $poaSoporte = new POASoporte();
        
        $poaSoporte = $em->getRepository('AppBundle:POASoporte')->findOneBy(
            array('id' => $idPOASoporte)
        );
        
        $poaSoporte->setFechaModificacion(new \DateTime());
        $poaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('POASoporte', array( 'idPOA' => $idPOA));
        
    }
		
}
