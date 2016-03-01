<?php

namespace AppBundle\Controller;

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
use AppBundle\Entity\Convocatoria;
use AppBundle\Form\GestionAdministrativa\ConvocatoriaType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class GestionAdministrativaController extends Controller
{
    
	/**
     * @Route("/gestion-administrativa/gestion-POA/POA/", name="POAGestion")
     */
    public function POAGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $poas = $em->getRepository('AppBundle:POA')->findAll(); 

        return $this->render('AppBundle:GestionAdministrativa/GestionPOA:POA-gestion.html.twig', array( 'poas' => $poas));
    }

	/**
     * @Route("/gestion-administrativa/gestion-POA/POA/nuevo", name="POANuevo")
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
		 return $this->render('AppBundle:GestionAdministrativa/GestionPOA:POA-nuevo.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/editar", name="POAEditar")
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
            'AppBundle:GestionAdministrativa/GestionPOA:POA-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPOA' => $idPOA,
                    'poa' => $poa,
            )
        );

    }



    /**
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/eliminar", name="POAeliminar")
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
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/documento-soporte", name="POASoporte")
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
            'AppBundle:GestionAdministrativa/GestionPOA:POA-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/documentos-soporte/{idPOASoporte}/borrar", name="POASoporteBorrar")
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
	
	/**
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/", name="convocatoriaGestion")
     */
    public function convocatoriaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $convocatoria = $em->getRepository('AppBundle:Convocatoria')->findAll(); 

        return $this->render('AppBundle:GestionAdministrativa/GestionPOA:convocatoria-gestion.html.twig', array( 'convocatoria' => $convocatoria));
    }

    /**
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/nuevo", name="convocatoriaNuevo")
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
         return $this->render('AppBundle:GestionAdministrativa/GestionPOA:convocatoria-nuevo.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/{idConvocatoria}/editar", name="convocatoriaEditar")
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
            'AppBundle:GestionAdministrativa/GestionPOA:convocatoria-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idConvocatoria' => $idConvocatoria,
                    'convocatoria' => $convocatoria,
            )
        );

    }



    /**
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/{idConvocatoria}/eliminar", name="convocatoriaEliminar")
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
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/{idConvocatoria}/documento-soporte", name="convocatoriaSoporte")
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
            'AppBundle:GestionAdministrativa/GestionPOA:convocatoria-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-administrativa/gestion-POA/convocatoria/{idConvocatoria}/documentos-soporte/{idConvocatoriaSoporte}/borrar", name="convocatoriaSoporteBorrar")
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
