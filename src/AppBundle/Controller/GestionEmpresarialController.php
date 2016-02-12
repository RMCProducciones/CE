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
use AppBundle\Entity\AsignacionGrupoCLEAR;
use AppBundle\Entity\AsignacionIntegranteCLEAR;
use AppBundle\Entity\Concurso;
use AppBundle\Entity\AsignacionGrupoConcurso;
use AppBundle\Entity\ConcursoSoporte;
use AppBundle\Entity\ActividadConcurso;
use AppBundle\Entity\Listas;
use AppBundle\Entity\Comite;
use AppBundle\Entity\AsignacionGrupoComite;
use AppBundle\Entity\Integrante;
use AppBundle\Entity\IntegranteSoporte;
use AppBundle\Entity\Ruta;
use AppBundle\Entity\OrganizacionTerritorioAprendizaje;
use AppBundle\Entity\AsignacionGrupoRuta;
use AppBundle\Entity\AsignacionOrganizacionRuta;
use AppBundle\Entity\AsignacionGrupoBeneficiarioRuta;
use AppBundle\Entity\RutaSoporte;
use AppBundle\Entity\Pasantia;
use AppBundle\Entity\AsignacionOrganizacionPasantia;
use AppBundle\Entity\AsignacionGrupoPasantia;
use AppBundle\Entity\AsignacionGrupoBeneficiarioPasantia;
use AppBundle\Entity\PasantiaSoporte;
use AppBundle\Entity\ComiteSoporte;
use AppBundle\Entity\JuradoSoporte;
use AppBundle\Entity\IntegranteComite;
use AppBundle\Entity\AsignacionIntegranteComite;
use AppBundle\Entity\Organizacion;
use AppBundle\Entity\OrganizacionSoporte;
use AppBundle\Entity\TerritorioAprendizaje;
use AppBundle\Entity\DiagnosticoOrganizacional;
use AppBundle\Entity\Feria;
use AppBundle\Entity\FeriaSoporte;
use AppBundle\Entity\AsignacionOrganizacionTerritorioAprendizaje;


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
use AppBundle\Form\GestionEmpresarial\ComiteType;
use AppBundle\Form\GestionEmpresarial\IntegranteType;
use AppBundle\Form\GestionEmpresarial\IntegranteSoporteType;
use AppBundle\Form\GestionEmpresarial\ComiteSoporteType;
use AppBundle\Form\GestionEmpresarial\IntegranteComiteType;
use AppBundle\Form\GestionEmpresarial\RutaType;
use AppBundle\Form\GestionEmpresarial\PasantiaType;
use AppBundle\Form\GestionEmpresarial\RutaSoporteType;
use AppBundle\Form\GestionEmpresarial\PasantiaSoporteType;
use AppBundle\Form\GestionEmpresarial\OrganizacionType;
use AppBundle\Form\GestionEmpresarial\OrganizacionSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolType;
use AppBundle\Form\GestionEmpresarial\TerritorioAprendizajeType;
use AppBundle\Form\GestionEmpresarial\DiagnosticoOrganizacionalType;
use AppBundle\Form\GestionEmpresarial\DiagnosticoOrganizacionalResultadoType;
use AppBundle\Form\GestionEmpresarial\FeriaType;
use AppBundle\Form\GestionEmpresarial\FeriaSoporteType;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GestionEmpresarialController extends Controller
{
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/gestion", name="gruposGestion")
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/editar", name="grupoEditar")
     */
    public function grupoEditarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nit = explode("-", $grupo->getNumeroIdentificacionTributaria());

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

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'grupo' => $grupo,
                    'numeroIdentificacion' => $nit[0],
                    'digitoVerificacion' => $nit[1],

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

        return $this->redirect($this->generateUrl('gruposGestion'));

    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/nuevo", name="gruposNuevo")
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

                //print_r($grupoSoporte);

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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/gestion", name="CLEARGestion")
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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:clear-nuevo.html.twig',
            array('form' => $form->createView())
        );
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/documentos-soporte/{idClearSoporte}/borrar", name="clearSoporteBorrar")
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante", name="clearIntegrante")
     */
    public function clearIntegranteAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        if ($request->getMethod() == 'POST') {


            if(isset($_POST["idRolIntegrante"])){

                echo ($_POST["idRolIntegrante"]["idIntegrante"]);


                $asignacionIntegranteCLEAR = new AsignacionIntegranteCLEAR();

                $rolIntegrante = $em->getRepository('AppBundle:Listas')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["rol"])
                );  

                $integrante = $em->getRepository('AppBundle:Integrante')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["idIntegrante"])
                );  

                $asignacionIntegranteCLEAR->setRol($rolIntegrante);
                $asignacionIntegranteCLEAR->setClear($clear);
                $asignacionIntegranteCLEAR->setIntegrante($integrante);

                $asignacionIntegranteCLEAR->setFechaCreacion(new \DateTime());
                $asignacionIntegranteCLEAR->setActive(0);


                $em->persist($asignacionIntegranteCLEAR);
                $em->flush();

            }

        }        

        $asignacionesIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->findBy(
            array('clear' => $clear)
        );        

        $query = $em->createQuery('SELECT i FROM AppBundle:Integrante i WHERE i.id NOT IN (SELECT integrante.id FROM AppBundle:Integrante integrante JOIN AppBundle:AsignacionIntegranteCLEAR agc WHERE integrante = agc.integrante AND agc.clear = :clear) AND i.active = 1');
        $query->setParameter('clear', $clear);

        $integrantes = $query->getResult();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-clear-gestion-asignacion.html.twig', 
            array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteCLEAR' => $asignacionesIntegranteCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante/{idIntegrante}/formulario", name="formularioRolIntegranteClear")
     */
    public function formularioRolIntegranteClearAction(Request $request, $idCLEAR, $idIntegrante)
    {

        $em = $this->getDoctrine()->getManager();

        $asignacionesIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $form = $this->createForm(new ListaRolType(), $asignacionesIntegranteCLEAR);

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
//El boton tiene un error al enviar el ID del beneficiario
        $form->add(
            'Asignar_'.$idIntegrante, 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:visible'
                ),
            )
        );


        $form->handleRequest($request);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:asignarRolIntegranteClear.html.twig',
            array(
                'form' => $form->createView(),
                'idIntegrante' => $idIntegrante,
                'idCLEAR' => $idCLEAR
                )
        );
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante/{idAsignacionIntegranteCLEAR}/eliminar", name="clearEliminarIntegrante")
     */
    public function clearEliminarIntegranteAction(Request $request, $idCLEAR, $idAsignacionIntegranteCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $asignacionIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->find($idAsignacionIntegranteCLEAR); 

        $integrantes = $em->getRepository('AppBundle:Integrante')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')            
        );  

        $em->remove($asignacionIntegranteCLEAR);
        $em->flush();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->findBy(
            array('clear' => $clear)
        );  

        return $this->redirectToRoute('clearIntegrante',
             array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteCLEAR' => $asignacionIntegranteCLEAR,
                'idCLEAR' => $idCLEAR
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo", name="clearGrupo")
     */
    public function clearGrupoAction($idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesGrupoCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
            array('clear' => $clear)
        );  

        $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoCLEAR agc WHERE grupo = agc.grupo AND agc.clear = :clear) AND g.active = 1');
        $query->setParameter('clear', $clear);

        $grupos = $query->getResult();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-clear-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="clearAsignarGrupo")
     */
    public function clearAsignarGrupoAction($idCLEAR, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );  
           
        $asignacionesGrupoCLEAR = new AsignacionGrupoCLEAR();

        $asignacionesGrupoCLEAR->setGrupo($grupos);
        $asignacionesGrupoCLEAR->setClear($clear);           
        $asignacionesGrupoCLEAR->setActive(true);
        $asignacionesGrupoCLEAR->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesGrupoCLEAR);
        $em->flush();



        return $this->redirectToRoute('clearGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo/{idAsignacionGrupoCLEAR}/eliminar", name="clearEliminarGrupo")
     */
    public function clearEliminarGrupoAction(Request $request, $idCLEAR, $idAsignacionGrupoCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoCLEAR = new AsignacionGrupoCLEAR();

        $asignacionesGrupoCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->find($idAsignacionGrupoCLEAR); 

        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesGrupoCLEAR);
        $em->flush();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
            array('clear' => $clear)
        );  

        return $this->redirectToRoute('clearGrupo',
             array(
                'grupos' => $grupos,
                'asignacionesIntegranteCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));    
        
    }


	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrantes/nuevo", name="integranteNuevo")
     */
    public function integrantesNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $integrante = new Integrante();        
        
        $form = $this->createForm(new IntegranteType(), $integrante);

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
            $integrante= $form->getData();

            $integrante->setActive(true);
            $integrante->setFechaCreacion(new \DateTime());


            
            $em->persist($integrante);
            $em->flush();

            return $this->redirectToRoute('integranteGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrantes-nuevo.html.twig', 
            array('form' => $form->createView()));
    }
	
	/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/gestion", name="integranteGestion")
     */
    public function integrantesGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        
		$integrantes = $em->getRepository('AppBundle:Integrante')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')
        );			
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrante-gestion.html.twig', 
            array(
                'integrantes' => $integrantes,                  
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/editar", name="integranteEditar")
     */
    public function integranteEditarAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();
        $integrantes = new Integrante();

        $integrantes = $em->getRepository('AppBundle:Integrante')->findOneBy(
            array('id' => $idIntegrante)
        );
        //echo $integrantes->getPertenenciaEtnica();
        $form = $this->createForm(new IntegranteType(), $integrantes);
        
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

            $integrantes = $form->getData();

            $integrantes->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $integrantes->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrante-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idIntegrante' => $idIntegrante,
                    'integrantes' => $integrantes,
            )
        );

               
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/eliminar", name="integranteEliminar")
     */
    public function IntegranteEliminarAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();
        $integrante = new Integrante();

        $integrante = $em->getRepository('AppBundle:Integrante')->find($idIntegrante);              

        $em->remove($integrante);
        $em->flush();

        return $this->redirect($this->generateUrl('integranteGestion'));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/documentos-soporte", name="integranteSoporte")
     */
    public function integranteSoporteAction(Request $request, $idIntegrante)
    {
        $em = $this->getDoctrine()->getManager();

        $integranteSoporte = new IntegranteSoporte();
        
        $form = $this->createForm(new IntegranteSoporteType(), $integranteSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
            array('active' => '1', 'integrante' => $idIntegrante),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
            array('active' => '0', 'integrante' => $idIntegrante),
            array('fecha_creacion' => 'ASC')
        );
        
        $integrante = $em->getRepository('AppBundle:Integrante')->findOneBy(
            array('id' => $idIntegrante)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $integranteSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );

                echo $integranteSoporte->getTipoSoporte()->getDescripcion();
                
                $actualizarIntegranteSoportes = $em->getRepository('AppBundle:IntegranteSoporte')->findBy(
                    array(
                        'active' => '1' ,                         
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'integrante' => $idIntegrante
                    )
                );  

            
                foreach ($actualizarIntegranteSoportes as $actualizarIntegranteSoporte){
                    echo $actualizarIntegranteSoporte->getId()." ".$actualizarIntegranteSoporte->getTipoSoporte()."<br />";
                    $actualizarIntegranteSoporte->setFechaModificacion(new \DateTime());
                    $actualizarIntegranteSoporte->setActive(0);
                    $em->flush();
                }
                
                $integranteSoporte->setIntegrante($integrante);
                $integranteSoporte->setActive(true);
                $integranteSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($integranteSoporte);
                $em->flush();

                return $this->redirectToRoute('integranteSoporte', array( 'idIntegrante' => $idIntegrante));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:integrante-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/integrante/{idIntegrante}/documentos-soporte/{idIntegranteSoporte}/borrar", name="integranteSoporteBorrar")
     */
    public function integranteSoporteBorrarAction(Request $request, $idIntegrante, $idIntegranteSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $integranteSoporte = new IntegranteSoporte();
        
        $integranteSoporte = $em->getRepository('AppBundle:IntegranteSoporte')->findOneBy(
            array('id' => $idIntegranteSoporte)
        );

        echo $idIntegranteSoporte;
        
        $integranteSoporte->setFechaModificacion(new \DateTime());
        $integranteSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('integranteSoporte', array( 'idIntegrante' => $idIntegrante));
        
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

           
            $concurso->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );            
            
            $concurso->setUsuarioModificacion($usuarioModificacion);*/

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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-concurso-gestion-asignacion.html.twig', 
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

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/comite-concursos/", name="comiteGestion")
     */
    public function ComiteGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $comites = $em->getRepository('AppBundle:Comite')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:comite-gestion.html.twig', array( 'comites' => $comites));
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
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:comite-nuevo.html.twig', 
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
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:comite-editar.html.twig', 
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
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:comite-soporte.html.twig', 
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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:jurados-comite-gestion-asignacion.html.twig', 
            array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteComite' => $asignacionesIntegranteComite,
                'idComite' => $idComite
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
            'Asignar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $form->handleRequest($request);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:asignarRolIntegranteComite.html.twig',
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
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-comite-gestion-asignacion.html.twig', 
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
     
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/gestion", name="rutaGestion")
     */
    public function rutaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rutas = $em->getRepository('AppBundle:Ruta')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:ruta-gestion.html.twig', array( 'rutas' => $rutas));
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/nuevo", name="rutaNuevo")
     */
    public function rutaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();
        
        $form = $this->createForm(new RutaType(), $ruta);
        
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
            
            $ruta = $form->getData();


            $ruta->setActive(true);
            $ruta->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $ruta->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($ruta);
            $em->flush();

            return $this->redirectToRoute('rutaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:ruta-nuevo.html.twig', array('form' => $form->createView()));
    }

    
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/editar", name="rutaEditar")
     */
    public function rutaEditarAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        $form = $this->createForm(new RutaType(), $ruta);
        
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

            $ruta = $form->getData();

            $ruta->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $ruta->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('rutaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:ruta-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idRuta' => $idRuta,
                    'ruta' => $ruta,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/eliminar", name="rutaEliminar")
     */
    public function rutaEliminarAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();
        $ruta = new Ruta();

        $ruta = $em->getRepository('AppBundle:Ruta')->find($idRuta);              

        $em->remove($ruta);
        $em->flush();

        return $this->redirect($this->generateUrl('rutaGestion'));

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/documentos-soporte", name="rutaSoporte")
     */
    public function rutaSoporteAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $rutaSoporte = new RutaSoporte();
        
        $form = $this->createForm(new RutaSoporteType(), $rutaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:RutaSoporte')->findBy(
            array('active' => '1', 'ruta' => $idRuta),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:RutaSoporte')->findBy(
            array('active' => '0', 'ruta' => $idRuta),
            array('fecha_creacion' => 'ASC')
        );
        
        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $rutaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ruta_tipo_soporte'
                    )
                );
                
                $actualizarRutaSoportes = $em->getRepository('AppBundle:RutaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'ruta' => $idRuta
                    )
                );  
            
                foreach ($actualizarRutaSoportes as $actualizarRutaSoporte){
                    echo $actualizarRutaSoporte->getId()." ".$actualizarRutaSoporte->getTipoSoporte()."<br />";
                    $actualizarRutaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarRutaSoporte->setActive(0);
                    $em->flush();
                }
                
                $rutaSoporte->setRuta($ruta);
                $rutaSoporte->setActive(true);
                $rutaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($rutaSoporte);
                $em->flush();

                return $this->redirectToRoute('rutaSoporte', array( 'idRuta' => $idRuta));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:ruta-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/documentos-soporte/{idRutaSoporte}/borrar", name="rutaSoporteBorrar")
     */
    public function rutaSoporteBorrarAction(Request $request, $idRuta, $idRutaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $RutaSoporte = new RutaSoporte();
        
        $rutaSoporte = $em->getRepository('AppBundle:RutaSoporte')->findOneBy(
            array('id' => $idRutaSoporte)
        );
        
        $rutaSoporte->setFechaModificacion(new \DateTime());
        $rutaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('rutaSoporte', array( 'idRuta' => $idRuta));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio", name="rutaTerritorio")
     */
    public function rutaTerritorioAction($idRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        if($ruta->getTerritorioAprendizaje() != null){            
            $idTerritorioAprendizaje = $ruta->getTerritorioAprendizaje()->getId();        

            $territorioAsignado = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
                array('id' => $idTerritorioAprendizaje)
            );
            
        }else{

            $territorioAsignado = null;
        }       

        if($ruta->getTerritorioAprendizaje() == null){            
            $query = $em->createQuery('SELECT t FROM AppBundle:TerritorioAprendizaje t WHERE t.id NOT IN (SELECT territorioAprendizaje.id FROM AppBundle:TerritorioAprendizaje territorioAprendizaje JOIN AppBundle:Ruta arc WHERE territorioAprendizaje = arc.territorio_aprendizaje AND arc.territorio_aprendizaje = :territorio_aprendizaje) AND t.active = 1');
            $query->setParameter('territorio_aprendizaje', $ruta);
            $territorios = $query->getResult();
        }else{
            $territorios = null; 
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:territorio-ruta-gestion-asignacion.html.twig', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioRuta' => $territorioAsignado,
                'idRuta' => $idRuta
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio/{idTerritorio}/nueva-asignacion", name="rutaAsignarTerritorio")
     */
    public function rutaAsignarTerritorioAction($idRuta, $idTerritorio)
    {

        $em = $this->getDoctrine()->getManager();

        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorio)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );     

        $ruta->setTerritorioAprendizaje($territorios);
        $ruta->setActive(true);
        $ruta->setFechaCreacion(new \DateTime());

        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaTerritorio', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioRuta' => $ruta,                 
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-territorio/{idTerritorio}/eliminar", name="rutaEliminarTerritorio")
     */
    public function rutaEliminarTerritorioAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();                

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );                    

        $ruta->setNullTerritorioAprendizaje();

        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaTerritorio',
             array(
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion", name="rutaOrganizacion")
     */
    public function rutaOrganizacionAction($idRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
        
        $territorioAprendizaje = $ruta->getTerritorioAprendizaje()->getId();

        
        $organizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->findBy(
            array('ruta' => $idRuta)
        );        

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionRuta aoc WHERE organizacion = aoc.organizacion AND aoc.ruta = :ruta) AND o.active = 1 AND o.ruta = 1');
            $query->setParameter('ruta', $ruta);
            $organizaciones = $query->getResult();

        $mostrarOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('organizacion' => $organizaciones, 'territorio_aprendizaje' => $territorioAprendizaje));
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-ruta-gestion-asignacion.html.twig', 
            array(
                'organizaciones' => $mostrarOrganizacion, 
                'asignacionesOrganizacionRuta' => $organizacionRuta,
                'idRuta' => $idRuta                              
            ));        
        
    }    

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="rutaAsignarOrganizacion")
     */
    public function rutaAsignarOrganizacionAction($idRuta, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        $asignacionesOrganizacionRuta = new AsignacionOrganizacionRuta();

        $asignacionesOrganizacionRuta->setOrganizacion($organizaciones);
        $asignacionesOrganizacionRuta->setRuta($ruta);           
        $asignacionesOrganizacionRuta->setActive(true);
        $asignacionesOrganizacionRuta->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesOrganizacionRuta);
        $em->flush();



        return $this->redirectToRoute('rutaOrganizacion', 
            array(
                'organizaciones' => $organizaciones, 
                'asignacionesOrganizacionRuta' => $asignacionesOrganizacionRuta,
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-organizacion/{idAsignacionOrganizacionRuta}/eliminar", name="rutaEliminarOrganizacion")
     */
    public function rutaEliminarOrganizacionAction(Request $request, $idRuta, $idAsignacionOrganizacionRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesOrganizacionRuta = new AsignacionOrganizacionRuta();

        $asignacionesOrganizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->find($idAsignacionOrganizacionRuta); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesOrganizacionRuta);
        $em->flush();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        $asignacionesOrganizacionRuta = $em->getRepository('AppBundle:AsignacionOrganizacionRuta')->findBy(
            array('ruta' => $ruta)
        );  

        return $this->redirectToRoute('rutaOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesOrganizacionRuta' => $asignacionesOrganizacionRuta,
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo", name="rutaGrupo")
     */
    public function rutaGrupoAction($idRuta)
    {
         $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );

        if($ruta->getGrupo() != null){            
            $idGrupo = $ruta->getGrupo()->getId();        

            $grupoAsignado = $em->getRepository('AppBundle:Grupo')->findBy(
                array('id' => $idGrupo)
            );
            
        }else{

            $grupoAsignado = null;
        }       

        if($ruta->getGrupo() == null){            
            $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:Ruta arc WHERE grupo = arc.grupo AND arc.grupo = :grupo) AND g.active = 1');
            $query->setParameter('grupo', $ruta);
            $grupos = $query->getResult();      
        }else{
            $grupos = null; 
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-ruta-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoRuta' => $grupoAsignado,
                'idRuta' => $idRuta
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="rutaAsignarGrupo")
     */
    public function rutaAsignarGrupoAction($idRuta, $idGrupo)
    {

       $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        //$asignacionesGrupoPasantia = new Pasantia();

        $ruta->setGrupo($grupos);        
        $ruta->setActive(true);
        $ruta->setFechaCreacion(new \DateTime());

        $em->persist($ruta);
        $em->flush();



        return $this->redirectToRoute('rutaGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoRuta' => $ruta,
                'idRuta' => $idRuta
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/eliminar", name="rutaEliminarGrupo")
     */
    public function rutaEliminarGrupoAction(Request $request, $idRuta)
    {
        $em = $this->getDoctrine()->getManager();                

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );                    

        $ruta->setNullGrupo();

        $em->persist($ruta);
        $em->flush();

        return $this->redirectToRoute('rutaGrupo',
             array(
                'idRuta' => $idRuta
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/asignacion-beneficiario", name="rutaGrupoBeneficiario")
     */
    public function rutaGrupoBeneficiarioAction($idRuta, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->findBy(
            array('ruta' => $idRuta)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($ruta->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioRuta abc WHERE beneficiario = abc.beneficiario AND abc.ruta = :ruta) AND b.active = 1');
        $query->setParameter(':ruta', $ruta);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiario-grupo-ruta-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosRuta' => $beneficiariosRuta,
                'idRuta' => $idRuta, 
                'idGrupo' => $idGrupo,                               
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/nueva-asignacion", name="rutaAsignarGrupoBeneficiario")
     */
    public function rutaAsignarGrupoBeneficiarioAction($idRuta, $idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );  
           
        $asignacionesGrupoBeneficiarioRuta = new AsignacionGrupoBeneficiarioRuta();

        $asignacionesGrupoBeneficiarioRuta->setBeneficiario($beneficiario);        
        $asignacionesGrupoBeneficiarioRuta->setRuta($ruta);           
        $asignacionesGrupoBeneficiarioRuta->setActive(true);
        $asignacionesGrupoBeneficiarioRuta->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesGrupoBeneficiarioRuta);
        $em->flush();



        return $this->redirectToRoute('rutaGrupoBeneficiario', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesGrupoBeneficiarioRuta' => $asignacionesGrupoBeneficiarioRuta,
                'idRuta' => $idRuta,
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/ruta/{idRuta}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/{idBeneficiarioRuta}/eliminar", name="rutaEliminarGrupoBeneficiario")
     */
    public function rutaEliminarGrupoBeneficiarioAction(Request $request, $idRuta, $idGrupo, $idBeneficiario, $idBeneficiarioRuta)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoBeneficiarioRuta = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionesGrupoBeneficiarioRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($idBeneficiarioRuta); 

        $em->remove($asignacionesGrupoBeneficiarioRuta);
        $em->flush();

        $ruta = $em->getRepository('AppBundle:Ruta')->findOneBy(
            array('id' => $idRuta)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosRuta = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->findBy(
            array('ruta' => $idRuta)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioRuta')->find($ruta->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioRuta abc WHERE beneficiario = abc.beneficiario AND abc.ruta = :ruta) AND b.active = 1');
        $query->setParameter(':ruta', $ruta);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('rutaGrupoBeneficiario',
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosRuta' => $beneficiariosRuta,
                'idRuta' => $idRuta, 
                'idGrupo' => $idGrupo,     
            ));      
        
    } 

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/gestion", name="pasantiaGestion")
     */
    public function pasantiaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pasantias = $em->getRepository('AppBundle:Pasantia')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:pasantia-gestion.html.twig', array( 'pasantias' => $pasantias));
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/nuevo", name="pasantiaNuevo")
     */
    public function pasantiaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia= new Pasantia();
        
        $form = $this->createForm(new PasantiaType(), $pasantia);
        
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
            
            $pasantia = $form->getData();


            $pasantia->setActive(true);
            $pasantia->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $pasantia->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($pasantia);
            $em->flush();

            return $this->redirectToRoute('pasantiaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:pasantia-nuevo.html.twig', array('form' => $form->createView()));
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/editar", name="pasantiaEditar")
     */
    public function pasantiaEditarAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia = new Pasantia();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        $form = $this->createForm(new PasantiaType(), $pasantia);
        
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

            $pasantia = $form->getData();

            $pasantia->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $pasantia->setUsuarioModificacion($usuarioModificacion);

            $em->flush();

            return $this->redirectToRoute('pasantiaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:pasantia-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idPasantia' => $idPasantia,
                    'pasantia' => $pasantia,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/eliminar", name="pasantiaEliminar")
     */
    public function pasantiaEliminarAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();
        $pasantia = new Pasantia();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->find($idPasantia);              

        $em->remove($pasantia);
        $em->flush();

        return $this->redirect($this->generateUrl('pasantiaGestion'));

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/documentos-soporte", name="pasantiaSoporte")
     */
    public function pasantiaSoporteAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $pasantiaSoporte = new PasantiaSoporte();
        
        $form = $this->createForm(new PasantiaSoporteType(), $pasantiaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
            array('active' => '1', 'pasantia' => $idPasantia),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
            array('active' => '0', 'pasantia' => $idPasantia),
            array('fecha_creacion' => 'ASC')
        );
        
        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $pasantiaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'pasantia_tipo_soporte'
                    )
                );
                
                $actualizarPasantiaSoportes = $em->getRepository('AppBundle:PasantiaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'pasantia' => $idPasantia
                    )
                );  
            
                foreach ($actualizarPasantiaSoportes as $actualizarPasantiaSoporte){
                    echo $actualizarPasantiaSoporte->getId()." ".$actualizarPasantiaSoporte->getTipoSoporte()."<br />";
                    $actualizarPasantiaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarPasantiaSoporte->setActive(0);
                    $em->flush();
                }
                
                $pasantiaSoporte->setPasantia($pasantia);
                $pasantiaSoporte->setActive(true);
                $pasantiaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($pasantiaSoporte);
                $em->flush();

                return $this->redirectToRoute('pasantiaSoporte', array( 'idPasantia' => $idPasantia));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:pasantia-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/documentos-soporte/{idPasantiaSoporte}/borrar", name="pasantiaSoporteBorrar")
     */
    public function pasantiaSoporteBorrarAction(Request $request, $idPasantia, $idPasantiaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $PasantiaSoporte = new PasantiaSoporte();
        
        $pasantiaSoporte = $em->getRepository('AppBundle:PasantiaSoporte')->findOneBy(
            array('id' => $idPasantiaSoporte)
        );
        
        $pasantiaSoporte->setFechaModificacion(new \DateTime());
        $pasantiaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('pasantiaSoporte', array( 'idPasantia' => $idPasantia));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-territorio", name="pasantiaTerritorio")
     */
    public function pasantiaTerritorioAction($idPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        if($pasantia->getTerritorioAprendizaje() != null){            
            $idTerritorioAprendizaje = $pasantia->getTerritorioAprendizaje()->getId();        

            $territorioAsignado = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
                array('id' => $idTerritorioAprendizaje)
            );
            
        }else{

            $territorioAsignado = null;
        }       

        if($pasantia->getTerritorioAprendizaje() == null){            
            $query = $em->createQuery('SELECT t FROM AppBundle:TerritorioAprendizaje t WHERE t.id NOT IN (SELECT territorioAprendizaje.id FROM AppBundle:TerritorioAprendizaje territorioAprendizaje JOIN AppBundle:Pasantia apc WHERE territorioAprendizaje = apc.territorio_aprendizaje AND apc.territorio_aprendizaje = :territorio_aprendizaje) AND t.active = 1');
            $query->setParameter('territorio_aprendizaje', $pasantia);
            $territorios = $query->getResult();
        }else{
            $territorios = null; 
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:territorio-pasantia-gestion-asignacion.html.twig', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioPasantia' => $territorioAsignado,
                'idPasantia' => $idPasantia
            ));        
        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-territorio/{idTerritorio}/nueva-asignacion", name="pasantiaAsignarTerritorio")
     */
    public function pasantiaAsignarTerritorioAction($idPasantia, $idTerritorio)
    {

        $em = $this->getDoctrine()->getManager();

        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorio)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );     

        $pasantia->setTerritorioAprendizaje($territorios);
        $pasantia->setActive(true);
        $pasantia->setFechaCreacion(new \DateTime());

        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaTerritorio', 
            array(
                'territorios' => $territorios,
                'asignacionesTerritorioPasantia' => $pasantia,                 
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantias/{idPasantia}/asignacion-territorio/{idTerritorio}/eliminar", name="pasantiaEliminarTerritorio")
     */
    public function pasantiaEliminarTerritorioAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();                

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );                    

        $pasantia->setNullTerritorioAprendizaje();

        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaTerritorio',
             array(
                'idPasantia' => $idPasantia
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion", name="pasantiaOrganizacion")
     */
    public function pasantiaOrganizacionAction($idPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
        
        $territorioAprendizaje = $pasantia->getTerritorioAprendizaje()->getId();

        
        $organizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );        

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionPasantia aoc WHERE organizacion = aoc.organizacion AND aoc.pasantia = :pasantia) AND o.active = 1 AND o.pasantia = 1');
            $query->setParameter('pasantia', $pasantia);
            $organizaciones = $query->getResult();

        $mostrarOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('organizacion' => $organizaciones, 'territorio_aprendizaje' => $territorioAprendizaje));
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-pasantia-gestion-asignacion.html.twig', 
            array(
                'organizaciones' => $mostrarOrganizacion, 
                'asignacionesOrganizacionPasantia' => $organizacionPasantia,
                'idPasantia' => $idPasantia                              
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="pasantiaAsignarOrganizacion")
     */
    public function pasantiaAsignarOrganizacionAction($idPasantia, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        $asignacionesOrganizacionPasantia = new AsignacionOrganizacionPasantia();

        $asignacionesOrganizacionPasantia->setOrganizacion($organizaciones);
        $asignacionesOrganizacionPasantia->setPasantia($pasantia);           
        $asignacionesOrganizacionPasantia->setActive(true);
        $asignacionesOrganizacionPasantia->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesOrganizacionPasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaOrganizacion', 
            array(
                'organizaciones' => $organizaciones, 
                'asignacionesOrganizacionPasantia' => $asignacionesOrganizacionPasantia,
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-organizacion/{idAsignacionOrganizacionPasantia}/eliminar", name="pasantiaEliminarOrganizacion")
     */
    public function pasantiaEliminarOrganizacionAction(Request $request, $idPasantia, $idAsignacionOrganizacionPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesOrganizacionPasantia = new AsignacionOrganizacionPasantia();

        $asignacionesOrganizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->find($idAsignacionOrganizacionPasantia); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesOrganizacionPasantia);
        $em->flush();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        $asignacionesOrganizacionPasantia = $em->getRepository('AppBundle:AsignacionOrganizacionPasantia')->findBy(
            array('pasantia' => $pasantia)
        );  

        return $this->redirectToRoute('pasantiaOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesOrganizacionPasantia' => $asignacionesOrganizacionPasantia,
                'idPasantia' => $idPasantia
            ));    
        
    }

    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo", name="pasantiaGrupo")
     */
    public function pasantiaGrupoAction($idPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );

        if($pasantia->getGrupo() != null){            
            $idGrupo = $pasantia->getGrupo()->getId();        

            $grupoAsignado = $em->getRepository('AppBundle:Grupo')->findBy(
                array('id' => $idGrupo)
            );
            
        }else{

            $grupoAsignado = null;
        }       

        if($pasantia->getGrupo() == null){            
            $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:Pasantia apc WHERE grupo = apc.grupo AND apc.grupo = :grupo) AND g.active = 1');
            $query->setParameter('grupo', $pasantia);
            $grupos = $query->getResult();      
        }else{
            $grupos = null; 
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:grupo-pasantia-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoPasantia' => $grupoAsignado,
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="pasantiaAsignarGrupo")
     */
    public function pasantiaAsignarGrupoAction($idPasantia, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

        $grupos = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        //$asignacionesGrupoPasantia = new Pasantia();

        $pasantia->setGrupo($grupos);        
        $pasantia->setActive(true);
        $pasantia->setFechaCreacion(new \DateTime());

        $em->persist($pasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaGrupo', 
            array(
                'grupos' => $grupos, 
                'asignacionesGrupoPasantia' => $pasantia,
                'idPasantia' => $idPasantia
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/eliminar", name="pasantiaEliminarGrupo")
     */
    public function pasantiaEliminarGrupoAction(Request $request, $idPasantia)
    {
        $em = $this->getDoctrine()->getManager();                

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );                    

        $pasantia->setNullGrupo();

        $em->persist($pasantia);
        $em->flush();

        return $this->redirectToRoute('pasantiaGrupo',
             array(
                'idPasantia' => $idPasantia
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/asignacion-beneficiario", name="pasantiaGrupoBeneficiario")
     */
    public function pasantiaGrupoBeneficiarioAction($idPasantia, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();    

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($pasantia->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioPasantia abc WHERE beneficiario = abc.beneficiario AND abc.pasantia = :pasantia) AND b.active = 1');
        $query->setParameter(':pasantia', $pasantia);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );
       
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:beneficiario-grupo-pasantia-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosPasantia' => $beneficiariosPasantia,
                'idPasantia' => $idPasantia, 
                'idGrupo' => $idGrupo,               
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/nueva-asignacion", name="pasantiaAsignarGrupoBeneficiario")
     */
    public function pasantiaAsignarGrupoBeneficiarioAction($idPasantia, $idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );  
           
        $asignacionesGrupoBeneficiarioPasantia = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionesGrupoBeneficiarioPasantia->setBeneficiario($beneficiario);        
        $asignacionesGrupoBeneficiarioPasantia->setPasantia($pasantia);           
        $asignacionesGrupoBeneficiarioPasantia->setActive(true);
        $asignacionesGrupoBeneficiarioPasantia->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesGrupoBeneficiarioPasantia);
        $em->flush();



        return $this->redirectToRoute('pasantiaGrupoBeneficiario', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesGrupoBeneficiarioPasantia' => $asignacionesGrupoBeneficiarioPasantia,
                'idPasantia' => $idPasantia,
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/pasantia/{idPasantia}/asignacion-grupo/{idGrupo}/{idBeneficiario}/asignacion-beneficiario/{idBeneficiarioPasantia}/eliminar", name="pasantiaEliminarGrupoBeneficiario")
     */
    public function pasantiaEliminarGrupoBeneficiarioAction(Request $request, $idPasantia, $idGrupo, $idBeneficiario, $idBeneficiarioPasantia)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoBeneficiarioPasantia = new AsignacionGrupoBeneficiarioPasantia();

        $asignacionesGrupoBeneficiarioPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($idBeneficiarioPasantia); 

        $em->remove($asignacionesGrupoBeneficiarioPasantia);
        $em->flush();

        $pasantia = $em->getRepository('AppBundle:Pasantia')->findOneBy(
            array('id' => $idPasantia)
        );   
      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );                

        $beneficiarioGrupo = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarioGrupo));
        
        
        $beneficiariosPasantia = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->findBy(
            array('pasantia' => $idPasantia)
        );

        $beneficiariosPrueba = $em->getRepository('AppBundle:AsignacionGrupoBeneficiarioPasantia')->find($pasantia->getId());

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionGrupoBeneficiarioPasantia abc WHERE beneficiario = abc.beneficiario AND abc.pasantia = :pasantia) AND b.active = 1');
        $query->setParameter(':pasantia', $pasantia);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('pasantiaGrupoBeneficiario',
            array(
                'beneficiarios' => $mostrarBeneficiarios,                
                'beneficiariosPasantia' => $beneficiariosPasantia,
                'idPasantia' => $idPasantia, 
                'idGrupo' => $idGrupo,     
            ));      
        
    } 


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/gestion", name="organizacionGestion")
     */
    public function organizacionGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-gestion.html.twig', array( 'organizaciones' => $organizaciones));
    }




/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/nuevo", name="organizacionNuevo")
     */
    public function organizacionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();
        
        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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
            
            $organizacion = $form->getData();

            if($organizacion->getRural() == true){             
                $organizacion->setBarrio(null);
            }
            else
            {
                $organizacion->setCorregimiento(null);
                $organizacion->setVereda(null);
                $organizacion->setCacerio(null);
            }

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($organizacion);
            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-nuevo.html.twig', array('form' => $form->createView()));
    }




/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/editar", name="organizacionEditar")
     */
    public function organizacionEditarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );

        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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

            $organizacion = $form->getData();

            if($organizacion->getRural() == true){             
                $organizacion->setBarrio(null);
            }
            else
            {
                $organizacion->setCorregimiento(null);
                $organizacion->setVereda(null);
                $organizacion->setCacerio(null);
            }

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());


            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $organizacion->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idOrganizacion' => $idOrganizacion,
                    'organizacion' => $organizacion,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/eliminar", name="organizacionEliminar")
     */
    public function organizacionEliminarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->find($idOrganizacion);              

        $em->remove($organizacion);
        $em->flush();

        return $this->redirect($this->generateUrl('organizacionGestion'));

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte", name="organizacionSoporte")
     */
    public function organizacionSoporteAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();

        $organizacionSoporte = new OrganizacionSoporte();
        
        $form = $this->createForm(new OrganizacionSoporteType(), $organizacionSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '1', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '0', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );
        
        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $organizacionSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'organizacion_tipo_soporte'
                    )
                );
                
                $actualizarOrganizacionSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'organizacion' => $idOrganizacion
                    )
                );  
            
                foreach ($actualizarOrganizacionSoportes as $actualizarOrganizacionSoporte){
                    echo $actualizarOrganizacionSoporte->getId()." ".$actualizarOrganizacionSoporte->getTipoSoporte()."<br />";
                    $actualizarOrganizacionSoporte->setFechaModificacion(new \DateTime());
                    $actualizarOrganizacionSoporte->setActive(0);
                    $em->flush();
                }
                
                $organizacionSoporte->setOrganizacion($pasantia);
                $organizacionSoporte->setActive(true);
                $organizacionSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($organizacionSoporte);
                $em->flush();

                return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:organizacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte/{idOrganizacionSoporte}/borrar", name="organizacionSoporteBorrar")
     */
    public function organizacionSoporteBorrarAction(Request $request, $idOrganizacion, $idOrganizacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $OrganizacionSoporte = new OrganizacionSoporte();
        
        $organizacionSoporte = $em->getRepository('AppBundle:OrganizacionSoporte')->findOneBy(
            array('id' => $idOrganizacionSoporte)
        );
        
        $organizacionSoporte->setFechaModificacion(new \DateTime());
        $organizacionSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
        
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/gestion", name="territorioaprendizajeGestion")
     */
    public function territorioaprendizajeGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $territorios = $em->getRepository('AppBundle:TerritorioAprendizaje')->findBy(
            array('active' => '1')
            
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:territorio-gestion.html.twig', array( 'territorios' => $territorios));
    }




/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/nuevo", name="territorioaprendizajeNuevo")
     */
    public function territorioaprendizajeNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();
        
        $form = $this->createForm(new TerritorioAprendizajeType(), $territorio);
        
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
            
            $territorio = $form->getData();

            $territorio->setActive(true);
            $territorio->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($territorio);
            $em->flush();

            return $this->redirectToRoute('territorioaprendizajeGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:territorio-nuevo.html.twig', array('form' => $form->createView()));
    }




/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/editar", name="territorioaprendizajeEditar")
     */
    public function territorioaprendizajeEditarAction(Request $request, $idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();

        $territorio = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );

        $form = $this->createForm(new TerritorioAprendizajeType(), $territorio);
        
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

            $territorio = $form->getData();

            $territorio->setFechaModificacion(new \DateTime());

            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $territorio->setUsuarioModificacion($usuarioModificacion);

            $em->flush();

            return $this->redirectToRoute('territorioaprendizajeGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:territorio-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTerritorioAprendizaje' => $idTerritorioAprendizaje,
                    'territorio' => $territorio,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/eliminar", name="territorioaprendizajeEliminar")
     */
    public function territorioaprendizajeEliminarAction(Request $request, $idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();
        $territorio = new TerritorioAprendizaje();

        $territorio = $em->getRepository('AppBundle:TerritorioAprendizaje')->find($idTerritorioAprendizaje);              

        $em->remove($territorio);
        $em->flush();

        return $this->redirect($this->generateUrl('territorioaprendizajeGestion'));

    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion", name="territorioAprendizajeOrganizacion")
     */
    public function territorioAprendizajeOrganizacionAction($idTerritorioAprendizaje)
    {
        $em = $this->getDoctrine()->getManager();

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );     

        $asignacionesTerritoriosOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('territorio_aprendizaje' => $territorioAprendizaje)
        ); 

        $query = $em->createQuery('SELECT o FROM AppBundle:Organizacion o WHERE o.id NOT IN (SELECT organizacion.id FROM AppBundle:Organizacion organizacion JOIN AppBundle:AsignacionOrganizacionTerritorioAprendizaje atc WHERE organizacion = atc.organizacion AND atc.territorio_aprendizaje = :territorio_aprendizaje) AND o.active = 1');
        $query->setParameter('territorio_aprendizaje', $territorioAprendizaje);
        $organizaciones = $query->getResult();      


        return $this->render('AppBundle:GestionParametro:organizacion-territorio-gestion-asignacion.html.twig', 
            array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritoriosOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion/{idOrganizacion}/nueva-asignacion", name="territorioAprendizajeAsignarOrganizacion")
     */
    public function territorioAprendizajeAsignarOrganizacionAction($idTerritorioAprendizaje, $idOrganizacion)
    {

        $em = $this->getDoctrine()->getManager();

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );  

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );  
           
        $asignacionesTerritorioOrganizacion = new AsignacionOrganizacionTerritorioAprendizaje();

        $asignacionesTerritorioOrganizacion->setOrganizacion($organizaciones);
        $asignacionesTerritorioOrganizacion->setTerritorioAprendizaje($territorioAprendizaje);        
        $asignacionesTerritorioOrganizacion->setActive(true);
        $asignacionesTerritorioOrganizacion->setFechaCreacion(new \DateTime());

        $em->persist($asignacionesTerritorioOrganizacion);
        $em->flush();



        return $this->redirectToRoute('territorioAprendizajeOrganizacion', 
            array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritorioOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/territorio/{idTerritorioAprendizaje}/asignacion-organizacion/{idTerritorioOrganizacion}/eliminar", name="territorioAprendizajeEliminarOrganizacion")
     */
    public function territorioAprendizajeEliminarOrganizacionAction(Request $request, $idTerritorioAprendizaje, $idTerritorioOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesTerritorioOrganizacion = new AsignacionOrganizacionTerritorioAprendizaje();

        $asignacionesTerritorioOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->find(
            $idTerritorioOrganizacion); 

        $organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        $em->remove($asignacionesTerritorioOrganizacion);
        $em->flush();

        $territorioAprendizaje = $em->getRepository('AppBundle:TerritorioAprendizaje')->findOneBy(
            array('id' => $idTerritorioAprendizaje)
        );     

        $asignacionesTerritoriosOrganizacion = $em->getRepository('AppBundle:AsignacionOrganizacionTerritorioAprendizaje')->findBy(
            array('territorio_aprendizaje' => $territorioAprendizaje)
        ); 

        return $this->redirectToRoute('territorioAprendizajeOrganizacion',
             array(
                'organizaciones' => $organizaciones,
                'asignacionesTerritoriosOrganizacion' => $asignacionesTerritorioOrganizacion,
                'idTerritorioAprendizaje' => $idTerritorioAprendizaje
            ));    
        
    }   



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/diagnostico/nuevo", name="diagnosticoNuevo")
     */
    public function diagnosticoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Diagnosticoorganizacional= new DiagnosticoOrganizacional();
        
        $form = $this->createForm(new DiagnosticoOrganizacionalType(), $Diagnosticoorganizacional);
        
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
            
            $Diagnosticoorganizacional = $form->getData();


            $Diagnosticoorganizacional->setActive(true);
            $Diagnosticoorganizacional->setFechaCreacion(new \DateTime());

            $resultadoproductiva = ($Diagnosticoorganizacional->getProductivaA())+($Diagnosticoorganizacional->getProductivaB())+($Diagnosticoorganizacional->getProductivaC())+($Diagnosticoorganizacional->getProductivaD())+($Diagnosticoorganizacional->getProductivaE())+($Diagnosticoorganizacional->getProductivaF());
            $resultadocomercial = ($Diagnosticoorganizacional->getComercialA())+($Diagnosticoorganizacional->getComercialB())+($Diagnosticoorganizacional->getComercialC())+($Diagnosticoorganizacional->getComercialD())+($Diagnosticoorganizacional->getComercialE());
            $resultadofinanciera = ($Diagnosticoorganizacional->getFinancieraA())+($Diagnosticoorganizacional->getFinancieraB())+($Diagnosticoorganizacional->getFinancieraC())+($Diagnosticoorganizacional->getFinancieraD())+($Diagnosticoorganizacional->getFinancieraE())+($Diagnosticoorganizacional->getFinancieraF());
            $resultadoadministrativa = ($Diagnosticoorganizacional->getAdministrativaA())+($Diagnosticoorganizacional->getAdministrativaB())+($Diagnosticoorganizacional->getAdministrativaC())+($Diagnosticoorganizacional->getAdministrativaD())+($Diagnosticoorganizacional->getAdministrativaE());
            $resultadoorganizacional = ($Diagnosticoorganizacional->getOrganizacionalA())+($Diagnosticoorganizacional->getOrganizacionalB())+($Diagnosticoorganizacional->getOrganizacionalC())+($Diagnosticoorganizacional->getOrganizacionalD())+($Diagnosticoorganizacional->getOrganizacionalE())+($Diagnosticoorganizacional->getOrganizacionalF());
            $resultadototal=$resultadoproductiva+$resultadocomercial+ $resultadofinanciera+$resultadoadministrativa+$resultadoorganizacional +$resultadoorganizacional;

            $Diagnosticoorganizacional->setTotalProductiva($resultadoproductiva);
            $Diagnosticoorganizacional->setTotalComercial($resultadocomercial);
            $Diagnosticoorganizacional->setTotalFinanciera($resultadofinanciera);
            $Diagnosticoorganizacional->setTotalAdministrativa($resultadoadministrativa);
            $Diagnosticoorganizacional->setTotalOrganizacional($resultadoorganizacional);
            $Diagnosticoorganizacional->setTotal($resultadototal);

            $em->persist($Diagnosticoorganizacional);
            $em->flush();

            return $this->redirectToRoute(
            'diagnosticoCalcular', 
            array(
                    'idDiagnosticoOrganizacional' => $Diagnosticoorganizacional->getId()
            )
        );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:diagnostico-nuevo.html.twig',
         array('form' => $form->createView(),
        
            )
         );
    }
   


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/diagnostico/{idDiagnosticoOrganizacional}/resultado", name="diagnosticoCalcular")
     */
    public function diagnosticoCalcularAction(Request $request, $idDiagnosticoOrganizacional)
    {
        $em = $this->getDoctrine()->getManager();

        $Diagnosticoorganizacional= $em->getRepository('AppBundle:DiagnosticoOrganizacional')->findOneBy(
            array('id' =>$idDiagnosticoOrganizacional) );

        $resultadoproductiva=$Diagnosticoorganizacional->getTotalProductiva();
        $resultadocomercial=$Diagnosticoorganizacional->getTotalComercial();
        $resultadofinanciera=$Diagnosticoorganizacional->getTotalFinanciera();
        $resultadoadministrativa=$Diagnosticoorganizacional->getTotalAdministrativa();
        $resultadoorganizacional=$Diagnosticoorganizacional->getTotalOrganizacional();
        $resultadototal=$Diagnosticoorganizacional->getTotal();


                 ;   
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:diagnostico-resultado.html.twig', 
            array(  
                'resultadoproductiva'=>$resultadoproductiva,
                'resultadocomercial'=>$resultadocomercial,
                'resultadofinanciera'=>$resultadofinanciera,
                'resultadoadministrativa'=>$resultadoadministrativa,
                'resultadoorganizacional'=>$resultadoorganizacional,
                'resultadototal'=>$resultadototal,
                'DiagnosticoOrganizacional' => $Diagnosticoorganizacional
            )
        );
    }


 /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/gestion", name="feriaGestion")
     */
    public function feriaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ferias = $em->getRepository('AppBundle:Feria')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:feria-gestion.html.twig', array( 'ferias' => $ferias));
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/nuevo", name="feriaNuevo")
     */
    public function feriaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $feria= new Feria();
        
        $form = $this->createForm(new FeriaType(), $feria);
        
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
            
            $feria = $form->getData();


            $feria->setActive(true);
            $feria->setFechaCreacion(new \DateTime());
            $em->persist($feria);
            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial:feria-nuevo.html.twig', array('form' => $form->createView()));
    }





/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/eliminar", name="feriaEliminar")
     */
    public function feriaEliminarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->find($idFeria);              

        $em->remove($feria);
        $em->flush();

        return $this->redirect($this->generateUrl('feriaGestion'));

    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/documentos-soporte", name="feriaSoporte")
     */
    public function feriaSoporteAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();

        $feriaSoporte = new FeriaSoporte();
        
        $form = $this->createForm(new FeriaSoporteType(), $feriaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '1', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '0', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );
        
        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $feriaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarFeriaSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'feria' => $idFeria
                    )
                );  
            
                foreach ($actualizarFeriaSoportes as $actualizarFeriaSoporte){
                    echo $actualizarFeriaSoporte->getId()." ".$actualizarFeriaSoporte->getTipoSoporte()."<br />";
                    $actualizarFeriaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarFeriaSoporte->setActive(0);
                    $em->flush();
                }
                
                $feriaSoporte->setFeria($feria);
                $feriaSoporte->setActive(true);
                $feriaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($feriaSoporte);
                $em->flush();

                return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:feria-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/documentos-soporte/{idFeriaSoporte}/borrar", name="feriaSoporteBorrar")
     */
    public function feriaSoporteBorrarAction(Request $request, $idFeria, $idFeriaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $FeriaSoporte = new FeriaSoporte();
        
        $feriaSoporte = $em->getRepository('AppBundle:FeriaSoporte')->findOneBy(
            array('id' => $idFeriaSoporte)
        );
        
        $feriaSoporte->setFechaModificacion(new \DateTime());
        $feriaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
        
    }



/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/editar", name="feriaEditar")
     */
    public function feriaEditarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        //echo $integrantes->getPertenenciaEtnica();
        $form = $this->createForm(new FeriaType(), $feria);
        
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

            $feria = $form->getData();

            $feria->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial:feria-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idFeria' => $idFeria,
                    'feria' => $feria,
            )
        );

               
    }




	
}
