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


use AppBundle\Entity\Organizacion;
use AppBundle\Entity\OrganizacionSoporte;



use AppBundle\Form\GestionEmpresarial\OrganizacionType;
use AppBundle\Form\GestionEmpresarial\OrganizacionSoporteType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class OrganizacionController extends Controller
{

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/gestion", name="organizacionGestion")
     */
    public function organizacionGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-gestion.html.twig', array( 'organizaciones' => $organizaciones));
    }
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/nuevo", name="organizacionNuevo")
     */
    public function organizacionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();
        
        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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
            
            $organizacion = $form->getData();

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($organizacion);
            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-nuevo.html.twig', array('form' => $form->createView()));
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/editar", name="organizacionEditar")
     */
    public function organizacionEditarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );

        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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

            $organizacion = $form->getData();

            if($organizacion->getRural() == true){             
                $organizacion->setBarrio(null);
            }
            else
            {
                $organizacion->setCorregimiento(null);
                $organizacion->setVereda(null);
                $organizacion->setCacerio(null);
            }

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());


            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $organizacion->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idOrganizacion' => $idOrganizacion,
                    'organizacion' => $organizacion,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/eliminar", name="organizacionEliminar")
     */
    public function organizacionEliminarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->find($idOrganizacion);              

        $em->remove($organizacion);
        $em->flush();

        return $this->redirect($this->generateUrl('organizacionGestion'));

    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte", name="organizacionSoporte")
     */
    public function organizacionSoporteAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();

        $organizacionSoporte = new OrganizacionSoporte();
        
        $form = $this->createForm(new OrganizacionSoporteType(), $organizacionSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '1', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '0', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );
        
        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $organizacionSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'organizacion_tipo_soporte'
                    )
                );
                
                $actualizarOrganizacionSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'organizacion' => $idOrganizacion
                    )
                );  
            
                foreach ($actualizarOrganizacionSoportes as $actualizarOrganizacionSoporte){
                    echo $actualizarOrganizacionSoporte->getId()." ".$actualizarOrganizacionSoporte->getTipoSoporte()."<br />";
                    $actualizarOrganizacionSoporte->setFechaModificacion(new \DateTime());
                    $actualizarOrganizacionSoporte->setActive(0);
                    $em->flush();
                }
                
                $organizacionSoporte->setOrganizacion($pasantia);
                $organizacionSoporte->setActive(true);
                $organizacionSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($organizacionSoporte);
                $em->flush();

                return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte/{idOrganizacionSoporte}/borrar", name="organizacionSoporteBorrar")
     */
    public function organizacionSoporteBorrarAction(Request $request, $idOrganizacion, $idOrganizacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $OrganizacionSoporte = new OrganizacionSoporte();
        
        $organizacionSoporte = $em->getRepository('AppBundle:OrganizacionSoporte')->findOneBy(
            array('id' => $idOrganizacionSoporte)
        );
        
        $organizacionSoporte->setFechaModificacion(new \DateTime());
        $organizacionSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
        
    }

    


}
