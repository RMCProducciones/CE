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
use AppBundle\Form\GestionAdministrativa\POAFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


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


        /*$poas = $em->getRepository('AppBundle:POA')->findAll(); */

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:POA')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new POAFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");    

        $paginator  = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionAdministrativa/Poa:POA-gestion.html.twig', 
            array('form' => $form->createView(),  
                  'poas' => $query,
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
              $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $poa->setUsuarioCreacion($usuario);

            
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

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $convocatoria->setUsuarioModificacion($usuario);

            $em->persist($convocatoria);                                            
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
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

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
                        'dominio' => 'poa_tipo_soporte'
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
                    $actualizarPOASoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $poaSoporte->setPOA($poa);
                $poaSoporte->setActive(true);
                $poaSoporte->setFechaCreacion(new \DateTime());
                $poaSoporte->setUsuarioCreacion($usuario);

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
                'histotialSoportes' => $histotialSoportes,
                'idPOA' => $idPOA
            )
        );
        
    }

    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/documentos-soporte/{idPOASoporte}/descargar", name="POASoporteRecuperarArchivo")
     */
    public function POASoporteDescargarAction(Request $request, $idPOA, $idPOASoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:POASoporte')->findOneBy(
            array('id' => $idPOASoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-administrativa/poa/{idPOA}/documentos-soporte/{idPOASoporte}/borrar", name="POASoporteBorrar")
     */
    public function POASoporteBorrarAction(Request $request, $idPOA, $idPOASoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $poaSoporte = new POASoporte();
        
        $poaSoporte = $em->getRepository('AppBundle:POASoporte')->findOneBy(
            array('id' => $idPOASoporte)
        );
        
        $poaSoporte->setFechaModificacion(new \DateTime());
        $poaSoporte->setActive(0);
        $poaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('POASoporte', array( 'idPOA' => $idPOA));
        
    }
		
}
