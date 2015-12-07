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
use AppBundle\Entity\Talento;
use AppBundle\Entity\Beca;

use AppBundle\Form\GestionConocimiento\ExperienciaExitosaType;
use AppBundle\Form\GestionConocimiento\TalentoType;
use AppBundle\Form\GestionConocimiento\BecaType;

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
        $experienciaexitosa = new Experienciaexitosa();
        
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
     * @Route("/gestion-conocimiento/becas", name="becaGestion")
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
     * @Route("/gestion-conocimiento/becas/nuevo", name="becaNuevo")
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
}
