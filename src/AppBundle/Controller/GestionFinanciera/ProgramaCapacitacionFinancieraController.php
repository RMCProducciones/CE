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
use AppBundle\Entity\AsignacionBeneficiarioRutaFinanciera;
use AppBundle\Entity\Grupo;


use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraSoporteType;
use AppBundle\Form\GestionFinanciera\ProgramaCapacitacionFinancieraFilterType;
use AppBundle\Form\GestionFinanciera\BeneficiarioPCFFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ProgramaCapacitacionFinancieraController extends Controller
{
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/gestion", name="programaCapacitacionFinancieraGestion")
     */
    public function programaCapacitacionFinancieraGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$programaCapacitacionFinancieras= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
            array('active' => 1)            
        );*/
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:ProgramaCapacitacionFinanciera')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new ProgramaCapacitacionFinancieraFilterType());

    
        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);           
        }

        $filterBuilder->andWhere('q.active = 1');
        
        if (isset($_GET['selMunicipio']) && $_GET['selMunicipio'] != "?") {
             $filterBuilder->andWhere('m.id = :idMunicipio')
            ->setParameter('idMunicipio', $_GET['selMunicipio']);
        }
        else{
            if (isset($_GET['selDepartamento']) && $_GET['selDepartamento'] != "?") {
                $filterBuilder->andWhere('d.id = :idDepartamento')
                ->setParameter('idDepartamento', $_GET['selDepartamento']);
            }
            if (isset($_GET['selZona']) && $_GET['selZona'] != "?") {
                $filterBuilder->andWhere('z.id = :idZona')
                ->setParameter('idZona', $_GET['selZona']);
            }      
        }

        //var_dump($filterBuilder->getDql());
        //die("");

        $query = $filterBuilder->getQuery();

         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionFinanciera/ProgramaCapacitacion:capacitacion-financiera-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'programaCapacitacionFinancieras' => $query,
                    'pagination' => $pagination
                )
            );
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

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $programaCapacitacionFinanciera->setUsuarioCreacion($usuario);


            
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

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $programaCapacitacionFinanciera->setUsuarioModificacion($usuario);


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
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

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
                        'dominio' => 'programaCapacitacionFinanciera_tipo_soporte'
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
                    $actualizarProgramaCapacitacionFinancieraSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $programaCapacitacionFinancieraSoporte->setProgramaCapacitacionFinanciera($programaCapacitacionFinanciera);
                $programaCapacitacionFinancieraSoporte->setActive(true);
                $programaCapacitacionFinancieraSoporte->setFechaCreacion(new \DateTime());
                $programaCapacitacionFinancieraSoporte->setUsuarioCreacion($usuario);

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
                'histotialSoportes' => $histotialSoportes,
                'idPCF' => $idPCF
            )
        );
        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/documentos-soporte/{idPCFSoporte}/descargar", name="programaCapacitacionFinancieraSoporteRecuperarArchivo")
     */
    public function ProgramaCapacitacionFinancieraSoporteDescargarAction(Request $request, $idPCF, $idPCFSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idPCFSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/documentos-soporte/{idPCFSoporte}/borrar", name="programaCapacitacionFinancieraSoporteBorrar")
     */
    public function programaCapacitacionFinancieraSoporteBorrarAction(Request $request, $idPCF, $idPCFSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $programaCapacitacionFinancieraSoporte = new ProgramaCapacitacionFinancieraSoporte();
        
        $programaCapacitacionFinancieraSoporte = $em->getRepository('AppBundle:ProgramaCapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idPCFSoporte)
        );
        
        $programaCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
        $programaCapacitacionFinancieraSoporte->setActive(0);
        $programaCapacitacionFinancieraSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('programaCapacitacionFinancieraSoporte', array( 'idPCF' => $idPCF));
        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/ruta-financiera/gestion", name="rutaProgramaCapacitacionFinancieraGestion")
     */
    public function rutaProgramaCapacitacionFinancieraGestionAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();
        /*$programaCapacitacionFinancieras= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBY(
            array('active' => 1)            
        );*/
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Municipio')
            ->createQueryBuilder('q')            
            ->innerJoin("q.departamento", "d")
            ->innerJoin("q.zona", "z");

        $form = $this->get('form.factory')->create(new ProgramaCapacitacionFinancieraFilterType());

    
        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);           
        }

        $filterBuilder->andWhere('q.active = 1');
        
        if (isset($_GET['selMunicipio']) && $_GET['selMunicipio'] != "?") {
             $filterBuilder->andWhere('m.id = :idMunicipio')
            ->setParameter('idMunicipio', $_GET['selMunicipio']);
        }
        else{
            if (isset($_GET['selDepartamento']) && $_GET['selDepartamento'] != "?") {
                $filterBuilder->andWhere('d.id = :idDepartamento')
                ->setParameter('idDepartamento', $_GET['selDepartamento']);
            }
            if (isset($_GET['selZona']) && $_GET['selZona'] != "?") {
                $filterBuilder->andWhere('z.id = :idZona')
                ->setParameter('idZona', $_GET['selZona']);
            }      
        }

        //var_dump($filterBuilder->getDql());
        //die("");

        $query = $filterBuilder->getQuery();

         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionFinanciera/RutaFinanciera:ruta-financiera-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'municipios' => $query,
                    'pagination' => $pagination,
                    'idPCF' => $idPCF
                )
            );
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/ruta-financiera-municipio/{idMunicipio}/asignacion-beneficiarios", name="rutaPCFBeneficiariosGestion")
     */
    public function beneficiarioCapacitacionFinancieraAction(Request $request, $idPCF, $idMunicipio)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $programaCapacitacion = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBy(
            array('id' => $idPCF)
        );                     

        $municipio = $em->getRepository('AppBundle:Municipio')->findOneBy(
            array('id' => $idMunicipio)
        );

        $asignacionesBeneficiariosRutaPCF = $em->getRepository('AppBundle:AsignacionBeneficiarioRutaFinanciera')->findBy(
            array('programaCapacitacionFinanciera' => $idPCF,
                  'municipio' => $idMunicipio)
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findBy(
            array('municipio' => $idMunicipio));

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioRutaFinanciera abc WHERE beneficiario = abc.beneficiario AND abc.programaCapacitacionFinanciera = :programaCapacitacionFinanciera) AND b.active = 1');
        $query->setParameter(':programaCapacitacionFinanciera', $programaCapacitacion);        
        $beneficiarios = $query->getResult();

        $query1 = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios,
                  'grupo' => $grupo));

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new BeneficiarioPCFFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query1->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        /*$filterBuilder->andwhere('q.programaCapacitacionFinanciera = :idProgramaCapacitacionFinanciera')
        ->setParameter('idProgramaCapacitacionFinanciera', $idGrupo)
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo)')
        ->setParameter(':grupo', $grupo);

        $query = $filterBuilder->getQuery();*/



        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query1, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionFinanciera/RutaFinanciera:asignacion-beneficiario-ruta-financiera-gestion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query1,
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosRutaPCF,
                'idPCF' => $idPCF,
                'idMunicipio' => $idMunicipio,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                
            ));        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario/{idBeneficiario}/asignar", name="beneficiarioCapacitacionFinancieraAsignar")
     */
    public function beneficiarioCapacitacionFinancieraAsignarAction(Request $request, $idPCF, $idCapacitacion, $idBeneficiario)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacion)
        );

        $asignacionesBeneficiariosPCF = new AsignacionBeneficiarioProgramaCapacitacionFinanciera();      

        $asignacionesBeneficiariosPCF->setProgramaCapacitacionFinanciera($capacitacionFinanciera);        
        $asignacionesBeneficiariosPCF->setBeneficiario($beneficiario);
        $asignacionesBeneficiariosPCF->setActive(true);
        $asignacionesBeneficiariosPCF->setFechaCreacion(new \DateTime());
        $asignacionesBeneficiariosPCF->setUsuarioCreacion($usuario);

        $em->persist($asignacionesBeneficiariosPCF);
        $em->flush();

        $this->addFlash('success', 'Beneficiario asignado');            

        return $this->redirectToRoute('beneficiarioCapacitacionFinancieraGestion', 
            array(
                'idPCF' => $idPCF,          
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosPCF,                
                'idCapacitacion' => $idCapacitacion
            ));        
        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario/{idBeneficiarioPCF}/eliminar", name="beneficiarioCapacitacionFinancieraEliminar")
     */
    public function beneficiarioCapacitacionFinancieraEliminarAction(Request $request, $idPCF, $idCapacitacion, $idBeneficiarioPCF)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesBeneficiariosPCF = $em->getRepository('AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera')->find($idBeneficiarioPCF); 

        $em->remove($asignacionesBeneficiariosPCF);
        $em->flush();

        return $this->redirectToRoute('beneficiarioCapacitacionFinancieraGestion',
            array(
                'idPCF' => $idPCF,
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosPCF,
                'idCapacitacion' => $idCapacitacion
            ));      
        
    }   
    

}

