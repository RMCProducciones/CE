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

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class BeneficiarioController extends Controller
{

    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/beneficiario/", name="beneficiarioGestion")
     */
    public function beneficiarioGestionAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        
        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('active' => '1', 'grupo' => $idGrupo),
            array('primer_apellido' => 'ASC')
        );
        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $beneficiarios, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Beneficiario:beneficiario-gestion.html.twig', 
        array( 'idGrupo' => $idGrupo, 'beneficiarios' => $beneficiarios, 'grupo'=>$grupo, 'pagination'=> $pagination));

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

            $beneficiarios->setActive(true);
            $beneficiarios->setFechaCreacion(new \DateTime());

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
        $em = $this->getDoctrine()->getManager();

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
                    $em->flush();
                }
                
                $beneficiarioSoporte->setBeneficiario($beneficiario);
                $beneficiarioSoporte->setActive(true);
                $beneficiarioSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

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
                'grupo'=>$grupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiario/{idGrupo}/{idBeneficiario}/documentos-soporte/{idBeneficiarioSoporte}/borrar", name="beneficiarioSoporteBorrar")
     */
    public function beneficiarioSoporteBorrarAction(Request $request, $idBeneficiario, $idBeneficiarioSoporte, $idGrupo )
    {
        $em = $this->getDoctrine()->getManager();

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
        $beneficiarioSoporte = $em->getRepository('AppBundle:BeneficiarioSoporte')->findOneBy(
            array('id' => $idBeneficiarioSoporte)
        );
        
        $beneficiarioSoporte->setFechaModificacion(new \DateTime());
        $beneficiarioSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('beneficiarioSoporte', 
            array( 
            'idBeneficiario' => $idBeneficiario,
            'idGrupo' => $idGrupo));
        
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

