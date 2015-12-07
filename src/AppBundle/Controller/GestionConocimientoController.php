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

use AppBundle\Form\GestionConocimiento\ExperienciaExitosaType;


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
   
	
}
