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
use AppBundle\Entity\Poliza;

use AppBundle\Form\GestionFinanciera\AhorroType;
use AppBundle\Form\GestionFinanciera\PolizaType;


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
     * @Route("/gestion-financiera/poliza", name="polizasGestion")
     */
    public function polizasGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $polizas= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
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

            return $this->redirectToRoute('polizasGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:poliza-nuevo.html.twig', array('form' => $form->createView()));
    } 
	
	
	/**
     * @Route("/gestion-financiera/capacitacion-financiera", name="capacitacionfinancieraGestion")
     */
    public function capacitacionfinancieraGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $capacitaciones= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-gestion.html.twig', array( 'capacitaciones' => $capacitaciones));
    }  
	
	 /**
     * @Route("/gestion-financiera/capacitacion-financiera/nuevo", name="capacitacionfinancieraNuevo")
     */
    public function capacitacionfinancieraNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();
        
        $form = $this->createForm(new PolizaType(), $capacitacion);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacion = $form->getData();

            $capacitacion->setActive(true);
            $capacitacion->setFechaCreacion(new \DateTime());


            
            $em->persist($capacitacion);
            $em->flush();

            return $this->redirectToRoute('capacitacionfinancieraGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera:capacitacion-financiera-nuevo.html.twig', array('form' => $form->createView()));
    } 
	
}
