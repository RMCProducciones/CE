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
use AppBundle\Entity\AsignacionGrupoConcurso;
use AppBundle\Entity\AsignacionIntegranteComite;
use AppBundle\Entity\Comite;
use AppBundle\Entity\Integrante;
use AppBundle\Entity\Listas;



use AppBundle\Form\GestionEmpresarial\ConcursoSoporteType;
use AppBundle\Form\GestionEmpresarial\ConcursoType;
use AppBundle\Form\GestionEmpresarial\ListaRolType;
use AppBundle\Form\GestionEmpresarial\ConcursoFilterType;
use AppBundle\Form\GestionEmpresarial\ConcursoGrupoFilterType;
use AppBundle\Form\GestionEmpresarial\ConcursoIntegranteFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;






class ConcursoController extends Controller
{
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion", name="concursoGestion")
     */
    public function concursoGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /*$concursos = $em->getRepository('AppBundle:Concurso')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); */

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Concurso')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ConcursoFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");    


         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:concurso-gestion.html.twig', 
            array( 
                'form' => $form->createView(), 
                'concursos' => $query,
                'pagination' => $pagination
                )
            );
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
                'histotialSoportes' => $histotialSoportes,
                'idConcurso' => $idConcurso
            )
        );
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/documentos-soporte/{idConcursoSoporte}/descargar", name="concursoSoporteRecuperarArchivo")
     */
    public function grupoSoporteDescargarAction(Request $request, $idConcurso, $idConcursoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:ConcursoSoporte')->findOneBy(
            array('id' => $idConcursoSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
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
    public function concursoGrupoAction(Request $request, $idConcurso)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $municipioUsuario = $this->get('security.context')->getToken()->getUser()->getMunicipio();
        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
            array('id' => $idConcurso)
        );

        $asignacionesGrupoConcurso = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->findBy(
            array('concurso' => $concurso)
        );  

        $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoConcurso agc WHERE grupo = agc.grupo AND agc.concurso = :concurso) AND g.active = 1');
        $query->setParameter('concurso', $concurso);

        $grupos = $query->getResult(); 

        $form = $this->get('form.factory')->create(new ConcursoGrupoFilterType());

        $obj = new FilterLocation();

        $filterBuilder = $obj->queryFilter($request, $this, $form, $rolUsuario, $municipioUsuario, 'AppBundle:Grupo');

        $filterBuilder        
        ->andWhere('q.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoConcurso agc WHERE grupo = agc.grupo AND agc.concurso = :concurso)')
        ->setParameter('concurso', $concurso);

        $query = $filterBuilder->getQuery();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:grupo-concurso-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'grupos' => $query,
                'asignacionesGrupoConcurso' => $asignacionesGrupoConcurso,
                'idConcurso' => $idConcurso,
                'pagination1' => $pagination1,
                'departamento' => $_GET['selDepartamento'],
                'zona' => $_GET['selZona'],
                'municipio' => $_GET['selMunicipio'],
                'campoDeshabilitadoDepartamento' => $valuesFieldBlock[0],
                'campoDeshabilitadoZona' => $valuesFieldBlock[1],
                'campoDeshabilitadoMunicipio' => $valuesFieldBlock[2],
                'tipoUsuario' => $valuesFieldBlock[3]
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

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante", name="comiteIntegrante")
     */
    public function comiteIntegranteAction(Request $request, $idComite)
    {
        $em = $this->getDoctrine()->getManager();

        $comite = $em->getRepository('AppBundle:Comite')->findOneBy(
            array('id' => $idComite)
        );

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


        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Integrante')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ConcursoIntegranteFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT integrante.id FROM AppBundle:Integrante integrante JOIN AppBundle:AsignacionIntegranteComite aic WHERE integrante = aic.integrante AND aic.comite = :comite)')
        ->setParameter(':comite', $comite);

        $query = $filterBuilder->getQuery();



        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );   
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:jurados-comite-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'integrantes' => $query,
                'asignacionesIntegranteComite' => $asignacionesIntegranteComite,
                'idComite' => $idComite,
                'pagination1' => $pagination1
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idIntegrante}/formulario", name="formularioRolIntegranteComite")
     */
    public function formularioRolIntegranteComiteAction(Request $request, $idComite, $idIntegrante)
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
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Concurso:asignarRolIntegranteComite.html.twig',
            array(
                'form' => $form->createView(),
                'idIntegrante' => $idIntegrante,
                'idComite' => $idComite
                )
        );
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idIntegrante}/nueva-asignacion", name="comiteAsignarIntegrante")
     */
    public function comiteAsignarIntegranteAction($idComite, $idIntegrante)
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/{idComite}/asignacion-integrante/{idAsignacionIntegranteComite}/eliminar", name="comiteEliminarIntegrante")
     */
    public function comiteEliminarIntegranteAction(Request $request, $idComite, $idAsignacionIntegranteComite)
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

    


}

