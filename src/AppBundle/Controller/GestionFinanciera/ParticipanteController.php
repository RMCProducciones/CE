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

use AppBundle\Entity\Participante;


use AppBundle\Form\GestionFinanciera\ParticipanteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ParticipanteController extends Controller
{

    
    /**
     * @Route("/gestion-financiera/participante/gestion", name="participanteGestion")
     */
    public function participanteGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $participantes= $em->getRepository('AppBundle:Participante')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera/Participante:participante-gestion.html.twig', array( 'participantes' => $participantes));
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
        
        return $this->render('AppBundle:GestionFinanciera/Participante:participante-nuevo.html.twig', array('form' => $form->createView()));
    } 
}

