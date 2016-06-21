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

use AppBundle\Entity\Comite;
use AppBundle\Entity\ComiteSoporte;
use AppBundle\Entity\DocumentoSoporte;
use AppBundle\Entity\Listas;
use AppBundle\Entity\Integrante;
use AppBundle\Entity\AsignacionIntegranteComite;
use AppBundle\Entity\AsignacionGrupoComite;
use AppBundle\Entity\Grupo;



use AppBundle\Form\GestionEmpresarial\ComiteType;
use AppBundle\Form\GestionEmpresarial\ComiteSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolType;





/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class ComiteController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/gestion", name="comiteGestion")
     */
    public function ComiteGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comites = $em->getRepository('AppBundle:Comite')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $comites, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:comite-gestion.html.twig', 
            array( 'comites' => $comites,
                'pagination' => $pagination
                )
            );
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/gestion/{idComite}", name="Comite")
     */
    public function ComiteAction($idComite)
    {
        $em = $this->getDoctrine()->getManager();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

        //$elementos = $query->getResult();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        
        return new Response('{"": ' . $serializer->serialize($comite, 'json') . '}');

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/nuevo", name="comiteNuevo")
     */
    public function comiteNuevoAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $comite = new Comite();
        
        $form = $this->createForm(new ComiteType(), $comite);

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
            // data is an array with "name", "email", and "message" keys
            $comite = $form->getData();

            $comite->setActive(true);
            $comite->setFechaCreacion(new \DateTime());

            
            $em->persist($comite);
            $em->flush();

            return $this->redirectToRoute('comiteGestion');
        }
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:comite-nuevo.html.twig', 
            array(
                'form' => $form->createView()
            )
        );
    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/editar", name="comiteEditar")
     */
    public function comiteEditarAction(Request $request, $idComite)
    {
        
        $em = $this->getDoctrine()->getManager();
        $comite = new Comite();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );
        
        $form = $this->createForm(new ComiteType(), $comite);

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
            $comite = $form->getData();

            $comite->setActive(true);
            $comite->setFechaCreacion(new \DateTime());

            $em->persist($comite);
            $em->flush();

            return $this->redirectToRoute('comiteGestion');
        }


        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:comite-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idComite' => $idComite,
                    'comite' => $comite
            )
        );
        

    }   

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/eliminar", name="comiteEliminar")
     */
    public function ComiteEliminarAction(Request $request, $idComite)
    {
        $em = $this->getDoctrine()->getManager();
        $comite = new Comite();

        $comite = $em->getRepository('AppBundle:Comite')->find($idComite);              

        $em->remove($comite);
        $em->flush();

        return $this->redirect($this->generateUrl('comiteGestion'));

    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/documentos-soporte", name="comiteSoporte")
     */
    public function comiteSoporteAction(Request $request, $idComite)
    {
        $em = $this->getDoctrine()->getManager();

        $comiteSoporte = new ComiteSoporte();
        
        $form = $this->createForm(new ComiteSoporteType(), $comiteSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ComiteSoporte')->findBy(
            array('active' => '1', 'comite' => $idComite),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ComiteSoporte')->findBy(
            array('active' => '0', 'comite' => $idComite),
            array('fecha_creacion' => 'ASC')
        );
        
        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $comiteSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'concurso_tipo_soporte'
                    )
                );
                
                $actualizarComiteSoportes = $em->getRepository('AppBundle:ComiteSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'comite' => $idComite
                    )
                );  
            
                foreach ($actualizarComiteSoportes as $actualizarComiteSoporte){
                    echo $actualizarComiteSoporte->getId()." ".$actualizarComiteSoporte->getTipoSoporte()."<br />";
                    $actualizarComiteSoporte->setFechaModificacion(new \DateTime());
                    $actualizarComiteSoporte->setActive(0);
                    $em->flush();
                }
                
                $comiteSoporte->setComite($comite);
                $comiteSoporte->setActive(true);
                $comiteSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($comiteSoporte);
                $em->flush();

                return $this->redirectToRoute('comiteSoporte', array( 'idComite' => $idComite) );
            }
        }   
        

        //return new Response("Hola mundo");
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:comite-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idComite' => $idComite
            )
        );
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/documentos-soporte/{idComiteSoporte}/borrar", name="comiteSoporteBorrar")
     */
    public function comiteSoporteBorrarAction(Request $request, $idComite, $idComiteSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $comiteSoporte = new ComiteSoporte();
        
        $comiteSoporte = $em->getRepository('AppBundle:ComiteSoporte')->findOneBy(
            array('id' => $idComiteSoporte)
        );
        
        $comiteSoporte->setFechaModificacion(new \DateTime());
        $comiteSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('comiteSoporte', array( 'idComite' => $idComite));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/revisar", name="comiteIntegranteRevisar")
     */
    public function comiteIntegranteRevisarAction(Request $request, $idComite)
    {
        $em = $this->getDoctrine()->getManager();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

        //echo $idComite;

        if ($request->getMethod() == 'POST') {


            if(isset($_POST["idRolIntegrante"])){


                $asignacionIntegranteComite = new AsignacionIntegranteComite();

                $rolIntegrante = $em->getRepository('AppBundle:Listas')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["rol"])
                );  

                $integrante = $em->getRepository('AppBundle:Integrante')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["idIntegrante"])
                );  

                $asignacionIntegranteComite->setRol($rolIntegrante);
                $asignacionIntegranteComite->setComite($comite);
                $asignacionIntegranteComite->setIntegrante($integrante);

                $asignacionIntegranteComite->setFechaCreacion(new \DateTime());
                $asignacionIntegranteComite->setActive(0);


                $em->persist($asignacionIntegranteComite);
                $em->flush();

            }

        }       

        $asignacionesIntegranteComite = new AsignacionIntegranteComite();

        $asignacionesIntegranteComite = $em->getRepository('AppBundle:AsignacionIntegranteComite')->findBy(
            array('comite' => $comite)
        );  

        $query = $em->createQuery('SELECT i FROM AppBundle:Integrante i WHERE i.id NOT IN (SELECT integrante.id FROM AppBundle:Integrante integrante JOIN AppBundle:AsignacionIntegranteComite aic WHERE integrante = aic.integrante AND aic.comite = :comite) AND i.active = 1');
        $query->setParameter('comite', $comite);

        $integrantes = $query->getResult();         
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:jurados-comite-gestion-asignacion.html.twig', 
            array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteComite' => $asignacionesIntegranteComite,
                'idComite' => $idComite
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idIntegrante}/formulario/revisar", name="formularioRolIntegranteComiteRevisar")
     */
    public function formularioRolIntegranteComiteRevisarAction(Request $request, $idComite, $idIntegrante)
    {

        $em = $this->getDoctrine()->getManager();

        $asignacionesIntegranteComite = new AsignacionIntegranteComite();

        $form = $this->createForm(new ListaRolType(), $asignacionesIntegranteComite);

        $form->add(
                'idIntegrante', 
                'hidden', 
                array(
                    'mapped' => false,
                    'attr' => array(
                        'value' => $idIntegrante,
                        'style' => 'visibility:hidden'
                    )
                )
        );

        $form->add(
            'Asignar_'.$idIntegrante, 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:asignarRolIntegranteComite.html.twig',
            array(
                'form' => $form->createView(),
                'idIntegrante' => $idIntegrante,
                'idComite' => $idComite
                )
        );
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idIntegrante}/nueva-asignacion/Revisar", name="comiteAsignarIntegranteRevisar")
     */
    public function comiteAsignarIntegranteRevisarAction($idComite, $idIntegrante)
    {

        $em = $this->getDoctrine()->getManager();

        $integrantes = $em->getRepository('AppBundle:Integrante')->findOneBy(
            array('id' => $idIntegrante)
        );  

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );  
           
        $asignacionesIntegranteComite = new AsignacionIntegranteComite();

        $asignacionesIntegranteComite->setIntegrante($integrantes);
        $asignacionesIntegranteComite->setComite($comite);           
        $asignacionesIntegranteComite->setActive(true);
        $asignacionesIntegranteComite->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesIntegranteComite);
        $em->flush();



        return $this->redirectToRoute('comiteIntegrante', 
            array(
                'integrantes' => $integrantes, 
                'asignacionesIntegranteComite' => $asignacionesIntegranteComite,
                'idComite' => $idComite
            ));        
        
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idAsignacionIntegranteComite}/eliminar/Revisar", name="comiteEliminarIntegranteRevisar")
     */
    public function comiteEliminarIntegranteRevisarAction(Request $request, $idComite, $idAsignacionIntegranteComite)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionIntegranteComite = new AsignacionIntegranteComite();

        $asignacionIntegranteComite = $em->getRepository('AppBundle:AsignacionIntegranteComite')->find($idAsignacionIntegranteComite); 

        $integrantes = $em->getRepository('AppBundle:Integrante')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')            
        );  

        $em->remove($asignacionIntegranteComite);
        $em->flush();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

        $asignacionesIntegranteComite = $em->getRepository('AppBundle:AsignacionIntegranteComite')->findBy(
            array('comite' => $comite)
        );  

        return $this->redirectToRoute('comiteIntegrante',
             array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteComite' => $asignacionIntegranteComite,
                'idComite' => $idComite
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-grupo", name="comiteGrupo")
     */
    public function comiteGrupoAction($idComite)
    {
        $em = $this->getDoctrine()->getManager();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

        $asignacionesGrupoComite = $em->getRepository('AppBundle:AsignacionGrupoComite')->findBy(
            array('comite' => $comite)
        );  

        $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoComite agc WHERE grupo = agc.grupo AND agc.comite = :comite) AND g.active = 1');
        $query->setParameter('comite', $comite);

        $grupos = $query->getResult();     
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Comite:grupo-comite-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoComite' => $asignacionesGrupoComite,
                'idComite' => $idComite
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="comiteAsignarGrupo")
     */
    public function comiteAsignarGrupoAction($idComite, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );  
           
        $asignacionesGrupoComite = new AsignacionGrupoComite();

        $asignacionesGrupoComite->setGrupo($grupos);
        $asignacionesGrupoComite->setComite($comite);           
        $asignacionesGrupoComite->setActive(true);
        $asignacionesGrupoComite->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesGrupoComite);
        $em->flush();



        return $this->redirectToRoute('comiteGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoComite' => $asignacionesGrupoComite,
                'idComite' => $idComite
            ));        
        
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-grupo/{idAsignacionGrupoComite}/eliminar", name="comiteEliminarGrupo")
     */
    public function comiteEliminarGrupoAction(Request $request, $idComite, $idAsignacionGrupoComite)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoComite = new AsignacionGrupoComite();

        $asignacionesGrupoComite = $em->getRepository('AppBundle:AsignacionGrupoComite')->find($idAsignacionGrupoComite); 

        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesGrupoComite);
        $em->flush();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

        $asignacionesGrupoComite = $em->getRepository('AppBundle:AsignacionGrupoComite')->findBy(
            array('comite' => $comite)
        );  

        return $this->redirectToRoute('comiteGrupo',
             array(
                'grupos' => $grupos,
                'asignacionesGrupoComite' => $asignacionesGrupoComite,
                'idComite' => $idComite
            ));    
        
    }
}

