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

use AppBundle\Entity\Poliza;
use AppBundle\Entity\PolizaSoporte;
use AppBundle\Entity\DocumentoSoporte;


use AppBundle\Form\GestionFinanciera\PolizaType;
use AppBundle\Form\GestionFinanciera\PolizaSoporteType;
use AppBundle\Form\GestionFinanciera\PolizaFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class PolizaController extends Controller
{
     /**
     * @Route("/gestion-financiera/poliza/gestion", name="polizaGestion")
     */
    public function polizaGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$polizas= $em->getRepository('AppBundle:Poliza')->findBY(
            array('active' => 1)            
        );*/

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Poliza')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new PolizaFilterType());

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

        return $this->render('AppBundle:GestionFinanciera/Poliza:poliza-gestion.html.twig', 
            array( 'form' => $form->createView(),
                    'polizas' => $query,
                    'pagination' => $pagination
                )
            );
    }  
    
     /**
     * @Route("/gestion-financiera/poliza/nuevo", name="polizaNuevo")
     */
    public function polizaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $poliza = new Poliza();
        
        $form = $this->createForm(new PolizaType(), $poliza);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $poliza = $form->getData();

            $poliza->setActive(true);
            $poliza->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $poliza->setUsuarioCreacion($usuario);


            
            $em->persist($poliza);
            $em->flush();

            return $this->redirectToRoute('polizaGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera/Poliza:poliza-nuevo.html.twig', array('form' => $form->createView()));
    }




    /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/editar", name="polizaEditar")
     */
    public function polizaEditarAction(Request $request, $idPoliza)
    {
        $em = $this->getDoctrine()->getManager();
        $poliza = new Poliza();

        $poliza = $em->getRepository('AppBundle:Poliza')->findOneBy(
            array('id' => $idPoliza)
        );

        $form = $this->createForm(new PolizaType(), $poliza);
        
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

            $poliza = $form->getData();

            $poliza->setFechaModificacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $poliza->setUsuarioModificacion($usuario);


            $em->flush();

            return $this->redirectToRoute('polizaGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/Poliza:poliza-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPoliza' => $idPoliza,
                    'poliza' => $poliza,
            )
        );

    }
/**
     * @Route("/gestion-financiera/poliza/{idPoliza}/eliminar", name="polizaEliminar")
     */
    public function polizaEliminarAction(Request $request, $idPoliza)
    {
        $em = $this->getDoctrine()->getManager();
        $poliza = new Poliza();

        $poliza = $em->getRepository('AppBundle:Poliza')->find($idPoliza);              

        $em->remove($poliza);
        $em->flush();

        return $this->redirect($this->generateUrl('polizaGestion'));

    }



/**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte", name="polizaSoporte")
     */
    public function polizaSoporteAction(Request $request, $idPoliza)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $polizaSoporte = new PolizaSoporte();
        
        $form = $this->createForm(new PolizaSoporteType(), $polizaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
            array('active' => '1', 'poliza' => $idPoliza),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
            array('active' => '0', 'poliza' => $idPoliza),
            array('fecha_creacion' => 'ASC')
        );
        
        $poliza = $em->getRepository('AppBundle:Poliza')->findOneBy(
            array('id' => $idPoliza)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $polizaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'poliza_tipo_soporte'
                    )
                );
                
                $actualizarPolizaSoportes = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'poliza' => $idPoliza
                    )
                );  
            
                foreach ($actualizarPolizaSoportes as $actualizarPolizaSoporte){
                    echo $actualizarPolizaSoporte->getId()." ".$actualizarPolizaSoporte->getTipoSoporte()."<br />";
                    $actualizarPolizaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarPolizaSoporte->setActive(0);
                    $actualizarPolizaSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $polizaSoporte->setPoliza($poliza);
                $polizaSoporte->setActive(true);
                $polizaSoporte->setFechaCreacion(new \DateTime());
                $polizaSoporte->setUsuarioCreacion($usuario);

                $em->persist($polizaSoporte);
                $em->flush();

                return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera/Poliza:poliza-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idPoliza' => $idPoliza
            )
        );
        
    }
    

     /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte/{idPolizaSoporte}/descargar", name="polizaSoporteRecuperarArchivo")
     */
    public function polizaSoporteDescargarAction(Request $request, $idPoliza, $idPolizaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:PolizaSoporte')->findOneBy(
            array('id' => $idPolizaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }


    /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte/{idPolizaSoporte}/borrar", name="polizaSoporteBorrar")
     */
    public function polizaSoporteBorrarAction(Request $request, $idPoliza, $idPolizaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $poliza = new PolizaSoporte();
        
        $polizaSoporte = $em->getRepository('AppBundle:PolizaSoporte')->findOneBy(
            array('id' => $idPolizaSoporte)
        );
        
        $polizaSoporte->setFechaModificacion(new \DateTime());
        $polizaSoporte->setActive(0);
        $polizaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
        
    }
   }

