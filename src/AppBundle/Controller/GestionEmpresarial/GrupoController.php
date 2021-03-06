<?php

namespace AppBundle\Controller\GestionEmpresarial;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use AppBundle\Entity\Grupo;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\AsignacionBeneficiarioComiteVamosBien;
use AppBundle\Entity\AsignacionBeneficiarioComiteCompras;
use AppBundle\Entity\AsignacionBeneficiarioEstructuraOrganizacional; 
use AppBundle\Entity\GrupoSoporte;
use AppBundle\Entity\Camino;
use AppBundle\Entity\Nodo;


use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolBeneficiarioType;
use AppBundle\Form\GestionEmpresarial\GrupoFilterType;
use AppBundle\Form\GestionEmpresarial\ComiteVamosBienFilterType;
use AppBundle\Form\GestionEmpresarial\EstructuraOrganizacionalFilterType;
use AppBundle\Form\GestionEmpresarial\ComiteComprasFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


    

class GrupoController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/gestion", name="grupoGestion")
     */
    public function grupoGestionAction(Request $request)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

       
        $em = $this->getDoctrine()->getManager();
       
        /*$grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

        $municipioUsuario = $this->get('security.context')->getToken()->getUser()->getMunicipio();
        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();
        
        $caminos = $em->getRepository('AppBundle:Camino')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        $form = $this->get('form.factory')->create(new GrupoFilterType());
        
        $obj = new FilterLocation();

        $filterBuilder = $obj->queryFilter($request, $this, $form, $rolUsuario, $municipioUsuario, 'AppBundle:Grupo');
                        
        $query = $filterBuilder->getQuery();
        
        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-gestion.html.twig', 
            array( 'form' => $form->createView(),
                   'grupos' => $query,
                   'caminos' => $caminos,
                   'pagination' => $pagination,
                   'departamento' => $_GET['selDepartamento'],
                   'zona' => $_GET['selZona'],
                   'municipio' => $_GET['selMunicipio'],
                   'campoDeshabilitadoDepartamento' => $valuesFieldBlock[0],
                   'campoDeshabilitadoZona' => $valuesFieldBlock[1],
                   'campoDeshabilitadoMunicipio' => $valuesFieldBlock[2],
                   'tipoUsuario' => $valuesFieldBlock[3])    
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/nuevo", name="grupoNuevo")
     */
    public function grupoNuevoAction(Request $request)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();
        $obj = new FilterLocation();
        
        $form = $this->createForm(new GrupoType(), $grupo);
        
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
            
            $grupo = $form->getData();

            if($grupo->getRural() == true){             
                //$grupo->setBarrio(null);
            }
            else
            {
                //$grupo->setCorregimiento(null);
                //$grupo->setVereda(null);
                //$grupo->setCacerio(null);
            }
            
            
            if($grupo->getTipo()->getDescripcion() == 'No Formal con negocio'|| $grupo->getTipo()->getDescripcion() == 'No Formal Sin Negocio'){
                $grupo->setNullFiguraLegalConstitucion();
                $grupo->setNumeroIdentificacionTributaria(null);
                $grupo->setFechaConstitucionLegal(null);
            }              
            $grupo->setActive(true);
            $grupo->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $grupo->setUsuarioCreacion($usuario);

            //SEGUIMIENTO, Entidad Camino

           
            $em->persist($grupo);
            $em->flush();

            $idGrupo = $grupo->getId();

            self::nodoCamino($idGrupo, 1, 2);
            
            $em->flush();

            return $this->redirectToRoute('grupoGestion', 
                array('idGrupo' => $idGrupo));
        }

        $municipioUsuario = $this->get('security.context')->getToken()->getUser()->getMunicipio();
        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);
        $valuesFieldDMZ = $obj->valuesFormDMZ($rolUsuario, $municipioUsuario);
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-nuevo.html.twig', 
            array('form' => $form->createView(),
                  'departamento' => $valuesFieldDMZ[0],
                  'zona' => $valuesFieldDMZ[1],
                  'municipio' => $valuesFieldDMZ[2],
                  'campoDeshabilitadoDepartamento' => $valuesFieldBlock[0],
                  'campoDeshabilitadoZona' => $valuesFieldBlock[1],
                  'campoDeshabilitadoMunicipio' => $valuesFieldBlock[2])
            );
    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/editar", name="grupoEditar")
     */
    public function grupoEditarAction(Request $request, $idGrupo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();
        $obj = new FilterLocation();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nit = explode("-", $grupo->getNumeroIdentificacionTributaria());

        //print_r($nit);
        //echo count($nit);

        if($grupo->getTipo()->getDescripcion() == 'No Formal con negocio'|| $grupo->getTipo()->getDescripcion() == 'No Formal Sin Negocio'){
            $nit[0] = 0;
            $nit[1] = 0;
        }

        $form = $this->createForm(new GrupoType(), $grupo);
        
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

            $grupo = $form->getData();

            if($grupo->getTipo()->getDescripcion() == 'No Formal con negocio'|| $grupo->getTipo()->getDescripcion() == 'No Formal Sin Negocio'){
                $grupo->setNullFiguraLegalConstitucion();
                $grupo->setNumeroIdentificacionTributaria(null);
                $grupo->setFechaConstitucionLegal(null);
            }  
            
            $grupo->setFechaModificacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $grupo->setUsuarioModificacion($usuario);

            $em->persist($grupo);
            $em->flush();


            if($grupo->getCodigo() != null){
                $traerGrupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
                array('id' => $idGrupo));            

            $idMunicipio = $em->getRepository('AppBundle:Municipio')->findOneBy(
                array('id' => $traerGrupo->getMunicipio()));            

            $zona = $idMunicipio->getZona()->getAbreviatura();            

            if($traerGrupo->getId()<10){
                $consecutivo = "00";
            }

            if($traerGrupo->getId() >= 10 && $traerGrupo->getId() < 100){
                $consecutivo = "0";
            }

            if($traerGrupo->getId() >= 100){
                $consecutivo = "";
            }          

            $tipoGrupo = $traerGrupo->getTipo();       

            if($tipoGrupo == "No Formal Sin Negocio"){
                $tipo = "1";                
            }

            if($tipoGrupo == "No Formal Con Negocio"){
                $tipo = "2";                
            }

            if($tipoGrupo == "Formal Sin Negocio"){
                $tipo = "3";                
            }

            if($tipoGrupo == "Formal Con Negocio"){
                $tipo = "4";                
            }

                $traerGrupo->setCodigo($zona."-".$idMunicipio->getAbreviatura()."-".$tipo."-".date_format($traerGrupo->getFechaInscripcion(), 'Y/m')."-".$consecutivo.$idGrupo);            
                $em->persist($traerGrupo);
                $em->flush();
            }

            return $this->redirectToRoute('grupoGestion');
        }

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'grupo' => $grupo,
                    'numeroIdentificacionGrupo' => $nit[0],
                    'digitoVerificacionGrupo' => $nit[1],
                    'campoDeshabilitadoDepartamento' => $valuesFieldBlock[0],
                    'campoDeshabilitadoZona' => $valuesFieldBlock[1],
                    'campoDeshabilitadoMunicipio' => $valuesFieldBlock[2]
            )
        );

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/eliminar", name="grupoEliminar")
     */
    public function grupoEliminarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->find($idGrupo);              

        $em->remove($grupo);
        $em->flush();

        return $this->redirect($this->generateUrl('grupoGestion'));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/documentos-soporte", name="grupoSoporte")
     */
    public function grupoSoporteAction(Request $request, $idGrupo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));
        

        $grupoSoporte = new GrupoSoporte();

        $form = $this->createForm(new GrupoSoporteType(), $grupoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
            array('active' => '1', 'grupo' => $idGrupo),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
            array('active' => '0', 'grupo' => $idGrupo),
            array('fecha_creacion' => 'ASC')
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {


                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(

                    array(
                        'descripcion' => $grupoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );

            
                $actualizarGrupoSoportes = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'grupo' => $idGrupo
                    )
                );  
            
                foreach ($actualizarGrupoSoportes as $actualizarGrupoSoporte){
                    echo $actualizarGrupoSoporte->getId()." ".$actualizarGrupoSoporte->getTipoSoporte()."<br />";
                    $actualizarGrupoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarGrupoSoporte->setActive(0);
                    $actualizarGrupoSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }

                $grupoSoporte->setGrupo($grupo);
                $grupoSoporte->setActive(true);
                $grupoSoporte->setFechaCreacion(new \DateTime());
                $grupoSoporte->setUsuarioCreacion($usuario);


                $em->persist($grupoSoporte);

                $em->flush();

                return $this->redirectToRoute('grupoSoporte', array( 'idGrupo' => $idGrupo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'grupo' => $grupo,
                'idGrupo' => $idGrupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/documentos-soporte/{idGrupoSoporte}/borrar", name="grupoSoporteBorrar")
     */
    public function grupoSoporteBorrarAction(Request $request, $idGrupo, $idGrupoSoporte)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));
        
        

        $grupoSoporte = new GrupoSoporte();
        
        $grupoSoporte = $em->getRepository('AppBundle:GrupoSoporte')->findOneBy(
            array('id' => $idGrupoSoporte)
        );
        
        $grupoSoporte->setFechaModificacion(new \DateTime());
        $grupoSoporte->setActive(0);
        $grupoSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('grupoSoporte', array( 'idGrupo' => $idGrupo));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/documentos-soporte/{idGrupoSoporte}/descargar", name="grupoSoporteRecuperarArchivo")
     */
    public function grupoSoporteDescargarAction(Request $request, $idGrupo, $idGrupoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:GrupoSoporte')->findOneBy(
            array('id' => $idGrupoSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        /*header("Content-Disposition: attachment; filename=".$path->getPath()."");
        header ("Content-Type: application/octet-stream");
        header ("Content-Length: ".filesize($link));
        readfile($link);*/
        return new BinaryFileResponse($link); 
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien", name="grupoBeneficiarioCVB")
     */
    public function comiteVamosBienGrupoBeneficiarioAction(Request $request, $idGrupo)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $beneficiarios = new Beneficiario();

        $grupo=$em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id'=> $idGrupo)
        );

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosCVB = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $grupo)
        ); 

        

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );   

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ComiteVamosBienFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo)')
        ->setParameter(':grupo', $grupo);

        $query = $filterBuilder->getQuery();

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-cvb-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idBeneficiario}/nueva-asignacion", name="grupoBeneficiarioCVBAsignacion")
     */
    public function comiteVamosBienAsignarGrupoBeneficiarioAction($idGrupo, $idBeneficiario)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        ); 

        $comiteVamosBien = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $idGrupo)
        );  

        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();      

        if(sizeof($comiteVamosBien) < 5){            

            $asignacionBeneficiarioComiteVamosBien->setGrupo($grupo);        
            $asignacionBeneficiarioComiteVamosBien->setBeneficiario($beneficiario);
            $asignacionBeneficiarioComiteVamosBien->setActive(true);
            $asignacionBeneficiarioComiteVamosBien->setFechaCreacion(new \DateTime());
            $asignacionBeneficiarioComiteVamosBien->setUsuarioCreacion($usuario);

            $em->persist($asignacionBeneficiarioComiteVamosBien);
            $em->flush();

            $this->addFlash('success', 'Beneficiario asignado');            

        }else{
            $this->addFlash('danger', 'Ya tiene el máximo de beneficiarios asignados');            
        }

        return $this->redirectToRoute('grupoBeneficiarioCVB', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiarioComiteVamosBien' => $asignacionBeneficiarioComiteVamosBien,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idAsignacionBeneficiariosCVB}/eliminar", name="grupoBeneficiarioCVBEliminar")
     */
    public function comiteVamosBienEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosCVB)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();

        $asignacionBeneficiarioComiteVamosBien = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->find($idAsignacionBeneficiariosCVB); 

        $em->remove($asignacionBeneficiarioComiteVamosBien);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosCVB = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioCVB',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo
            ));      
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras", name="grupoBeneficiarioComiteCompras")
     */
    public function comiteComprasGrupoBeneficiarioAction(Request $request, $idGrupo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );
        
        $asignacionesBeneficiariosCC = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ComiteComprasFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo)')
        ->setParameter(':grupo', $grupo);

        $query = $filterBuilder->getQuery();

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-cc-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query,
                'asignacionesBeneficiariosCC' => $asignacionesBeneficiariosCC,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras/{idBeneficiario}/nueva-asignacion", name="grupoBeneficiarioComiteComprasAsignacion")
     */
    public function comiteComprasAsignarGrupoBeneficiarioAction($idGrupo, $idBeneficiario)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );        
           
        $asignacionBeneficiarioComiteCompras = new AsignacionBeneficiarioComiteCompras();

        $asignacionBeneficiarioComiteCompras->setGrupo($grupo);        
        $asignacionBeneficiarioComiteCompras->setBeneficiario($beneficiario);
        $asignacionBeneficiarioComiteCompras->setActive(true);
        $asignacionBeneficiarioComiteCompras->setFechaCreacion(new \DateTime());
        $asignacionBeneficiarioComiteCompras->setUsuarioCreacion($usuario);

        $em->persist($asignacionBeneficiarioComiteCompras);
        $em->flush();



        return $this->redirectToRoute('grupoBeneficiarioComiteCompras', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiarioComiteCompras' => $asignacionBeneficiarioComiteCompras,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras/{idAsignacionBeneficiariosCVB}/eliminar", name="grupoBeneficiarioComiteComprasEliminar")
     */
    public function comiteComprasEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosCVB)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioComiteCompras = new AsignacionBeneficiarioComiteCompras();

        $asignacionBeneficiarioComiteCompras = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->find($idAsignacionBeneficiariosCVB); 

        $em->remove($asignacionBeneficiarioComiteCompras);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionBeneficiarioComiteCompras = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioComiteCompras', 
            array(
                'beneficiario' => $beneficiarios,          
                'asignacionesBeneficiarioComiteCompras' => $asignacionBeneficiarioComiteCompras,                
                'idGrupo' => $idGrupo
            ));       
        
    } 

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional", name="grupoBeneficiarioOrganizacional")
     */
    public function estructuraOrganizacionalGrupoBeneficiarioAction(Request $request, $idGrupo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        if ($request->getMethod() == 'POST') {


            if(isset($_POST["idRolBeneficiario"])){

                //echo ($_POST["idRolBeneficiario"]["idBeneficiario"]);


                $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

                $rolBeneficiario = $em->getRepository('AppBundle:Listas')->findOneBy(
                    array('id' => $_POST["idRolBeneficiario"]["rol"])
                );  

                $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
                    array('id' => $_POST["idRolBeneficiario"]["idBeneficiario"])
                );  

                $asignacionBeneficiarioEstructuraOrganizacional->setGrupo($grupo);                
                $asignacionBeneficiarioEstructuraOrganizacional->setBeneficiario($beneficiario);
                $asignacionBeneficiarioEstructuraOrganizacional->setRol($rolBeneficiario);                

                $asignacionBeneficiarioEstructuraOrganizacional->setFechaCreacion(new \DateTime());
                $asignacionBeneficiarioEstructuraOrganizacional->setActive(0);

                $rolExistente =  $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->findBy(
                    array('grupo' => $idGrupo,
                          'rol' => $rolBeneficiario)
                );                

                if(sizeof($rolExistente) == 1){
                     $this->addFlash('danger', 'El rol ya se encuentra asignado');
                     return $this->redirectToRoute('grupoBeneficiarioOrganizacional', array( 'idGrupo' => $idGrupo));
                }else{
                    $em->persist($asignacionBeneficiarioEstructuraOrganizacional);
                    $em->flush();
                    $this->addFlash('success', 'Rol asignado');
                    return $this->redirectToRoute('grupoBeneficiarioOrganizacional', array( 'idGrupo' => $idGrupo));
                }

                

            }

        }

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );       

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosEO = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioEstructuraOrganizacional abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new EstructuraOrganizacionalFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioEstructuraOrganizacional abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo)')
        ->setParameter(':grupo', $grupo);

        $query = $filterBuilder->getQuery();

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-eo-gestion-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query,
                'asignacionesBeneficiariosEO' => $asignacionesBeneficiariosEO,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional/{idBeneficiario}/nueva-asignacion", name="formularioRolBeneficiarioOrganizacional")
     */
    public function formularioRolBeneficiarioEstructuraOrganizacionalAction(Request $request, $idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

        $form = $this->createForm(new ListaRolBeneficiarioType(), $asignacionBeneficiarioEstructuraOrganizacional);

        $form->add(
            'idBeneficiario', 
            'hidden', 
            array(
                'mapped' => false,
                'attr' => array(      
                    'value' => $idBeneficiario,              
                    'style' => 'visibility:hidden'
                )
            )
        );
        //El boton tiene un error al enviar el ID del beneficiario
        $form->add(
            'Asignar_'.$idBeneficiario, 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);                                 

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:asignarRolBeneficiarioEstructuraOrganizacional.html.twig',
            array(
                'form' => $form->createView(),
                'idBeneficiario' => $idBeneficiario,
                'idGrupo' => $idGrupo
                )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional/{idAsignacionBeneficiariosEO}/eliminar", name="grupoBeneficiarioEstructuraOrganizacionalEliminar")
     */
    public function estructuraOrganizacionalEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosEO)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

        $asignacionBeneficiarioEstructuraOrganizacional = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->find($idAsignacionBeneficiariosEO);         

        $em->remove($asignacionBeneficiarioEstructuraOrganizacional);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionBeneficiarioEstructuraOrganizacional = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioOrganizacional',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiarioEstructuraOrganizacional' => $asignacionBeneficiarioEstructuraOrganizacional,
                'idGrupo' => $idGrupo
            ));      
        
    } 


    private function nodoCamino($idGrupo, $idNodo, $estado)
    {
        $em = $this->getDoctrine()->getManager();

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodoCaminoAccion = new Camino();
        $nodoCaminoAccion->setGrupo($grupo);
        $nodoCaminoAccion->setNodo($nodo);
        $nodoCaminoAccion->setEstado($estado);
        $nodoCaminoAccion->setActive(true);
        $nodoCaminoAccion->setFechaCreacion(new \DateTime());

        $em->persist($nodoCaminoAccion);
    }

    private function encendidoNodoSeguimento($idGrupo, $idNodo){

        if($idNodo == 6)
            self::nodoCamino($idGrupo, 7, 1);
        elseif ($idNodo == 10) {
            self::nodoCamino($idGrupo, 11, 1);
        }
        elseif ($idNodo == 14) {
            self::nodoCamino($idGrupo, 15, 1);
        }
        elseif ($idNodo == 20){
            self::nodoCamino($idGrupo, 21, 1);
        }
        else{
            self::nodoCamino($idGrupo, 27, 1);
        }

    }

    


}
