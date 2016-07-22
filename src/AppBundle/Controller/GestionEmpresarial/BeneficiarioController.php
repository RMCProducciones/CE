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

use AppBundle\Entity\Grupo;
use AppBundle\Entity\Listas;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\BeneficiarioSoporte;
use AppBundle\Entity\AsignacionBeneficiarioComiteVamosBien;
use AppBundle\Entity\AsignacionBeneficiarioComiteCompras;
use AppBundle\Entity\AsignacionBeneficiarioEstructuraOrganizacional; 
use AppBundle\Entity\GrupoSoporte;


use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioSoporteType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;

use AppBundle\Form\GestionEmpresarial\BeneficiarioFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;



class BeneficiarioController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/beneficiario", name="beneficiarioGestion")
     */
    public function beneficiarioGestionAction(Request $request, $idGrupo)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        /*$beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('active' => '1', 'grupo' => $idGrupo),
            array('primer_apellido' => 'ASC')
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');
                  
        $form = $this->get('form.factory')->create(new BeneficiarioFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");


        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Beneficiario:beneficiario-gestion.html.twig', 
        array( 'form' => $form->createView(), 
               'idGrupo' => $idGrupo, 
               'beneficiarios' => $query, 
               'grupo'=>$grupo, 
               'pagination'=> $pagination, 
               'tipoUsuario' => $valuesFieldBlock[3]));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/beneficiario/nuevo/", name="beneficiarioNuevo")
     */
    public function beneficiarioNuevoAction(Request $request, $idGrupo)
    {      


        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();
        $listas = new Listas();        
        $form = $this->createForm(new BeneficiarioType(), $beneficiarios);

        $form->handleRequest($request); 

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );       
                
        if ($form->isValid()) {
            
            // data is an array with "name", "email", and "message" keys

            $grupo = new Grupo();
            $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
                array('id' => $idGrupo)
            );

            $beneficiarios = $form->getData();   

            $beneficiarios->setGrupo($grupo);            

            if($beneficiarios->getPertenenciaEtnica()->getDescripcion() != 'Indígena'){
                $beneficiarios->setNullGrupoIndigena();
            }  
            if($beneficiarios->getEstadoCivil()->getDescripcion() != 'Casado'||$beneficiarios->getEstadoCivil()->getDescripcion() != 'Unión Libre'){
                $beneficiarios->setNullDocumentoConyugue();
            }
            /*if($beneficiarios->getCorteSisben() == '14 Ciudades'){
                if($beneficiarios->getPuntajeSisben() > '57.21'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "14 Ciudades"');
                    return $this->redirectToRoute('beneficiarioNuevo', array( 'idGrupo' => $idGrupo));
                }

            }
            if($beneficiarios->getCorteSisben() == 'Otras Cabeceras'){
                if($beneficiarios->getPuntajeSisben() > '56.32'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "Otras Cabeceras"');
                    return $this->redirectToRoute('beneficiarioNuevo', array( 'idGrupo' => $idGrupo));
                }                

            }
            if($beneficiarios->getCorteSisben() == 'Áreas Rurales'){
                if($beneficiarios->getPuntajeSisben() > '40.75'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "Áreas Rurales"');
                    return $this->redirectToRoute('beneficiarioNuevo', array( 'idGrupo' => $idGrupo));
                }                

            }*/

            $beneficiarios->setActive(true);
            $beneficiarios->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $beneficiarios->setUsuarioCreacion($usuario);

            $em->persist($beneficiarios);
            $em->flush();

        

            return $this->redirectToRoute('beneficiarioGestion', array( 'idGrupo' => $idGrupo));
        }
        
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Beneficiario:beneficiario-nuevo.html.twig', array('form' => $form->createView(),'idGrupo' => $idGrupo,'grupo'=>$grupo));
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiario/{idGrupo}/{idBeneficiario}/documentos-soporte", name="beneficiarioSoporte")
     */
    public function beneficiarioSoporteAction(Request $request, $idGrupo, $idBeneficiario)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
        $form = $this->createForm(new BeneficiarioSoporteType(), $beneficiarioSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
            array('active' => '1', 'beneficiario' => $idBeneficiario),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
            array('active' => '0', 'beneficiario' => $idBeneficiario),
            array('fecha_creacion' => 'ASC')
        );
        
        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $beneficiarioSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'beneficiario_tipo_soporte'
                    )
                );
                
                $actualizarBeneficiarioSoportes = $em->getRepository('AppBundle:BeneficiarioSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'beneficiario' => $idBeneficiario
                    )
                );  
            
                foreach ($actualizarBeneficiarioSoportes as $actualizarBeneficiarioSoporte){
                    echo $actualizarBeneficiarioSoporte->getId()." ".$actualizarBeneficiarioSoporte->getTipoSoporte()."<br />";
                    $actualizarBeneficiarioSoporte->setFechaModificacion(new \DateTime());
                    $actualizarBeneficiarioSoporte->setActive(0);
                    $actualizarBeneficiarioSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $beneficiarioSoporte->setBeneficiario($beneficiario);
                $beneficiarioSoporte->setActive(true);
                $beneficiarioSoporte->setFechaCreacion(new \DateTime());
                $beneficiarioSoporte->setUsuarioCreacion($usuario  );

                $em->persist($beneficiarioSoporte);
                $em->flush();

                return $this->redirectToRoute('beneficiarioSoporte', array( 'idGrupo' => $idGrupo, 'idBeneficiario' => $idBeneficiario) );
            }
        }   
        
        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        //return new Response("Hola mundo");
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Beneficiario:beneficiario-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idGrupo' => $idGrupo,
                'idBeneficiario' => $idBeneficiario,
                'grupo'=>$grupo,
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiario/{idGrupo}/{idBeneficiario}/documentos-soporte/{idBeneficiarioSoporte}/borrar", name="beneficiarioSoporteBorrar")
     */
    public function beneficiarioSoporteBorrarAction(Request $request, $idBeneficiario, $idBeneficiarioSoporte, $idGrupo )
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
        $beneficiarioSoporte = $em->getRepository('AppBundle:BeneficiarioSoporte')->findOneBy(
            array('id' => $idBeneficiarioSoporte)
        );
        
        $beneficiarioSoporte->setFechaModificacion(new \DateTime());
        $beneficiarioSoporte->setActive(0);
        $beneficiarioSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('beneficiarioSoporte', 
            array( 
            'idBeneficiario' => $idBeneficiario,
            'idGrupo' => $idGrupo));
        
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiario/{idBeneficiario}/documentos-soporte/{idBeneficiarioSoporte}/descargar", name="beneficiarioSoporteRecuperarArchivo")
     */
    public function beneficiarioSoporteDescargarAction(Request $request, $idBeneficiario, $idBeneficiarioSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:BeneficiarioSoporte')->findOneBy(
            array('id' => $idBeneficiarioSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/{idBeneficiario}/beneficiario/editar", name="beneficiarioEditar")
     */
    public function BeneficiarioEditarAction(Request $request, $idGrupo, $idBeneficiario)
    {
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );
        
        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );   


        $form = $this->createForm(new BeneficiarioType(), $beneficiarios);

        
        
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

            $beneficiarios = $form->getData();
            
            $beneficiarios->setFechaModificacion(new \DateTime());

            if($beneficiarios->getPertenenciaEtnica()->getDescripcion() != 'Indígena'){
                $beneficiarios->setNullGrupoIndigena();
            }  
            if($beneficiarios->getEstadoCivil()->getDescripcion() != 'Casado'||$beneficiarios->getEstadoCivil()->getDescripcion() != 'Unión Libre'){
                $beneficiarios->setNullDocumentoConyugue();
            }

            /*if($beneficiarios->getCorteSisben() == '14 Ciudades'){
                if($beneficiarios->getPuntajeSisben() > '57.21'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "14 Ciudades"');
                    return $this->redirectToRoute('beneficiarioEditar', array( 'idGrupo' => $idGrupo, 'idBeneficiario' => $idBeneficiario));
                }

            }
            if($beneficiarios->getCorteSisben() == 'Otras Cabeceras'){
                if($beneficiarios->getPuntajeSisben() > '56.32'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "Otras Cabeceras"');
                    return $this->redirectToRoute('beneficiarioEditar', array( 'idGrupo' => $idGrupo, 'idBeneficiario' => $idBeneficiario));
                }                

            }
            if($beneficiarios->getCorteSisben() == 'Áreas Rurales'){
                if($beneficiarios->getPuntajeSisben() > '40.75'){
                    $this->addFlash('warning', 'El puntaje de SISBEN es mayor a puntaje máximo requerido para el area de sisben "Áreas Rurales"');
                    return $this->redirectToRoute('beneficiarioEditar', array( 'idGrupo' => $idGrupo, 'idBeneficiario' => $idBeneficiario));
                }                

            }*/

            
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $beneficiarios->setUsuarioModificacion($usuario);

            $beneficiarios->setFechaModificacion(new \DateTime());            

            $em->persist($beneficiarios);
            $em->flush();


            return $this->redirectToRoute('beneficiarioGestion', array('idGrupo' => $idGrupo));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Beneficiario:beneficiario-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'idBeneficiario' => $idBeneficiario,
                    'beneficiarios' => $beneficiarios,
                    'grupo'=>$grupo
            )
        );

    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/{idBeneficiario}/beneficiario/eliminar", name="beneficiarioEliminar")
     */
    public function BeneficiarioEliminarAction(Request $request, $idGrupo, $idBeneficiario)
    {
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->find($idBeneficiario);              

        $em->remove($beneficiarios);
        $em->flush();

        return $this->redirectToRoute('beneficiarioGestion', array( 'idGrupo' => $idGrupo));

    }
    


}

