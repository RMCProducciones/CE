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

use AppBundle\Entity\ActividadConcurso;
use AppBundle\Entity\ActividadSoporte;


use AppBundle\Form\GestionEmpresarial\ActividadConcursoType;
use AppBundle\Form\GestionEmpresarial\ActividadSoporteType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class ActividadController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-actividad", name="actividadGestion")
     */
   public function actividadGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actividad = $em->getRepository('AppBundle:ActividadConcurso')->findBY(
            array('active' => 1)
          
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Actividad:actividad-gestion.html.twig', array( 'actividad' => $actividad));
    }

    
     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividad/nuevo", name="actividadConcurso")
     */
    public function actividadConcursoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadconcurso = new ActividadConcurso();
        
        $form = $this->createForm(new ActividadConcursoType(), $actividadconcurso);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $actividadconcurso = $form->getData();

            $actividadconcurso->setActive(true);
            $actividadconcurso->setFechaCreacion(new \DateTime());


            
            $em->persist($actividadconcurso);
            $em->flush();

            return $this->redirectToRoute('actividadGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Actividad:actividad-nuevo.html.twig', array('form' => $form->createView()));
    } 

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividad/{idActividad}/editar", name="actividadEditar")
     */
    public function actividadEditarAction(Request $request, $idActividad)
    {
        $em = $this->getDoctrine()->getManager();
        $actividad = new ActividadConcurso();

        $actividad = $em->getRepository('AppBundle:Actividadconcurso')->findOneBy(
            array('id' => $idActividad)
        );

        $form = $this->createForm(new ActividadConcursoType(), $actividad);
        
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

            $actividad = $form->getData();

            $actividad->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('actividadGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Actividad:actividad-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idActividad' => $idActividad,
                    'actividad' => $actividad,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividad/{idActividad}/eliminar", name="actividadEliminar")
     */
    public function actividadEliminarAction(Request $request, $idActividad)
    {
        $em = $this->getDoctrine()->getManager();
        $actividad = new ActividadConcurso();

        $actividad = $em->getRepository('AppBundle:ActividadConcurso')->find($idActividad);              

        $em->remove($actividad);
        $em->flush();

        return $this->redirect($this->generateUrl('actividadGestion'));

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividad/{idActividad}/documentos-soporte", name="actividadSoporte")
     */
    public function actividadSoporteAction(Request $request, $idActividad)
    {
        $em = $this->getDoctrine()->getManager();

        $actividadSoporte = new ActividadSoporte();
        
        $form = $this->createForm(new ActividadSoporteType(), $actividadSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ActividadSoporte')->findBy(
            array('active' => '1', 'actividad' => $idActividad),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ActividadSoporte')->findBy(
            array('active' => '0', 'actividad' => $idActividad),
            array('fecha_creacion' => 'ASC')
        );
        
        $actividad = $em->getRepository('AppBundle:ActividadConcurso')->findOneBy(
            array('id' => $idActividad)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $actividadSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarActividadSoportes = $em->getRepository('AppBundle:ActividadSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'actividad' => $idActividad
                    )
                );  
            
                foreach ($actualizarActividadSoportes as $actualizarActividadSoporte){
                    echo $actualizarActividadSoporte->getId()." ".$actualizarActividadSoporte->getTipoSoporte()."<br />";
                    $actualizarActividadSoporte->setFechaModificacion(new \DateTime());
                    $actualizarActividadSoporte->setActive(0);
                    $em->flush();
                }
                
                $actividadSoporte->setActividadConcurso($actividad);
                $actividadSoporte->setActive(true);
                $actividadSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($actividadSoporte);
                $em->flush();

                return $this->redirectToRoute('actividadSoporte', array( 'idActividad' => $idActividad));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Actividad:actividad-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividad/{idActividad}/documentos-soporte/{idActividadSoporte}/borrar", name="actividadSoporteBorrar")
     */
    public function actividadSoporteBorrarAction(Request $request, $idActividad, $idActividadSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $actividadSoporte = new ActividadSoporte();
        
        $actividadSoporte = $em->getRepository('AppBundle:ActividadSoporte')->findOneBy(
            array('id' => $idActividadSoporte)
        );
        
        $actividadSoporte->setFechaModificacion(new \DateTime());
        $actividadSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('actividadSoporte', array( 'idActividad' => $idActividad));
        
    }

    


}
