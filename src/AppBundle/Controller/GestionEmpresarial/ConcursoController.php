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


use AppBundle\Entity\Concurso;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\ConcursoSoporte;



use AppBundle\Form\GestionEmpresarial\ConcursoSoporteType;
use AppBundle\Form\GestionEmpresarial\ConcursoType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ConcursoController extends Controller
{
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion", name="concursoGestion")
     */
    public function concursoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $concursos = $em->getRepository('AppBundle:Concurso')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:concurso-gestion.html.twig', array( 'concursos' => $concursos));
    }
    
       /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/nuevo", name="concursoNuevo")
     */
    public function concursoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $concurso = new Concurso();
        
        $form = $this->createForm(new ConcursoType(), $concurso);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $concurso = $form->getData();

            $concurso->setActive(true);
            $concurso->setFechaCreacion(new \DateTime());


            
            $em->persist($concurso);
            $em->flush();

            return $this->redirectToRoute('concursoGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:concurso-nuevo.html.twig', array('form' => $form->createView()));
    }   


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/editar", name="concursoEditar")
     */
    public function ConcursoEditarrAction(Request $request, $idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        $concurso = new Concurso();

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );

        $form = $this->createForm(new ConcursoType(), $concurso);
        
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

            $concurso = $form->getData();

           
            $concurso->setFechaModificacion(new \DateTime());

            $em->flush();

            return $this->redirectToRoute('concursoGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:concurso-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idConcurso' => $idConcurso,
                    'concurso' => $concurso,
            )
        );

    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/eliminar", name="concursoEliminar")
     */
    public function ConcursoEliminarAction(Request $request, $idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        $concurso = new Concurso();

        $concurso = $em->getRepository('AppBundle:Concurso')->find($idConcurso);              

        $em->remove($concurso);
        $em->flush();

        return $this->redirect($this->generateUrl('concursoGestion'));

    }



    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/documentos-soporte", name="concursoSoporte")
     */
    public function concursoSoporteAction(Request $request, $idConcurso)
    {
        $em = $this->getDoctrine()->getManager();

        $concursoSoporte = new ConcursoSoporte();
        
        $form = $this->createForm(new ConcursoSoporteType(), $concursoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ConcursoSoporte')->findBy(
            array('active' => '1', 'concurso' => $idConcurso),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ConcursoSoporte')->findBy(
            array('active' => '0', 'concurso' => $idConcurso),
            array('fecha_creacion' => 'ASC')
        );
        
        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $concursoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'concurso_tipo_soporte'
                    )
                );
                
                $actualizarConcursoSoportes = $em->getRepository('AppBundle:ConcursoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'concurso' => $idConcurso
                    )
                );  
            
                foreach ($actualizarConcursoSoportes as $actualizarConcursoSoporte){
                    echo $actualizarConcursoSoporte->getId()." ".$actualizarConcursoSoporte->getTipoSoporte()."<br />";
                    $actualizarConcursoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarConcursoSoporte->setActive(0);
                    $em->flush();
                }
                
                $concursoSoporte->setConcurso($concurso);
                $concursoSoporte->setActive(true);
                $concursoSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($concursoSoporte);
                $em->flush();

                return $this->redirectToRoute('concursoSoporte', array( 'idConcurso' => $idConcurso));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:concurso-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/documentos-soporte/{idConcursoSoporte}/borrar", name="concursoSoporteBorrar")
     */
    public function concursoSoporteBorrarAction(Request $request, $idConcurso, $idConcursoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $ConcursoSoporte = new ConcursoSoporte();
        
        $concursoSoporte = $em->getRepository('AppBundle:ConcursoSoporte')->findOneBy(
            array('id' => $idConcursoSoporte)
        );
        
        $concursoSoporte->setFechaModificacion(new \DateTime());
        $concursoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('concursoSoporte', array( 'idConcurso' => $idConcurso));
        
    }
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/asignacion-grupo", name="concursoGrupo")
     */
    public function concursoGrupoAction($idConcurso)
    {
        $em = $this->getDoctrine()->getManager();

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );

        $asignacionesGrupoConcurso = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->findBy(
            array('concurso' => $concurso)
        );  

        $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoConcurso agc WHERE grupo = agc.grupo AND agc.concurso = :concurso) AND g.active = 1');
        $query->setParameter('concurso', $concurso);

        $grupos = $query->getResult(); 
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:grupo-concurso-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoConcurso' => $asignacionesGrupoConcurso,
                'idConcurso' => $idConcurso
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="concursoAsignarGrupo")
     */
    public function concursoAsignarGrupoAction($idConcurso, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );  
           
        $asignacionesGrupoConcurso = new AsignacionGrupoConcurso();

        $asignacionesGrupoConcurso->setGrupo($grupos);
        $asignacionesGrupoConcurso->setConcurso($concurso);           
        $asignacionesGrupoConcurso->setActive(true);
        $asignacionesGrupoConcurso->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesGrupoConcurso);
        $em->flush();



        return $this->redirectToRoute('concursoGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoConcurso' => $asignacionesGrupoConcurso,
                'idConcurso' => $idConcurso
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/asignacion-grupo/{idAsignacionGrupoConcurso}/eliminar", name="concursoEliminarGrupo")
     */
    public function concursoEliminarGrupoAction(Request $request, $idConcurso, $idAsignacionGrupoConcurso)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoConcurso = new AsignacionGrupoConcurso();

        $asignacionesGrupoConcurso = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->find($idAsignacionGrupoConcurso); 

        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesGrupoConcurso);
        $em->flush();

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );

        $asignacionesGrupoConcurso = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->findBy(
            array('concurso' => $concurso)
        );  

        return $this->redirectToRoute('concursoGrupo',
             array(
                'grupos' => $grupos,
                'asignacionesGrupoConcurso' => $asignacionesGrupoConcurso,
                'idConcurso' => $idConcurso
            ));    
        
    }
    


}

