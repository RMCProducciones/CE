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
use AppBundle\Form\GestionAdministrativa\POAType;
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
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/convocatoria/", name="convocatoriaGestion")
     */
    public function convocatoriaGestionAction($idPOA)
    {
        $em = $this->getDoctrine()->getManager();
        $convocatorias = $em->getRepository('AppBundle:Convocatoria')->findBY(
			array('poa' => $idPOA),
            array('numero' => 'ASC')
        );

        return $this->render('AppBundle:GestionAdministrativa/GestionPOA:convocatoria-gestion.html.twig', array( 'idPOA' => $idPOA, 'convocatorias' => $convocatorias));
    }

    /**
     * @Route("/gestion-administrativa/gestion-POA/POA/{idPOA}/convocatoria/nuevo/", name="convocatoriaNuevo")
     */
    public function convocatoriaNuevoAction(Request $request, $idPOA)
    {      
        $em = $this->getDoctrine()->getManager();
        $convocatorias = new Convocatoria();
        
        $form = $this->createForm(new ConvocatoriaType(), $convocatorias);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $convocatorias = $form->getData();

            $convocatorias->setActive(true);
            $convocatorias->setFechaCreacion(new \DateTime());


            
            $em->persist($convocatorias);
            $em->flush();

            return $this->redirectToRoute('convocatoriaGestion', array( 'idPOA' => $idPOA));
        }
        
        return $this->render('AppBundle:GestionAdministrativa/GestionPOA:convocatoria-nuevo.html.twig', array('form' => $form->createView(),'idPOA' => $idPOA));
    }                                                                                                                                                                                                                              
	

   
	
}
