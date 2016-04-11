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

use AppBundle\Entity\Evento;
use AppBundle\Entity\EventoSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\EventoType;
use AppBundle\Form\GestionConocimiento\EventoSoporteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class EventoController extends Controller
{	
	/**
     * @Route("/gestion-conocimiento/evento/gestion", name="eventoGestion")
     */
    public function eventoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $eventos= $em->getRepository('AppBundle:Evento')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionConocimiento/Evento:evento-gestion.html.twig', array( 'eventos' => $eventos));
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
        
        return $this->render('AppBundle:GestionConocimiento/Evento:evento-nuevo.html.twig', array('form' => $form->createView()));
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
            'AppBundle:GestionConocimiento/Evento:evento-editar.html.twig', 
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
                        'dominio' => 'evento_tipo_soporte'
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
            'AppBundle:GestionConocimiento/Evento:evento-soporte.html.twig', 
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
