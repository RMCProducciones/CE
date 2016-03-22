<?php

namespace AppBundle\Controller\GestionConocimiento;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Capacitacion;
use AppBundle\Entity\CapacitacionSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\CapacitacionType;
use AppBundle\Form\GestionConocimiento\CapacitacionSoporteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class CapacitacionController extends Controller
{
    	
	/**
     * @Route("/gestion-conocimiento/capacitacion/gestion", name="capacitacionGestion")
     */
    public function capacitacionGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $capacitaciones= $em->getRepository('AppBundle:Capacitacion')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento/Capacitacion:capacitacion-gestion.html.twig', array( 'capacitaciones' => $capacitaciones));
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
        
        return $this->render('AppBundle:GestionConocimiento/Capacitacion:capacitacion-nuevo.html.twig', array('form' => $form->createView()));
    } 


  /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/editar", name="capacitacionEditar")
     */
    public function capacitacionEditarAction(Request $request, $idCapacitacion)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();

        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->findOneBy(
            array('id' => $idCapacitacion)
        );

        $form = $this->createForm(new CapacitacionType(), $capacitacion);
        
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

            $capacitacion = $form->getData();

            

            $capacitacion->setFechaModificacion(new \DateTime());

  

            $em->flush();

            return $this->redirectToRoute('capacitacionGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Capacitacion:capacitacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCapacitacion' => $idCapacitacion,
                    'capacitacion' => $capacitacion,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/eliminar", name="capacitacionEliminar")
     */
    public function capacitacionEliminarAction(Request $request, $idCapacitacion)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacion = new Capacitacion();

        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->find($idCapacitacion);              

        $em->remove($capacitacion);
        $em->flush();

        return $this->redirect($this->generateUrl('capacitacionGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/documentos-soporte", name="capacitacionSoporte")
     */
    public function capacitacionSoporteAction(Request $request, $idCapacitacion)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionSoporte = new CapacitacionSoporte();
        
        $form = $this->createForm(new CapacitacionSoporteType(), $capacitacionSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
            array('active' => '1', 'capacitacion' => $idCapacitacion),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
            array('active' => '0', 'capacitacion' => $idCapacitacion),
            array('fecha_creacion' => 'ASC')
        );
        
        $capacitacion = $em->getRepository('AppBundle:Capacitacion')->findOneBy(
            array('id' => $idCapacitacion)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $capacitacionSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarCapacitacionSoportes = $em->getRepository('AppBundle:CapacitacionSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'capacitacion' => $idCapacitacion
                    )
                );  
            
                foreach ($actualizarCapacitacionSoportes as $actualizarCapacitacionSoporte){
                    echo $actualizarCapacitacionSoporte->getId()." ".$actualizarCapacitacionSoporte->getTipoSoporte()."<br />";
                    $actualizarCapacitacionSoporte->setFechaModificacion(new \DateTime());
                    $actualizarCapacitacionSoporte->setActive(0);
                    $em->flush();
                }
                
                $capacitacionSoporte->setEvento($capacitacion);
                $capacitacionSoporte->setActive(true);
                $capacitacionSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($capacitacionSoporte);
                $em->flush();

                return $this->redirectToRoute('capacitacionSoporte', array( 'idCapacitacion' => $idCapacitacion));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Capacitacion:capacitacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-conocimiento/capacitacion/{idCapacitacion}/documentos-soporte/{idCapacitacionSoporte}/borrar", name="capacitacionSoporteBorrar")
     */
    public function capacitacionSoporteBorrarAction(Request $request, $idCapacitacion, $idCapacitacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $capacitacionSoporte = new CapacitacionSoporte();
        
        $capacitacionSoporte = $em->getRepository('AppBundle:CapacitacionSoporte')->findOneBy(
            array('id' => $idCapacitacionSoporte)
        );
        
        $capacitacionSoporte->setFechaModificacion(new \DateTime());
        $capacitacionSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('capacitacionSoporte', array( 'idCapacitacion' => $idCapacitacion));
        
    }   
		
}
