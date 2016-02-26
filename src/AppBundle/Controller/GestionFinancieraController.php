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

use AppBundle\Entity\Ahorro;
use AppBundle\Entity\AhorroSoporte;
use AppBundle\Entity\Poliza;
use AppBundle\Entity\PolizaSoporte;
use AppBundle\Entity\ProgramaCapacitacionFinanciera;
use AppBundle\Entity\ProgramaCapacitacionFinancieraSoporte;
use AppBundle\Entity\CapacitacionFinanciera;
use AppBundle\Entity\CapacitacionFinancieraSoporte;
use AppBundle\Entity\Participante;

use AppBundle\Form\GestionFinanciera\AhorroType;
use AppBundle\Form\GestionFinanciera\AhorroSoporteType;
use AppBundle\Form\GestionFinanciera\PolizaType;
use AppBundle\Form\GestionFinanciera\PolizaSoporteType;
use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraSoporteType;
use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraSoporteType;
use AppBundle\Form\GestionFinanciera\ParticipanteType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GestionFinancieraController extends Controller
{
   /**
     * @Route("/gestion-financiera/ahorro", name="ahorroGestion")
     */
    public function ahorroGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ahorros= $em->getRepository('AppBundle:Ahorro')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:ahorro-gestion.html.twig', array( 'ahorros' => $ahorros));
    }  
	
	 /**
     * @Route("/gestion-financiera/ahorro/nuevo", name="ahorroNuevo")
     */
    public function ahorroNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();
        
        $form = $this->createForm(new AhorroType(), $ahorro);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $ahorro = $form->getData();

            $ahorro->setActive(true);
            $ahorro->setFechaCreacion(new \DateTime());


            
            $em->persist($ahorro);
            $em->flush();

            return $this->redirectToRoute('ahorroGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:ahorro-nuevo.html.twig', array('form' => $form->createView()));
    } 
	
 /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/editar", name="ahorroEditar")
     */
    public function ahorroEditarAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();

        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro)
        );

        $form = $this->createForm(new AhorroType(), $ahorro);
        
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

            $ahorro = $form->getData();

            $ahorro->setFechaModificacion(new \DateTime());


            $em->flush();

            return $this->redirectToRoute('ahorroGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera:ahorro-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idAhorro' => $idAhorro,
                    'ahorro' => $ahorro,
            )
        );

    }
/**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/eliminar", name="ahorroEliminar")
     */
    public function ahorroEliminarAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();

        $ahorro = $em->getRepository('AppBundle:Ahorro')->find($idAhorro);              

        $em->remove($ahorro);
        $em->flush();

        return $this->redirect($this->generateUrl('ahorroGestion'));

    }



/**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/documentos-soporte", name="ahorroSoporte")
     */
    public function ahorroSoporteAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();

        $ahorroSoporte = new AhorroSoporte();
        
        $form = $this->createForm(new AhorroSoporteType(), $ahorroSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
            array('active' => '1', 'ahorro' => $idAhorro),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
            array('active' => '0', 'ahorro' => $idAhorro),
            array('fecha_creacion' => 'ASC')
        );
        
        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $ahorroSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarAhorroSoportes = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'ahorro' => $idAhorro
                    )
                );  
            
                foreach ($actualizarAhorroSoportes as $actualizarAhorroSoporte){
                    echo $actualizarAhorroSoporte->getId()." ".$actualizarAhorroSoporte->getTipoSoporte()."<br />";
                    $actualizarAhorroSoporte->setFechaModificacion(new \DateTime());
                    $actualizarAhorroSoporte->setActive(0);
                    $em->flush();
                }
                
                $ahorroSoporte->setAhorro($ahorro);
                $ahorroSoporte->setActive(true);
                $ahorroSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($ahorroSoporte);
                $em->flush();

                return $this->redirectToRoute('ahorroSoporte', array( 'idAhorro' => $idAhorro));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera:ahorro-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/documentos-soporte/{idAhorroSoporte}/borrar", name="ahorroSoporteBorrar")
     */
    public function ahorroSoporteBorrarAction(Request $request, $idAhorro, $idAhorroSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $ahorro = new AhorroSoporte();
        
        $ahorroSoporte = $em->getRepository('AppBundle:AhorroSoporte')->findOneBy(
            array('id' => $idAhorroSoporte)
        );
        
        $ahorroSoporte->setFechaModificacion(new \DateTime());
        $ahorroSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('ahorroSoporte', array( 'idAhorro' => $idAhorro));
        
    }






	 /**
     * @Route("/gestion-financiera/poliza", name="polizaGestion")
     */
    public function polizaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $polizas= $em->getRepository('AppBundle:Poliza')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:poliza-gestion.html.twig', array( 'polizas' => $polizas));
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


            
            $em->persist($poliza);
            $em->flush();

            return $this->redirectToRoute('polizaGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:poliza-nuevo.html.twig', array('form' => $form->createView()));
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


            $em->flush();

            return $this->redirectToRoute('polizaGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera:poliza-editar.html.twig', 
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
        $em = $this->getDoctrine()->getManager();

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
                        'dominio' => 'ruta_tipo_soporte'
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
                    $em->flush();
                }
                
                $polizaSoporte->setPoliza($poliza);
                $polizaSoporte->setActive(true);
                $polizaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($polizaSoporte);
                $em->flush();

                return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera:poliza-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte/{idPolizaSoporte}/borrar", name="polizaSoporteBorrar")
     */
    public function polizaSoporteBorrarAction(Request $request, $idPoliza, $idPolizaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $poliza = new PolizaSoporte();
        
        $polizaSoporte = $em->getRepository('AppBundle:PolizaSoporte')->findOneBy(
            array('id' => $idPolizaSoporte)
        );
        
        $polizaSoporte->setFechaModificacion(new \DateTime());
        $polizaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
        
    }


	
	/**
     * @Route("/gestion-financiera/capacitacion-financiera", name="programaCapacitacionFinancieraGestion")
     */
    public function programaCapacitacionFinancieraGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $programaCapacitacionFinancieras= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-gestion.html.twig', array( 'programaCapacitacionFinancieras' => $programaCapacitacionFinancieras));
    }  
	
	 /**
     * @Route("/gestion-financiera/capacitacion-financiera/nuevo", name="programaCapacitacionFinancieraNuevo")
     */
    public function programaCapacitacionFinancieraNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $programaCapacitacionFinanciera = new ProgramaCapacitacionFinanciera();
        
        $form = $this->createForm(new ProgramaCapacitacionFinancieraType(), $programaCapacitacionFinanciera);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $programaCapacitacionFinanciera = $form->getData();

            $programaCapacitacionFinanciera->setActive(true);
            $programaCapacitacionFinanciera->setFechaCreacion(new \DateTime());


            
            $em->persist($programaCapacitacionFinanciera);
            $em->flush();

            return $this->redirectToRoute('programaCapacitacionFinancieraGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-nuevo.html.twig', array('form' => $form->createView()));
    } 


 /**
     * @Route("/gestion-financiera/capacitacion-financiera/{idPCF}/editar", name="programaCapacitacionFinancieraEditar")
     */
    public function programaCapacitacionFinancieraEditarAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();
        $programaCapacitacionFinanciera = new ProgramaCapacitacionFinanciera();

        $programaCapacitacionFinanciera = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findOneBy(
            array('id' => $idPCF)
        );

        $form = $this->createForm(new ProgramaCapacitacionFinancieraType(), $programaCapacitacionFinanciera);
        
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

            $programaCapacitacionFinanciera = $form->getData();

            $programaCapacitacionFinanciera->setFechaModificacion(new \DateTime());


            $em->flush();

            return $this->redirectToRoute('programaCapacitacionFinancieraGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera:capacitacion-financiera-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPCF' => $idPCF,
                    'programaCapacitacionFinanciera' => $programaCapacitacionFinanciera,
            )
        );

    }
/**
     * @Route("/gestion-financiera/capacitacion-financiera/{idPCF}/eliminar", name="programaCapacitacionFinancieraEliminar")
     */
    public function programaCapacitacionFinancieraEliminarAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();
        $programaCapacitacionFinanciera = new ProgramaCapacitacionFinanciera();

        $programaCapacitacionFinanciera = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->find($idPCF);              

        $em->remove($programaCapacitacionFinanciera);
        $em->flush();

        return $this->redirect($this->generateUrl('programaCapacitacionFinancieraGestion'));

    }



/**
     * @Route("/gestion-financiera/capacitacion-financiera/{idPCF}/documentos-soporte", name="programaCapacitacionFinancieraSoporte")
     */
    public function programaCapacitacionFinancieraSoporteAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();

        $programaCapacitacionFinancieraSoporte = new ProgramaCapacitacionFinancieraSoporte();
        
        $form = $this->createForm(new ProgramaCapacitacionFinancieraSoporteType(), $programaCapacitacionFinancieraSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findBy(
            array('active' => '1', 'programaCapacitacionFinanciera' => $idPCF),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findBy(
            array('active' => '0', 'programaCapacitacionFinanciera' => $idPCF),
            array('fecha_creacion' => 'ASC')
        );
        
        $programaCapacitacionFinanciera = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findOneBy(
            array('id' => $idPCF)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $programaCapacitacionFinancieraSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarProgramaCapacitacionFinancieraSoportes = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'programaCapacitacionFinanciera' => $idPCF
                    )
                );  
            
                foreach ($actualizarProgramaCapacitacionFinancieraSoportes as $actualizarProgramaCapacitacionFinancieraSoporte){
                    echo $actualizarProgramaCapacitacionFinancieraSoporte->getId()." ".$actualizarProgramaCapacitacionFinancieraSoporte->getTipoSoporte()."<br />";
                    $actualizarProgramaCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
                    $actualizarProgramaCapacitacionFinancieraSoporte->setActive(0);
                    $em->flush();
                }
                
                $programaCapacitacionFinancieraSoporte->setProgramaCapacitacionFinanciera($programaCapacitacionFinanciera);
                $programaCapacitacionFinancieraSoporte->setActive(true);
                $programaCapacitacionFinancieraSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($programaCapacitacionFinancieraSoporte);
                $em->flush();

                return $this->redirectToRoute('programaCapacitacionFinancieraSoporte', array( 'idPCF' => $idPCF));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera:capacitacion-financiera-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/capacitacion-financiera/{idPCF}/documentos-soporte/{idPCFSoporte}/borrar", name="programaCapacitacionFinancieraSoporteBorrar")
     */
    public function programaCapacitacionFinancieraSoporteBorrarAction(Request $request, $idPCF, $idPCFSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $programaCapacitacionFinancieraSoporte = new ProgramaCapacitacionFinancieraSoporte();
        
        $programaCapacitacionFinancieraSoporte = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idPCFSoporte)
        );
        
        $programaCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
        $programaCapacitacionFinancieraSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('programaCapacitacionFinancieraSoporte', array( 'idPCF' => $idPCF));
        
    }



    /**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion", name="capacitacionFinancieraGestion")
     */
    public function capacitacionFinancieraGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinancieras= $em->getRepository('AppBundle:CapacitacionFinanciera')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-capacitacion-gestion.html.twig', array( 'capacitacionFinancieras' => $capacitacionFinancieras));
    }  
    
     /**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion/nuevo", name="capacitacionFinancieraNuevo")
     */
    public function capacitacionFinancieraNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();
        
        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setActive(true);
            $capacitacionFinanciera->setFechaCreacion(new \DateTime());


            
            $em->persist($capacitacionFinanciera);
            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-capacitacion-nuevo.html.twig', array('form' => $form->createView()));
    } 


 /**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/editar", name="capacitacionFinancieraEditar")
     */
    public function capacitacionFinancieraEditarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );

        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);
        
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

            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setFechaModificacion(new \DateTime());


            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera:capacitacion-financiera-capacitacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCapacitacionFinanciera' => $idCapacitacionFinanciera,
                    'capacitacionFinanciera' => $capacitacionFinanciera,
            )
        );

    }
/**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/eliminar", name="capacitacionFinancieraEliminar")
     */
    public function capacitacionFinancieraEliminarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->find($idCapacitacionFinanciera);              

        $em->remove($capacitacionFinanciera);
        $em->flush();

        return $this->redirect($this->generateUrl('capacitacionFinancieraGestion'));

    }



/**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte", name="capacitacionFinancieraSoporte")
     */
    public function capacitacionFinancieraSoporteAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $form = $this->createForm(new CapacitacionFinancieraSoporteType(), $capacitacionFinancieraSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '1', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '0', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );
        
        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $capacitacionFinancieraSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarCapacitacionFinancieraSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'capacitacionFinanciera' => $idCapacitacionFinanciera
                    )
                );  
            
                foreach ($actualizarCapacitacionFinancieraSoportes as $actualizarCapacitacionFinancieraSoporte){
                    echo $actualizarCapacitacionFinancieraSoporte->getId()." ".$actualizarCapacitacionFinancieraSoporte->getTipoSoporte()."<br />";
                    $actualizarCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
                    $actualizarCapacitacionFinancieraSoporte->setActive(0);
                    $em->flush();
                }
                
                $capacitacionFinancieraSoporte->setCapacitacionFinanciera($capacitacionFinanciera);
                $capacitacionFinancieraSoporte->setActive(true);
                $capacitacionFinancieraSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($capacitacionFinancieraSoporte);
                $em->flush();

                return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera:capacitacion-financiera-capacitacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte/{idCapacitacionFinancieraSoporte}/borrar", name="capacitacionFinancieraSoporteBorrar")
     */
    public function capacitacionFinancieraSoporteBorrarAction(Request $request, $idCapacitacionFinanciera, $idCapacitacionFinancieraSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $capacitacionFinancieraSoporte = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idCapacitacionFinancieraSoporte)
        );
        
        $capacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
        $capacitacionFinancieraSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
        
    }







	
	
	/**
     * @Route("/gestion-financiera/participante", name="participanteGestion")
     */
    public function participanteGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $participantes= $em->getRepository('AppBundle:Participante')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:participante-gestion.html.twig', array( 'participantes' => $participantes));
    }  
	
	 /**
     * @Route("/gestion-financiera/participante/nuevo", name="participanteNuevo")
     */
    public function participanteNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $participante = new Participante();
        
        $form = $this->createForm(new ParticipanteType(), $participante);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $participante = $form->getData();

            $participante->setActive(true);
            $participante->setFechaCreacion(new \DateTime());


            
            $em->persist($participante);
            $em->flush();

            return $this->redirectToRoute('participanteGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:participante-nuevo.html.twig', array('form' => $form->createView()));
    } 
}
