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

use AppBundle\Entity\Poliza;
use AppBundle\Entity\PolizaSoporte;
use AppBundle\Entity\DocumentoSoporte;


use AppBundle\Form\GestionFinanciera\PolizaType;
use AppBundle\Form\GestionFinanciera\PolizaSoporteType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class PolizaController extends Controller
{
     /**
     * @Route("/gestion-financiera/poliza/gestion", name="polizaGestion")
     */
    public function polizaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $polizas= $em->getRepository('AppBundle:Poliza')->findBY(
            array('active' => 1)
            
        ); 

        return $this->render('AppBundle:GestionFinanciera/Poliza:poliza-gestion.html.twig', array( 'polizas' => $polizas));
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

            return $this->redirectToRoute('polizaGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera/Poliza:poliza-nuevo.html.twig', array('form' => $form->createView()));
    }




    /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/editar", name="polizaEditar")
     */
    public function polizaEditarAction(Request $request, $idPoliza)
    {
        $em = $this->getDoctrine()->getManager();
        $poliza = new Poliza();

        $poliza = $em->getRepository('AppBundle:Poliza')->findOneBy(
            array('id' => $idPoliza)
        );

        $form = $this->createForm(new PolizaType(), $poliza);
        
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

            $poliza = $form->getData();

            $poliza->setFechaModificacion(new \DateTime());


            $em->flush();

            return $this->redirectToRoute('polizaGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/Poliza:poliza-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPoliza' => $idPoliza,
                    'poliza' => $poliza,
            )
        );

    }
/**
     * @Route("/gestion-financiera/poliza/{idPoliza}/eliminar", name="polizaEliminar")
     */
    public function polizaEliminarAction(Request $request, $idPoliza)
    {
        $em = $this->getDoctrine()->getManager();
        $poliza = new Poliza();

        $poliza = $em->getRepository('AppBundle:Poliza')->find($idPoliza);              

        $em->remove($poliza);
        $em->flush();

        return $this->redirect($this->generateUrl('polizaGestion'));

    }



/**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte", name="polizaSoporte")
     */
    public function polizaSoporteAction(Request $request, $idPoliza)
    {
        $em = $this->getDoctrine()->getManager();

        $polizaSoporte = new PolizaSoporte();
        
        $form = $this->createForm(new PolizaSoporteType(), $polizaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
            array('active' => '1', 'poliza' => $idPoliza),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
            array('active' => '0', 'poliza' => $idPoliza),
            array('fecha_creacion' => 'ASC')
        );
        
        $poliza = $em->getRepository('AppBundle:Poliza')->findOneBy(
            array('id' => $idPoliza)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $polizaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'poliza_tipo_soporte'
                    )
                );
                
                $actualizarPolizaSoportes = $em->getRepository('AppBundle:PolizaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'poliza' => $idPoliza
                    )
                );  
            
                foreach ($actualizarPolizaSoportes as $actualizarPolizaSoporte){
                    echo $actualizarPolizaSoporte->getId()." ".$actualizarPolizaSoporte->getTipoSoporte()."<br />";
                    $actualizarPolizaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarPolizaSoporte->setActive(0);
                    $em->flush();
                }
                
                $polizaSoporte->setPoliza($poliza);
                $polizaSoporte->setActive(true);
                $polizaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($polizaSoporte);
                $em->flush();

                return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera/Poliza:poliza-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/poliza/{idPoliza}/documentos-soporte/{idPolizaSoporte}/borrar", name="polizaSoporteBorrar")
     */
    public function polizaSoporteBorrarAction(Request $request, $idPoliza, $idPolizaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $poliza = new PolizaSoporte();
        
        $polizaSoporte = $em->getRepository('AppBundle:PolizaSoporte')->findOneBy(
            array('id' => $idPolizaSoporte)
        );
        
        $polizaSoporte->setFechaModificacion(new \DateTime());
        $polizaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('polizaSoporte', array( 'idPoliza' => $idPoliza));
        
    }
   }

