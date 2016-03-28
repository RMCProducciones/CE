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

use AppBundle\Entity\ProgramaCapacitacionFinanciera;
use AppBundle\Entity\ProgramaCapacitacionFinancieraSoporte;
use AppBundle\Entity\DocumentoSoporte;


use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraSoporteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ProgramaCapacitacionFinancieraController extends Controller
{
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/gestion", name="programaCapacitacionFinancieraGestion")
     */
    public function programaCapacitacionFinancieraGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $programaCapacitacionFinancieras= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera/ProgramaCapacitacion:capacitacion-financiera-gestion.html.twig', array( 'programaCapacitacionFinancieras' => $programaCapacitacionFinancieras));
    }  
    
     /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/nuevo", name="programaCapacitacionFinancieraNuevo")
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
        
        return $this->render('AppBundle:GestionFinanciera/ProgramaCapacitacion:capacitacion-financiera-nuevo.html.twig', array('form' => $form->createView()));
    } 


 /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/editar", name="programaCapacitacionFinancieraEditar")
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
            'AppBundle:GestionFinanciera/ProgramaCapacitacion:capacitacion-financiera-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPCF' => $idPCF,
                    'programaCapacitacionFinanciera' => $programaCapacitacionFinanciera,
            )
        );

    }
/**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/eliminar", name="programaCapacitacionFinancieraEliminar")
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
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/documentos-soporte", name="programaCapacitacionFinancieraSoporte")
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
            'AppBundle:GestionFinanciera/ProgramaCapacitacion:capacitacion-financiera-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/documentos-soporte/{idPCFSoporte}/borrar", name="programaCapacitacionFinancieraSoporteBorrar")
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



}

