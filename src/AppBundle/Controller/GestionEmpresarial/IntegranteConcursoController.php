<?php

namespace AppBundle\Controller\GestionEmpresarial;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Integrante;
use AppBundle\Entity\IntegranteSoporte;


use AppBundle\Form\GestionEmpresarial\IntegranteType;
use AppBundle\Form\GestionEmpresarial\IntegranteSoporteType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class IntegranteConcursoController extends Controller
{
    
	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/gestion", name="integranteGestion")
     */
    public function integrantesGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        
		$integrantes = $em->getRepository('AppBundle:Integrante')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')
        );			
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/IntegrantesComites:integrante-gestion.html.twig', 
            array(
                'integrantes' => $integrantes,                  
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrantes/nuevo", name="integranteNuevo")
     */
    public function integrantesNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $integrante = new Integrante();        
        
        $form = $this->createForm(new IntegranteType(), $integrante);

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
            // data is an array with "name", "email", and "message" keys
            $integrante= $form->getData();

            $integrante->setActive(true);
            $integrante->setFechaCreacion(new \DateTime());


            
            $em->persist($integrante);
            $em->flush();

            return $this->redirectToRoute('integranteGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/IntegrantesComites:integrantes-nuevo.html.twig', 
            array('form' => $form->createView()));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/editar", name="integranteEditar")
     */
    public function integranteEditarAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();
        $integrantes = new Integrante();

        $integrantes = $em->getRepository('AppBundle:Integrante')->findOneBy(
            array('id' => $idIntegrante)
        );
        //echo $integrantes->getPertenenciaEtnica();
        $form = $this->createForm(new IntegranteType(), $integrantes);
        
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

            $integrantes = $form->getData();

            $integrantes->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $integrantes->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('integranteGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/IntegrantesComites:integrante-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idIntegrante' => $idIntegrante,
                    'integrantes' => $integrantes,
            )
        );

               
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/eliminar", name="integranteEliminar")
     */
    public function IntegranteEliminarAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();
        $integrante = new Integrante();

        $integrante = $em->getRepository('AppBundle:Integrante')->find($idIntegrante);              

        $em->remove($integrante);
        $em->flush();

        return $this->redirect($this->generateUrl('integranteGestion'));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/documentos-soporte", name="integranteSoporte")
     */
    public function integranteSoporteAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();

        $integranteSoporte = new IntegranteSoporte();
        
        $form = $this->createForm(new IntegranteSoporteType(), $integranteSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
            array('active' => '1', 'integrante' => $idIntegrante),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
            array('active' => '0', 'integrante' => $idIntegrante),
            array('fecha_creacion' => 'ASC')
        );
        
        $integrante = $em->getRepository('AppBundle:Integrante')->findOneBy(
            array('id' => $idIntegrante)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $integranteSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );

                echo $integranteSoporte->getTipoSoporte()->getDescripcion();
                
                $actualizarIntegranteSoportes = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
                    array(
                        'active' => '1' ,                         
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'integrante' => $idIntegrante
                    )
                );  

            
                foreach ($actualizarIntegranteSoportes as $actualizarIntegranteSoporte){
                    echo $actualizarIntegranteSoporte->getId()." ".$actualizarIntegranteSoporte->getTipoSoporte()."<br />";
                    $actualizarIntegranteSoporte->setFechaModificacion(new \DateTime());
                    $actualizarIntegranteSoporte->setActive(0);
                    $em->flush();
                }
                
                $integranteSoporte->setIntegrante($integrante);
                $integranteSoporte->setActive(true);
                $integranteSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($integranteSoporte);
                $em->flush();

                return $this->redirectToRoute('integranteSoporte', array( 'idIntegrante' => $idIntegrante));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/IntegrantesComites:integrante-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/documentos-soporte/{idIntegranteSoporte}/borrar", name="integranteSoporteBorrar")
     */
    public function integranteSoporteBorrarAction(Request $request, $idIntegrante, $idIntegranteSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $integranteSoporte = new IntegranteSoporte();
        
        $integranteSoporte = $em->getRepository('AppBundle:IntegranteSoporte')->findOneBy(
            array('id' => $idIntegranteSoporte)
        );

        echo $idIntegranteSoporte;
        
        $integranteSoporte->setFechaModificacion(new \DateTime());
        $integranteSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('integranteSoporte', array( 'idIntegrante' => $idIntegrante));
        
    }
}