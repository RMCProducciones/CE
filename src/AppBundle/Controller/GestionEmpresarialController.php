<?php

namespace AppBundle\Controller;

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
use AppBundle\Entity\GrupoSoporte;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\CLEAR;
use AppBundle\Entity\IntegranteCLEAR;
use AppBundle\Entity\AsignacionIntegranteCLEAR;

use AppBundle\Form\GestionEmpresarial\IntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\AsignacionIntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioType;
use AppBundle\Form\GestionEmpresarial\CLEARType;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GestionEmpresarialController extends Controller
{
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/", name="gruposGestion")
     */
    public function gruposGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $grupos = $em->getRepository('AppBundle:Grupo')->findAll(); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupos-gestion.html.twig', array( 'grupos' => $grupos));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/nuevo", name="gruposNuevo")
     */
    public function gruposNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();
        
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
            // data is an array with "name", "email", and "message" keys
            $grupo = $form->getData();

            $grupo->setActive(true);
            $grupo->setFechaCreacion(new \DateTime());


            
            $em->persist($grupo);
            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupos-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/documentos-soporte", name="gruposSoporte")
     */
    public function gruposSoporteAction(Request $request, $idGrupo)
    {
		$em = $this->getDoctrine()->getManager();

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

				$tipoSoporte = $em->getRepository('AppBundle:Listas')->findOneBy(
					array('descripcion' => $grupoSoporte->getTipoSoporte()->getDescripcion(), 'dominio' => 'grupo_tipo_soporte')
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
					$actualizarGrupoSoporte->setActive(0);
					$em->flush();
				}
				
				$grupoSoporte->setGrupo($grupo);
				$grupoSoporte->setActive(true);
				$grupoSoporte->setFechaCreacion(new \DateTime());
				//$grupoSoporte->setUsuarioCreacion(1);

				$em->persist($grupoSoporte);
				$em->flush();

				return $this->redirectToRoute('gruposSoporte', array( 'idGrupo' => $idGrupo));
			}
		}	
		
        return $this->render(
			'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupos-soporte.html.twig', 
			array(
				'form' => $form->createView(), 
				'soportesActivos' => $soportesActivos, 
				'histotialSoportes' => $histotialSoportes
			)
		);
		
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/beneficiarios/", name="beneficiariosGestion")
     */
    public function beneficiariosGestionAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('active' => '1', 'grupo' => $idGrupo),
            array('primer_apellido' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-gestion.html.twig', array( 'idGrupo' => $idGrupo, 'beneficiarios' => $beneficiarios));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/beneficiarios/nuevo/", name="beneficiariosNuevo")
     */
    public function beneficiariosNuevoAction(Request $request, $idGrupo)
    {      
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();
        
        $form = $this->createForm(new BeneficiarioType(), $beneficiarios);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $beneficiarios = $form->getData();

            $beneficiarios->setActive(true);
            $beneficiarios->setFechaCreacion(new \DateTime());


            
            $em->persist($beneficiarios);
            $em->flush();

            return $this->redirectToRoute('beneficiariosGestion', array( 'idGrupo' => $idGrupo));
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-nuevo.html.twig', array('form' => $form->createView(),'idGrupo' => $idGrupo));
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/", name="CLEARGestion")
     */
    public function CLEARGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cleares = $em->getRepository('AppBundle:CLEAR')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:clear-gestion.html.twig', array( 'cleares' => $cleares));
    }
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/nuevo", name="clearNuevo")
     */
    public function clearNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $clear = new Clear();
        
        $form = $this->createForm(new CLEARType(), $clear);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $clear = $form->getData();

            $clear->setActive(true);
            $clear->setFechaCreacion(new \DateTime());


            
            $em->persist($clear);
            $em->flush();

            return $this->redirectToRoute('CLEARGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:clear-nuevo.html.twig', array('form' => $form->createView()));
    }   
	
	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/integrantes/nuevo", name="integrantesNuevo")
     */
    public function integrantesNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $integranteCLEAR = new IntegranteCLEAR();
        
        $form = $this->createForm(new IntegranteCLEARType(), $integranteCLEAR);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $integranteCLEAR= $form->getData();

            $integranteCLEAR->setActive(true);
            $integranteCLEAR->setFechaCreacion(new \DateTime());


            
            $em->persist($integranteCLEAR);
            $em->flush();

            return $this->redirectToRoute('CLEARGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-clear-nuevo.html.twig', array('form' => $form->createView()));
    }
	
	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/integrantes", name="integrantesGestion")
     */
    public function integrantesGestionAction($idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();
        
		$integrantesCLEAR = $em->getRepository('AppBundle:IntegranteCLEAR')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')
        );	
		$asignacionIntegrantesCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->findBy(
            array('active' => '1', 'clear' => $idCLEAR),
            array()
        );	
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-clear-gestion-asignacion.html.twig', array('integrantesCLEAR' => $integrantesCLEAR, 'asignacionIntegrantesCLEAR' => $asignacionIntegrantesCLEAR ));
    }
	
	
	
}
