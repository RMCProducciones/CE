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



use AppBundle\Entity\Convocatoria;
use AppBundle\Entity\ConvocatoriaSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionAdministrativa\ConvocatoriaType;
use AppBundle\Form\GestionAdministrativa\ConvocatoriaSoporteType;
use AppBundle\Form\GestionAdministrativa\ConvocatoriaFilterType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class ConvocatoriaController extends Controller
{   
	/**
     * @Route("/gestion-administrativa/poa/convocatoria/gestion", name="convocatoriaGestion")
     */
    public function convocatoriaGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$convocatoria = $em->getRepository('AppBundle:Convocatoria')->findAll(); 

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Convocatoria')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ConvocatoriaFilterType());

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

        return $this->render('AppBundle:GestionAdministrativa/Convocatoria:convocatoria-gestion.html.twig', 
            array( 'form' => $form->createView(),
                   'convocatoria' => $query, 
                   'pagination' => $pagination
                )
            );
    }

    /**
     * @Route("/gestion-administrativa/poa/convocatoria/nuevo", name="convocatoriaNuevo")
     */
    public function convocatoriaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $convocatoria = new Convocatoria();
        
        $form = $this->createForm(new ConvocatoriaType(), $convocatoria);

        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $convocatoria = $form->getData();

            $convocatoria->setActive(true);
            $convocatoria->setFechaCreacion(new \DateTime());

            
            $em->persist($convocatoria);
            $em->flush();

            return $this->redirectToRoute('convocatoriaGestion');
        }
         return $this->render('AppBundle:GestionAdministrativa/Convocatoria:convocatoria-nuevo.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/gestion-administrativa/poa/convocatoria/{idConvocatoria}/editar", name="convocatoriaEditar")
     */
    public function convocatoriaEditarAction(Request $request, $idConvocatoria)
    {
        $em = $this->getDoctrine()->getManager();
        $convocatoria = new Convocatoria();

        $convocatoria = $em->getRepository('AppBundle:Convocatoria')->findOneBy(
            array('id' => $idConvocatoria)
        );

        $form = $this->createForm(new ConvocatoriaType(), $convocatoria);
        
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

            $convocatoria = $form->getData();          

            $convocatoria->setFechaModificacion(new \DateTime());

            $em->flush();

            return $this->redirectToRoute('convocatoriaGestion');
        }

        return $this->render(
            'AppBundle:GestionAdministrativa/Convocatoria:convocatoria-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idConvocatoria' => $idConvocatoria,
                    'convocatoria' => $convocatoria,
            )
        );

    }

    /**
     * @Route("/gestion-administrativa/poa/convocatoria/{idConvocatoria}/eliminar", name="convocatoriaEliminar")
     */
    public function convocatoriaEliminarAction(Request $request, $idConvocatoria)
    {
        $em = $this->getDoctrine()->getManager();
        $convocatoria = new Convocatoria();

        $convocatoria = $em->getRepository('AppBundle:Convocatoria')->find($idConvocatoria);              

        $em->remove($convocatoria);
        $em->flush();

        return $this->redirect($this->generateUrl('convocatoriaGestion'));

    }

    /**
     * @Route("/gestion-administrativa/poa/convocatoria/{idConvocatoria}/documento-soporte", name="convocatoriaSoporte")
     */
    public function convocatoriaSoporteAction(Request $request, $idConvocatoria)
    {
        $em = $this->getDoctrine()->getManager();

        $convocatoriaSoporte = new ConvocatoriaSoporte();
        
        $form = $this->createForm(new ConvocatoriaSoporteType(), $convocatoriaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ConvocatoriaSoporte')->findBy(
            array('active' => '1', 'convocatoria' => $idConvocatoria),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ConvocatoriaSoporte')->findBy(
            array('active' => '0', 'convocatoria' => $idConvocatoria),
            array('fecha_creacion' => 'ASC')
        );
        
        $convocatoria = $em->getRepository('AppBundle:Convocatoria')->findOneBy(
            array('id' => $idConvocatoria)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $convocatoriaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarConvocatoriaSoportes = $em->getRepository('AppBundle:ConvocatoriaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'convocatoria' => $idConvocatoria
                    )
                );  
            
                foreach ($actualizarConvocatoriaSoportes as $actualizarConvocatoriaSoporte){
                    echo $actualizarConvocatoriaSoporte->getId()." ".$actualizarConvocatoriaSoporte->getTipoSoporte()."<br />";
                    $actualizarConvocatoriaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarConvocatoriaSoporte->setActive(0);
                    $em->flush();
                }
                
                $convocatoriaSoporte->setConvocatoria($convocatoria);
                $convocatoriaSoporte->setActive(true);
                $convocatoriaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($convocatoriaSoporte);
                $em->flush();

                return $this->redirectToRoute('convocatoriaSoporte', array( 'idConvocatoria' => $idConvocatoria));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionAdministrativa/Convocatoria:convocatoria-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idConvocatoria' => $idConvocatoria
            )
        );
        
    }

        /**
     * @Route("/gestion-administrativa/convocatoria/{idConvocatoria}/documentos-soporte/{idConvocatoriaSoporte}/descargar", name="convocatoriaSoporteRecuperarArchivo")
     */
    public function convocatoriaSoporteDescargarAction(Request $request, $idConvocatoria, $idConvocatoriaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:ConvocatoriaSoporte')->findOneBy(
            array('id' => $idConvocatoriaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-administrativa/poa/convocatoria/{idConvocatoria}/documentos-soporte/{idConvocatoriaSoporte}/borrar", name="convocatoriaSoporteBorrar")
     */
    public function convocatoriaSoporteBorrarAction(Request $request, $idConvocatoria, $idConvocatoriaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $convocatoriaSoporte = new ConvocatoriaSoporte();
        
        $convocatoriaSoporte = $em->getRepository('AppBundle:ConvocatoriaSoporte')->findOneBy(
            array('id' => $idConvocatoriaSoporte)
        );
        
        $convocatoriaSoporte->setFechaModificacion(new \DateTime());
        $convocatoriaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('ConvocatoriaSoporte', array( 'idConvocatoria' => $idConvocatoria));
        
    }
   
	
}
