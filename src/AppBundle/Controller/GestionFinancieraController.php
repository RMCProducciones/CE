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

use AppBundle\Form\GestionFinanciera\AhorroType;


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
	
	
	
	
}
