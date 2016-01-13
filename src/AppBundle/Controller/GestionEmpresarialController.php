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
use AppBundle\Entity\BeneficiarioSoporte;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\CLEAR;
use AppBundle\Entity\ClearSoporte;
use AppBundle\Entity\IntegranteCLEAR;
use AppBundle\Entity\AsignacionIntegranteCLEAR;
use AppBundle\Entity\Concurso;
use AppBundle\Entity\ConcursoSoporte;
use AppBundle\Entity\ActividadConcurso;
use AppBundle\Entity\Listas;

use AppBundle\Form\GestionEmpresarial\IntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\AsignacionIntegranteCLEARType;
use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\ConcursoSoporteType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioType;
use AppBundle\Form\GestionEmpresarial\BeneficiarioSoporteType;
use AppBundle\Form\GestionEmpresarial\CLEARType;
use AppBundle\Form\GestionEmpresarial\ClearSoporteType;
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
                $grupo->setBarrio(null);
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/eliminar", name="grupoEliminar")
     */
    public function GrupoEliminarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->find($idGrupo);              

        $em->remove($grupo);
        $em->flush();

        return $this->redirect($this->generateUrl('gruposGestion'));

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

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

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

/*
        echo "<pre>";
        print_r($soportesActivos);
        echo "</pre>";
*/

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
        $listas = new Listas();        
        $form = $this->createForm(new BeneficiarioType(), $beneficiarios);

        $form->handleRequest($request);        
                
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

            return $this->redirectToRoute('beneficiariosGestion', array( 'idGrupo' => $idGrupo));
        }
        
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-nuevo.html.twig', array('form' => $form->createView(),'idGrupo' => $idGrupo));
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiarios/{idGrupo}/{idBeneficiario}/documentos-soporte", name="beneficiarioSoporte")
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
        

        //return new Response("Hola mundo");
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idGrupo' => $idGrupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiarios/{idBeneficiario}/documentos-soporte/{idBeneficiarioSoporte}/borrar", name="beneficiariosSoporteBorrar")
     */
    public function beneficiariosSoporteBorrarAction(Request $request, $idBeneficiario, $idBeneficiarioSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $beneficiarioSoporte = new BeneficiarioSoporte();
        
        $beneficiarioSoporte = $em->getRepository('AppBundle:BeneficiarioSoporte')->findOneBy(
            array('id' => $idGrupoSoporte)
        );
        
        $beneficiarioSoporte->setFechaModificacion(new \DateTime());
        $beneficiarioSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('beneficiarioSoporte', array( 'idBeneficiario' => $idBeneficiario));
        
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/{idBeneficiario}/beneficiarios/editar", name="beneficiariosEditar")
     */
    public function BeneficiariosEditarAction(Request $request, $idGrupo, $idBeneficiario)
    {
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );

        //print_r($idBeneficiario);


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
            $beneficiarios->$setActive(true);
            $beneficiarios->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );*/
            
            $beneficiarios->setUsuarioModificacion($usuarioModificacion);

            $em->persist($beneficiarios);
            $em->flush();


            return $this->redirectToRoute('beneficiariosGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiarios-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'idBeneficiario' => $idBeneficiario,
                    'beneficiarios' => $beneficiarios,
            )
        );

    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/{idGrupo}/{idBeneficiario}/beneficiarios/eliminar", name="beneficiariosEliminar")
     */
    public function BeneficiariosEliminarAction(Request $request, $idGrupo, $idBeneficiario)
    {
        $em = $this->getDoctrine()->getManager();
        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->find($idBeneficiario);              

        $em->remove($beneficiarios);
        $em->flush();

        return $this->redirectToRoute('beneficiariosGestion', array( 'idGrupo' => $idGrupo));

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/eliminar", name="clearEliminar")
     */
    public function ClearEliminarAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();
        $clear = new Clear();

        $clear = $em->getRepository('AppBundle:Clear')->find($idCLEAR);              

        $em->remove($clear);
        $em->flush();

        return $this->redirect($this->generateUrl('CLEARGestion'));

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/documentos-soporte", name="clearSoporte")
     */
    public function clearSoporteAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clearSoporte = new ClearSoporte();
        
        $form = $this->createForm(new ClearSoporteType(), $clearSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ClearSoporte')->findBy(
            array('active' => '1', 'clear' => $idCLEAR),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ClearSoporte')->findBy(
            array('active' => '0', 'clear' => $idCLEAR),
            array('fecha_creacion' => 'ASC')
        );
        
        $clear = $em->getRepository('AppBundle:Clear')->findOneBy(
            array('id' => $idCLEAR)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $clearSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'clear_tipo_soporte'
                    )
                );
                
                $actualizarClearSoportes = $em->getRepository('AppBundle:ClearSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'clear' => $idCLEAR
                    )
                );  
            
                foreach ($actualizarClearSoportes as $actualizarClearSoporte){
                    echo $actualizarClearSoporte->getId()." ".$actualizarClearSoporte->getTipoSoporte()."<br />";
                    $actualizarClearSoporte->setFechaModificacion(new \DateTime());
                    $actualizarClearSoporte->setActive(0);
                    $em->flush();
                }
                
                $clearSoporte->setClear($clear);
                $clearSoporte->setActive(true);
                $clearSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($clearSoporte);
                $em->flush();

                return $this->redirectToRoute('clearSoporte', array( 'idCLEAR' => $idCLEAR) );
            }
        }   
        

        //return new Response("Hola mundo");
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:clear-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idCLEAR' => $idCLEAR
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/beneficiarios/{idCLEAR}/documentos-soporte/{idClearSoporte}/borrar", name="clearSoporteBorrar")
     */
    public function clearSoporteBorrarAction(Request $request, $idCLEAR, $idClearSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $clearSoporte = new ClearSoporte();
        
        $clearSoporte = $em->getRepository('AppBundle:ClearSoporte')->findOneBy(
            array('id' => $idClearSoporte)
        );
        
        $clearSoporte->setFechaModificacion(new \DateTime());
        $clearSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('clearSoporte', array( 'idCLEAR' => $idCLEAR));
        
    }

	
	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/integrantes/nuevo", name="integrantesNuevo")
     */
    public function integrantesNuevoAction(Request $request, $idCLEAR)
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

            return $this->redirectToRoute('CLEARGestion', array('idCLEAR' => $idCLEAR));
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-clear-nuevo.html.twig', 
            array('form' => $form->createView(),
                'idCLEAR' => $idCLEAR));
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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-clear-gestion-asignacion.html.twig', 
            array(
                'integrantesCLEAR' => $integrantesCLEAR, 
                'asignacionIntegrantesCLEAR' => $asignacionIntegrantesCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
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

            if($concurso->getRural() == true){
                $concurso->setBarrio(null);
            }
            else
            {
                $concurso->setCorregimiento(null);
                $concurso->setVereda(null);
                $concurso->setCacerio(null);
            }

            $concurso->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $concurso->setUsuarioModificacion($usuarioModificacion);

            $em->flush();

            return $this->redirectToRoute('concursoGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:concurso-editar.html.twig', 
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
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:concurso-soporte.html.twig', 
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
	
	


    /**
     * @Route("/gestion-empresarial/gestion-seguimiento/grupo/{idGrupo}", name="seguimientoGrupo")
     */
    public function seguimientoGrupoAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-seguimiento.html.twig', array( 'grupo' => $grupo));
    }
	
	
}
