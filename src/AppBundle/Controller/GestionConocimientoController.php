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

use AppBundle\Entity\ExperienciaExitosa;
use AppBundle\Entity\ExperienciaExitosaSoporte;
use AppBundle\Entity\Talento;
use AppBundle\Entity\TalentoSoporte;
use AppBundle\Entity\Beca;
use AppBundle\Entity\BecaSoporte;
use AppBundle\Entity\Capacitacion;
use AppBundle\Entity\Evento;


use AppBundle\Form\GestionConocimiento\ExperienciaExitosaType;
use AppBundle\Form\GestionConocimiento\ExperienciaExitosaSoporteType;
use AppBundle\Form\GestionConocimiento\TalentoType;
use AppBundle\Form\GestionConocimiento\TalentoSoporteType;
use AppBundle\Form\GestionConocimiento\BecaType;
use AppBundle\Form\GestionConocimiento\BecaSoporteType;
use AppBundle\Form\GestionConocimiento\CapacitacionType;
use AppBundle\Form\GestionConocimiento\EventoType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class GestionConocimientoController extends Controller
{
    
	 /**
     * @Route("/gestion-conocimiento/experiencia-exitosa", name="experienciaGestion")
     */
    public function experienciaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosas = $em->getRepository('AppBundle:ExperienciaExitosa')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento:experiencia-gestion.html.twig', array( 'experienciaexitosas' => $experienciaexitosas));
    }                                                                                                                                                                                                                
	
 /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/nuevo", name="experienciaNuevo")
     */
    public function experienciaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();
        
        $form = $this->createForm(new ExperienciaExitosaType(), $experienciaexitosa);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $experienciaexitosa = $form->getData();

            $experienciaexitosa->setActive(true);
            $experienciaexitosa->setFechaCreacion(new \DateTime());


            
            $em->persist($experienciaexitosa);
            $em->flush();

            return $this->redirectToRoute('experienciaGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento:experiencia-nuevo.html.twig', array('form' => $form->createView()));
    } 

    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/editar", name="experienciaEditar")
     */
    public function experienciaEditarAction(Request $request, $idExperienciaExitosa)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();

        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->findOneBy(
            array('id' => $idExperienciaExitosa)
        );

        $form = $this->createForm(new ExperienciaExitosaType(), $experienciaexitosa);
        
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

            $experienciaexitosa = $form->getData();

            $experienciaexitosa->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('experienciaGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento:experiencia-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idExperienciaExitosa' => $idExperienciaExitosa,
                    'experienciaexitosa' => $experienciaexitosa,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/eliminar", name="experienciaEliminar")
     */
    public function experienciaEliminarAction(Request $request, $idExperienciaExitosa)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();

        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->find($idExperienciaExitosa);              

        $em->remove($experienciaexitosa);
        $em->flush();

        return $this->redirect($this->generateUrl('experienciaGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/documentos-soporte", name="experienciaSoporte")
     */
    public function experienciaSoporteAction(Request $request, $idExperienciaExitosa)
    {
        $em = $this->getDoctrine()->getManager();

        $experienciaexitosaSoporte = new ExperienciaExitosaSoporte();
        
        $form = $this->createForm(new ExperienciaExitosaSoporteType(), $experienciaexitosaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
            array('active' => '1', 'experienciaexitosa' => $idExperienciaExitosa),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
            array('active' => '0', 'experienciaexitosa' => $idExperienciaExitosa),
            array('fecha_creacion' => 'ASC')
        );
        
        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->findOneBy(
            array('id' => $idExperienciaExitosa)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $talentoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarExperienciaExitosaSoportes = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'experienciaexitosa' => $idExperienciaExitosa
                    )
                );  
            
                foreach ($actualizarExperienciaExitosaSoportes as $actualizarExperienciaExitosaSoporte){
                    echo $actualizarExperienciaExitosaSoporte->getId()." ".$actualizarExperienciaExitosaSoporte->getTipoSoporte()."<br />";
                    $actualizarExperienciaExitosaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarExperienciaExitosaSoporte->setActive(0);
                    $em->flush();
                }
                
                $experienciaexitosaSoporte->setExperienciaExitosa($experienciaexitosa);
                $experienciaexitosaSoporte->setActive(true);
                $experienciaexitosaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($experienciaexitosaSoporte);
                $em->flush();

                return $this->redirectToRoute('experienciaSoporte', array( 'idExperienciaExitosa' => $idExperienciaExitosa));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento:experiencia-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/documentos-soporte/{idExperienciaExitosaSoporte}/borrar", name="experienciaSoporteBorrar")
     */
    public function experienciaSoporteBorrarAction(Request $request, $idExperienciaExitosa, $idExperienciaExitosaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $experienciaexitosaSoporte = new ExperienciaExitosaSoporte();
        
        $experienciaexitosaSoporte = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findOneBy(
            array('id' => $idExperienciaExitosaSoporte)
        );
        
        $experienciaexitosaSoporte->setFechaModificacion(new \DateTime());
        $experienciaexitosaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('experienciaSoporte', array( 'idExperienciaExitosa' => $idExperienciaExitosa));
        
    }
   
   



   /**
     * @Route("/gestion-conocimiento/talento", name="talentoGestion")
     */
    public function talentoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $talentos= $em->getRepository('AppBundle:Talento')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento:talento-gestion.html.twig', array( 'talentos' => $talentos));
    }       
	
	 /**
     * @Route("/gestion-conocimiento/talento/nuevo", name="talentoNuevo")
     */
    public function talentoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();
        
        $form = $this->createForm(new TalentoType(), $talento);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $talento = $form->getData();

            $talento->setActive(true);
            $talento->setFechaCreacion(new \DateTime());


            
            $em->persist($talento);
            $em->flush();

            return $this->redirectToRoute('talentoGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento:talento-nuevo.html.twig', array('form' => $form->createView()));
    } 



/**
     * @Route("/gestion-conocimiento/talento/{idTalento}/editar", name="talentoEditar")
     */
    public function talentoEditarAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();

        $talento = $em->getRepository('AppBundle:Talento')->findOneBy(
            array('id' => $idTalento)
        );

        $form = $this->createForm(new TalentoType(), $talento);
        
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

            $talento = $form->getData();

            if($talento->getRural() == true){
                $talento->setBarrio(null);
            }
            else
            {
                $talento->setCorregimiento(null);
                $talento->setVereda(null);
                $talento->setCacerio(null);
            }

            $talento->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('talentoGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento:talento-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTalento' => $idTalento,
                    'talento' => $talento,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/eliminar", name="talentoEliminar")
     */
    public function talentoEliminarAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();

        $talento = $em->getRepository('AppBundle:Talento')->find($idTalento);              

        $em->remove($talento);
        $em->flush();

        return $this->redirect($this->generateUrl('talentoGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/documentos-soporte", name="talentoSoporte")
     */
    public function talentoSoporteAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();

        $talentoSoporte = new TalentoSoporte();
        
        $form = $this->createForm(new TalentoSoporteType(), $talentoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
            array('active' => '1', 'talento' => $idTalento),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
            array('active' => '0', 'talento' => $idTalento),
            array('fecha_creacion' => 'ASC')
        );
        
        $talento = $em->getRepository('AppBundle:Talento')->findOneBy(
            array('id' => $idTalento)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $talentoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarTalentoSoportes = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'talento' => $idTalento
                    )
                );  
            
                foreach ($actualizarTalentoSoportes as $actualizarTalentoSoporte){
                    echo $actualizarTalentoSoporte->getId()." ".$actualizarTalentoSoporte->getTipoSoporte()."<br />";
                    $actualizarTalentoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarTalentoSoporte->setActive(0);
                    $em->flush();
                }
                
                $talentoSoporte->setTalento($talento);
                $talentoSoporte->setActive(true);
                $talentoSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($talentoSoporte);
                $em->flush();

                return $this->redirectToRoute('talentoSoporte', array( 'idTalento' => $idTalento));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento:talento-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/documentos-soporte/{idTalentoSoporte}/borrar", name="talentoSoporteBorrar")
     */
    public function talentoSoporteBorrarAction(Request $request, $idTalento, $idTalentoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $TalentoSoporte = new TalentoSoporte();
        
        $talentoSoporte = $em->getRepository('AppBundle:TalentoSoporte')->findOneBy(
            array('id' => $idTalentoSoporte)
        );
        
        $talentoSoporte->setFechaModificacion(new \DateTime());
        $talentoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('talentoSoporte', array( 'idTalento' => $idTalento));
        
    }









	
	 /**
     * @Route("/gestion-conocimiento/beca", name="becaGestion")
     */
    public function becaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $becas= $em->getRepository('AppBundle:Beca')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento:beca-gestion.html.twig', array( 'becas' => $becas));
    }  
	
	 /**
     * @Route("/gestion-conocimiento/beca/nuevo", name="becaNuevo")
     */
    public function becaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();
        
        $form = $this->createForm(new BecaType(), $beca);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $beca = $form->getData();

            $beca->setActive(true);
            $beca->setFechaCreacion(new \DateTime());


            
            $em->persist($beca);
            $em->flush();

            return $this->redirectToRoute('becaGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento:beca-nuevo.html.twig', array('form' => $form->createView()));
    } 
	

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/editar", name="becaEditar")
     */
    public function becaEditarAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();

        $beca = $em->getRepository('AppBundle:Beca')->findOneBy(
            array('id' => $idBeca)
        );

        $form = $this->createForm(new BecaType(), $beca);
        
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

            $beca = $form->getData();

            

            $beca->setFechaModificacion(new \DateTime());

  

            $em->flush();

            return $this->redirectToRoute('becaGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento:beca-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idBeca' => $idBeca,
                    'beca' => $beca,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/eliminar", name="becaEliminar")
     */
    public function becaEliminarAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();

        $beca = $em->getRepository('AppBundle:Beca')->find($idBeca);              

        $em->remove($beca);
        $em->flush();

        return $this->redirect($this->generateUrl('becaGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/documentos-soporte", name="becaSoporte")
     */
    public function becaSoporteAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();

        $becaSoporte = new BecaSoporte();
        
        $form = $this->createForm(new BecaSoporteType(), $becaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:BecaSoporte')->findBy(
            array('active' => '1', 'beca' => $idBeca),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:BecaSoporte')->findBy(
            array('active' => '0', 'beca' => $idBeca),
            array('fecha_creacion' => 'ASC')
        );
        
        $beca = $em->getRepository('AppBundle:Beca')->findOneBy(
            array('id' => $idBeca)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $becaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarBecaSoportes = $em->getRepository('AppBundle:BecaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'beca' => $idBeca
                    )
                );  
            
                foreach ($actualizarBecaSoportes as $actualizarBecaSoporte){
                    echo $actualizarBecaSoporte->getId()." ".$actualizarBecaSoporte->getTipoSoporte()."<br />";
                    $actualizarBecaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarBecaSoporte->setActive(0);
                    $em->flush();
                }
                
                $becaSoporte->setBeca($beca);
                $becaSoporte->setActive(true);
                $becaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($becaSoporte);
                $em->flush();

                return $this->redirectToRoute('becaSoporte', array( 'idBeca' => $idBeca));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento:beca-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/documentos-soporte/{idBecaSoporte}/borrar", name="becaSoporteBorrar")
     */
    public function becaSoporteBorrarAction(Request $request, $idBeca, $idBecaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $becaSoporte = new BecaSoporte();
        
        $becaSoporte = $em->getRepository('AppBundle:BecaSoporte')->findOneBy(
            array('id' => $idBecaSoporte)
        );
        
        $becaSoporte->setFechaModificacion(new \DateTime());
        $becaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('becaSoporte', array( 'idBeca' => $idBeca));
        
    }


	
	/**
     * @Route("/gestion-conocimiento/capacitacion", name="capacitacionGestion")
     */
    public function capacitacionGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $capacitaciones= $em->getRepository('AppBundle:Capacitacion')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento:capacitacion-gestion.html.twig', array( 'capacitaciones' => $capacitaciones));
    }  
	
	 /**
     * @Route("/gestion-conocimiento/capacitacion/nuevo", name="capacitacionNuevo")
     */
    public function capacitacionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();
        
        $form = $this->createForm(new CapacitacionType(), $capacitacion);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacion = $form->getData();

            $capacitacion->setActive(true);
            $capacitacion->setFechaCreacion(new \DateTime());


            
            $em->persist($capacitacion);
            $em->flush();

            return $this->redirectToRoute('capacitacionGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento:capacitacion-nuevo.html.twig', array('form' => $form->createView()));
    } 
	
	
	/**
     * @Route("/gestion-conocimiento/evento", name="eventoGestion")
     */
    public function eventoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $eventos= $em->getRepository('AppBundle:Evento')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento:evento-gestion.html.twig', array( 'eventos' => $eventos));
    }  
	
	 /**
     * @Route("/gestion-conocimiento/evento/nuevo", name="eventoNuevo")
     */
    public function eventoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();
        
        $form = $this->createForm(new EventoType(), $evento);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $evento = $form->getData();

            $evento->setActive(true);
            $evento->setFechaCreacion(new \DateTime());


            
            $em->persist($evento);
            $em->flush();

            return $this->redirectToRoute('eventoGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento:evento-nuevo.html.twig', array('form' => $form->createView()));
    } 

    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/editar", name="eventoEditar")
     */
    public function eventoEditarAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();

        $evento = $em->getRepository('AppBundle:Evento')->findOneBy(
            array('id' => $idEvento)
        );

        $form = $this->createForm(new EventoType(), $evento);
        
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

            $evento = $form->getData();

            

            $evento->setFechaModificacion(new \DateTime());

  

            $em->flush();

            return $this->redirectToRoute('eventoGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento:evento-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idEvento' => $idEvento,
                    'evento' => $evento,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/eliminar", name="eventoEliminar")
     */
    public function eventoEliminarAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();
        $evento = new Evento();

        $evento = $em->getRepository('AppBundle:Evento')->find($idEvento);              

        $em->remove($evento);
        $em->flush();

        return $this->redirect($this->generateUrl('eventoGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/documentos-soporte", name="eventoSoporte")
     */
    public function eventoSoporteAction(Request $request, $idEvento)
    {
        $em = $this->getDoctrine()->getManager();

        $eventoSoporte = new EventoSoporte();
        
        $form = $this->createForm(new EventoSoporteType(), $eventoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:EventoSoporte')->findBy(
            array('active' => '1', 'evento' => $idEvento),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:EventoSoporte')->findBy(
            array('active' => '0', 'evento' => $idEvento),
            array('fecha_creacion' => 'ASC')
        );
        
        $evento = $em->getRepository('AppBundle:Evento')->findOneBy(
            array('id' => $idEvento)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $eventoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarEventoSoportes = $em->getRepository('AppBundle:EventoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'evento' => $idEvento
                    )
                );  
            
                foreach ($actualizarEventoSoportes as $actualizarEventoSoporte){
                    echo $actualizarEventoSoporte->getId()." ".$actualizarEventoSoporte->getTipoSoporte()."<br />";
                    $actualizarEventoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarEventoSoporte->setActive(0);
                    $em->flush();
                }
                
                $eventoSoporte->setEvento($evento);
                $eventoSoporte->setActive(true);
                $eventoSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($eventoSoporte);
                $em->flush();

                return $this->redirectToRoute('eventoSoporte', array( 'idEvento' => $idEvento));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento:evento-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-conocimiento/evento/{idEvento}/documentos-soporte/{idEventoSoporte}/borrar", name="eventoSoporteBorrar")
     */
    public function eventoSoporteBorrarAction(Request $request, $idEvento, $idEventoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $eventoSoporte = new EventoSoporte();
        
        $eventoSoporte = $em->getRepository('AppBundle:EventoSoporte')->findOneBy(
            array('id' => $idEventoSoporte)
        );
        
        $eventoSoporte->setFechaModificacion(new \DateTime());
        $eventoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('eventoSoporte', array( 'idEvento' => $idEvento));
        
    }
	
}
