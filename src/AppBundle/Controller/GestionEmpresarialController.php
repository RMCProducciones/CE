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
use AppBundle\Entity\Concurso;
use AppBundle\Entity\ActividadConcurso;

use AppBundle\Form\GestionEmpresarial\IntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\AsignacionIntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioType;
use AppBundle\Form\GestionEmpresarial\CLEARType;
use AppBundle\Form\GestionEmpresarial\ConcursoType;
use AppBundle\Form\GestionEmpresarial\ActividadConcursoType;

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
        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupos-gestion.html.twig', array( 'grupos' => $grupos));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}", name="grupo")
     */
    public function GrupoAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        //$elementos = $query->getResult();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        
        return new Response('{"grupo": ' . $serializer->serialize($grupo, 'json') . '}');

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/editar", name="grupoEditar")
     */
    public function GrupoEditarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

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

            if($grupo->getRural() == true){
                $grupo->setBarrio('');
            }
            else
            {
                $grupo->setCorregimiento(null);
                $grupo->setVereda(null);
                $grupo->setCacerio(null);
            }

            $grupo->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioModificacion($usuarioModificacion);

            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'grupo' => $grupo,
            )
        );

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
                $grupo->setBarrio(null);
            }
            else
            {
                $grupo->setCorregimiento(null);
                $grupo->setVereda(null);
                $grupo->setCacerio(null);
            }

            $grupo->setActive(true);
            $grupo->setFechaCreacion(new \DateTime());

            $usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/documentos-soporte/{idGrupoSoporte}/borrar", name="gruposSoporteBorrar")
     */
    public function gruposSoporteBorrarAction(Request $request, $idGrupo, $idGrupoSoporte)
    {
		$em = $this->getDoctrine()->getManager();

        $grupoSoporte = new GrupoSoporte();
        
		$grupoSoporte = $em->getRepository('AppBundle:GrupoSoporte')->findOneBy(
			array('id' => $idGrupoSoporte)
		);
		
		$grupoSoporte->setFechaModificacion(new \DateTime());
		$grupoSoporte->setActive(0);
		$em->flush();

        return $this->redirectToRoute('gruposSoporte', array( 'idGrupo' => $idGrupo));
		
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

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-gestion.html.twig', 
		array( 'idGrupo' => $idGrupo, 'beneficiarios' => $beneficiarios));

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/CLEAR/{idCLEAR}", name="CLEAR")
     */
    public function ClearAction($idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        //$elementos = $query->getResult();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        
        return new Response('{"": ' . $serializer->serialize($clear, 'json') . '}');

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/editar", name="clearEditar")
     */
    public function clearEditarAction(Request $request, $idCLEAR)
    {
        
		$em = $this->getDoctrine()->getManager();
        $clear = new Clear();

        $clear = $em->getRepository('AppBundle:Clear')->findOneBy(
            array('id' => $idCLEAR)
        );
		
        $form = $this->createForm(new CLEARType(), $clear);

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
            $clear = $form->getData();

            $clear->setActive(true);
            $clear->setFechaCreacion(new \DateTime());

            $em->persist($clear);
            $em->flush();

            return $this->redirectToRoute('CLEARGestion');
        }


		return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:clear-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCLEAR' => $idCLEAR,
                    'clear' => $clear
            )
        );
		

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
	
	
	
	 /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/", name="concursoGestion")
     */
    public function concursoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $concursos = $em->getRepository('AppBundle:Concurso')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:concurso-gestion.html.twig', array( 'concursos' => $concursos));
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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:concurso-nuevo.html.twig', array('form' => $form->createView()));
    }   
	
	
	 /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/actividades", name="actividadConcurso")
     */
    public function actividadConcursoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadconcurso = new Actividadconcurso();
        
        $form = $this->createForm(new ActividadConcursoType(), $actividadconcurso);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $actividadconcurso = $form->getData();

            $actividadconcurso->setActive(true);
            $actividadconcurso->setFechaCreacion(new \DateTime());


            
            $em->persist($actividadconcurso);
            $em->flush();

            return $this->redirectToRoute('concursoGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:concurso-actividades.html.twig', array('form' => $form->createView()));
    } 
	
	
	
	
}
