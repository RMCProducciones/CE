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


use AppBundle\Entity\Taller;
use AppBundle\Entity\AsignacionBeneficiarioTaller;
use AppBundle\Entity\TallerSoporte;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\Nodo;
use AppBundle\Entity\Camino;


use AppBundle\Form\GestionEmpresarial\TallerSoporteType;
use AppBundle\Form\GestionEmpresarial\TallerType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class TallerController extends Controller
{

    /**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/gestion", name="tallerGestion")
     */
    public function tallerGrupoGestionAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo));

        $taller = $em->getRepository('AppBundle:Taller')->findBy(          
            array('grupo' => $grupo)
        );

        /*echo $grupo->getNombre();
        asdasfasf;*/

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-gestion.html.twig', 
            array( 'taller' => $taller,
                   'idGrupo' => $idGrupo,
                   'grupo' => $grupo
                )
        );
    }



/**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/nuevo", name="tallerNuevo")
     */
    public function tallerGrupoNuevoAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo));
        
        $form = $this->createForm(new TallerType(), $taller);
        
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
            
            $taller = $form->getData();

            $taller->setAsistentes('0');
            $taller->setGrupo($grupo);
            $taller->setActive(true);
            $taller->setFechaCreacion(new \DateTime());


            $em->persist($taller);
            $em->flush();

            return $this->redirectToRoute('tallerGestion', 
                array( 'idGrupo' => $idGrupo
                )
            );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-nuevo.html.twig', 
            array('form' => $form->createView(),
                  'idGrupo' => $idGrupo));
    }

    
/**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/{idTaller}/editar", name="tallerEditar")
     */
    public function tallerGrupoEditarAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)
        );

        $form = $this->createForm(new TallerType(), $taller);
        
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

            $taller = $form->getData();

            $taller->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('tallerGestion', 
                array( 'idGrupo' => $idGrupo
                )
            );
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTaller' => $idTaller,
                    'taller' => $taller,
                    'idGrupo' => $idGrupo
            )
        );

    }


/**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/{idTaller}/eliminar", name="tallerEliminar")
     */
    public function tallerGrupoEliminarAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller));              

        $em->remove($taller);
        $em->flush();

        return $this->redirect($this->generateUrl('tallerGestion',
            array('idGrupo' => $idGrupo)
            )
        );

    }



/**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/{idTaller}/documentos-soporte", name="tallerSoporte")
     */
    public function tallerGrupoSoporteAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();

        $tallerSoporte = new TallerSoporte();
        
        $form = $this->createForm(new TallerSoporteType(), $tallerSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:TallerSoporte')->findBy(
            array('active' => '1', 'taller' => $idTaller),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:TallerSoporte')->findBy(
            array('active' => '0', 'taller' => $idTaller),
            array('fecha_creacion' => 'ASC')
        );
        
        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $tallerSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarTallerSoportes = $em->getRepository('AppBundle:TallerSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'taller' => $idTaller
                    )
                );  
            
                foreach ($actualizarTallerSoportes as $actualizarTallerSoporte){
                    echo $actualizarTallerSoporte->getId()." ".$actualizarTallerSoporte->getTipoSoporte()."<br />";
                    $actualizarTallerSoporte->setFechaModificacion(new \DateTime());
                    $actualizarTallerSoporte->setActive(0);
                    $em->flush();
                }
                
                $tallerSoporte->setTaller($taller);
                $tallerSoporte->setActive(true);
                $tallerSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($tallerSoporte);
                $em->flush();

                return $this->redirectToRoute('tallerSoporte', array( 'idTaller' => $idTaller, 'idGrupo' => $idGrupo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idGrupo' => $idGrupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/{idTaller}/documentos-soporte/{idTallerSoporte}/borrar", name="tallerSoporteBorrar")
     */
    public function tallerGrupoSoporteBorrarAction(Request $request, $idGrupo, $idTaller, $idTallerSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $tallerSoporte = new TallerSoporte();
        
        $tallerSoporte = $em->getRepository('AppBundle:TallerSoporte')->findOneBy(
            array('id' => $idTallerSoporte)
        );
        
        $tallerSoporte->setFechaModificacion(new \DateTime());
        $tallerSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('tallerSoporte', array( 'idTaller' => $idTaller, 'idGrupo' => $idGrupo));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/taller/{idGrupo}/{idTaller}/asignacion-beneficiarios", name="beneficiarioTaller")
     */
    public function tallerGrupoBeneficiarioAction($idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller));

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );

        $asignacionBeneficiarioTaller = $em->getRepository('AppBundle:AsignacionBeneficiarioTaller')->findBy(
            array('taller' => $taller)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioTaller abt WHERE beneficiario = abt.beneficiario AND abt.taller = :taller) AND b.active = 1');
        $query->setParameter(':taller', $taller);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo)
        );


        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-beneficiario-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosTaller' => $asignacionBeneficiarioTaller,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo,
                'idTaller' => $idTaller
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/taller/{idGrupo}/{idTaller}/asignacion-beneficiarios/{idBeneficiario}/nueva-asignacion", name="beneficiarioTallerAsignacion")
     */
    public function tallerGrupoAsignarBeneficiarioAction($idGrupo, $idTaller, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)); 

        
           
        $asignacionBeneficiarioTaller = new AsignacionBeneficiarioTaller();

        $asignacionBeneficiarioTaller->setGrupo($grupo);        
        $asignacionBeneficiarioTaller->setBeneficiario($beneficiario);
        $asignacionBeneficiarioTaller->setTaller($taller);
        $asignacionBeneficiarioTaller->setActive(true);
        $asignacionBeneficiarioTaller->setFechaCreacion(new \DateTime());
        //$taller->setAsistentes($consecutivo);

        $em->persist($asignacionBeneficiarioTaller);                
        $em->flush();

        $tamaño = $em->getRepository('AppBundle:AsignacionBeneficiarioTaller')->findBy(
            array('taller' => $taller));

        $taller->setAsistentes(sizeof($tamaño));

        $em->persist($taller); 
        $em->flush();             

        return $this->redirectToRoute('beneficiarioTaller', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiariosTaller' => $asignacionBeneficiarioTaller,                
                'idGrupo' => $idGrupo,
                'idTaller' => $idTaller,
                'taller' => $taller
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/taller/{idGrupo}/{idTaller}/asignacion-beneficiarios/{idAsignacionTallerBeneficiario}/{consecutivo}/eliminar", name="beneficiarioTallerEliminar")
     */
    public function tallerGrupoEliminarBeneficiarioAction($idGrupo, $idTaller, $idAsignacionTallerBeneficiario, $consecutivo)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioTaller = new AsignacionBeneficiarioTaller();

        $asignacionBeneficiarioTaller = $em->getRepository('AppBundle:AsignacionBeneficiarioTaller')->find($idAsignacionTallerBeneficiario); 

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)
        );

        $em->remove($asignacionBeneficiarioTaller);        
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionBeneficiarioTaller = $em->getRepository('AppBundle:AsignacionBeneficiarioTaller')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioTaller abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        $tamaño = $em->getRepository('AppBundle:AsignacionBeneficiarioTaller')->findBy(
            array('taller' => $taller));

        $taller->setAsistentes(sizeof($tamaño));

        $em->persist($taller); 
        $em->flush();

        return $this->redirectToRoute('beneficiarioTaller', 
            array(
                'beneficiario' => $beneficiarios,          
                'asignacionesBeneficiariosTaller' => $asignacionBeneficiarioTaller,                
                'idGrupo' => $idGrupo,
                'idTaller' => $idTaller,
                'taller' => $taller
            ));           
        
    } 

    /**
     * @Route("/gestion-empresarial/gestion-empresarial/taller/{idGrupo}/cerrar", name="talleresGrupoCerrar")
     */
    public function tallerGrupoCerrarAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        
        self::nodoCamino($idGrupo, 11, 2);
        self::nodoCamino($idGrupo, 12, 1);

        $em->flush();

        return $this->redirectToRoute('seguimientoGrupo', 
            array('idGrupo' => $idGrupo)
        );
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

