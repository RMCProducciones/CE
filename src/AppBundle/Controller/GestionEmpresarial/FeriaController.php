<?php

namespace AppBundle\Controller\GestionEmpresarial;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Feria;

use AppBundle\Entity\FeriaSoporte;




use AppBundle\Form\GestionEmpresarial\FeriaSoporteType;
use AppBundle\Form\GestionEmpresarial\FeriaType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class FeriaController extends Controller
{
/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/gestion", name="feriaGestion")
     */
    public function feriaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ferias = $em->getRepository('AppBundle:Feria')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-gestion.html.twig', array( 'ferias' => $ferias));
    }


/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/nuevo", name="feriaNuevo")
     */
    public function feriaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $feria= new Feria();
        
        $form = $this->createForm(new FeriaType(), $feria);
        
        $form->add(
            'guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $feria = $form->getData();


            $feria->setActive(true);
            $feria->setFechaCreacion(new \DateTime());
            $em->persist($feria);
            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-nuevo.html.twig', array('form' => $form->createView()));
    }





/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/eliminar", name="feriaEliminar")
     */
    public function feriaEliminarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->find($idFeria);              

        $em->remove($feria);
        $em->flush();

        return $this->redirect($this->generateUrl('feriaGestion'));

    }



/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/documentos-soporte", name="feriaSoporte")
     */
    public function feriaSoporteAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();

        $feriaSoporte = new FeriaSoporte();
        
        $form = $this->createForm(new FeriaSoporteType(), $feriaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '1', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '0', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );
        
        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $feriaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarFeriaSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'feria' => $idFeria
                    )
                );  
            
                foreach ($actualizarFeriaSoportes as $actualizarFeriaSoporte){
                    echo $actualizarFeriaSoporte->getId()." ".$actualizarFeriaSoporte->getTipoSoporte()."<br />";
                    $actualizarFeriaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarFeriaSoporte->setActive(0);
                    $em->flush();
                }
                
                $feriaSoporte->setFeria($feria);
                $feriaSoporte->setActive(true);
                $feriaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($feriaSoporte);
                $em->flush();

                return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/documentos-soporte/{idFeriaSoporte}/borrar", name="feriaSoporteBorrar")
     */
    public function feriaSoporteBorrarAction(Request $request, $idFeria, $idFeriaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $FeriaSoporte = new FeriaSoporte();
        
        $feriaSoporte = $em->getRepository('AppBundle:FeriaSoporte')->findOneBy(
            array('id' => $idFeriaSoporte)
        );
        
        $feriaSoporte->setFechaModificacion(new \DateTime());
        $feriaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
        
    }



/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/editar", name="feriaEditar")
     */
    public function feriaEditarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        //echo $integrantes->getPertenenciaEtnica();
        $form = $this->createForm(new FeriaType(), $feria);
        
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

            $feria = $form->getData();

            $feria->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idFeria' => $idFeria,
                    'feria' => $feria,
            )
        );

               
    }


}
