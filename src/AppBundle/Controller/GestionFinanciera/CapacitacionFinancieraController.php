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

use AppBundle\Entity\CapacitacionFinanciera;
use AppBundle\Entity\CapacitacionFinancieraSoporte;
use AppBundle\Entity\DocumentoSoporte;
use AppBundle\Entity\AsignacionBeneficiarioProgramaCapacitacionFinanciera;


use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraType;
use AppBundle\Form\GestionFinanciera\CapacitacionFinancieraSoporteType;
use AppBundle\Form\GestionFinanciera\BeneficiarioPCFFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class CapacitacionFinancieraController extends Controller
{
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/gestion", name="capacitacionFinancieraGestion")
     */
    public function capacitacionFinancieraGestionAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinancieras= $em->getRepository('AppBundle:CapacitacionFinanciera')->findBY(
            array('active' => 1,
                  'programaCapacitacionFinanciera' => $idPCF)
        ); 
         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $capacitacionFinancieras, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-gestion.html.twig', 
            array( 'capacitacionFinancieras' => $capacitacionFinancieras,
                    'pagination' => $pagination,
                    'idPCF' => $idPCF
                )
            );
    }  
    
     /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/nuevo", name="capacitacionFinancieraNuevo")
     */
    public function capacitacionFinancieraNuevoAction(Request $request, $idPCF)
    {
        $em = $this->getDoctrine()->getManager();

        $programaCapacitacion= $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findOneBy(
            array('id' => $idPCF)
        );

        $capacitacionFinanciera = new CapacitacionFinanciera();
        
        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setProgramaCapacitacionFinanciera($programaCapacitacion);
            $capacitacionFinanciera->setActive(true);
            $capacitacionFinanciera->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacionFinanciera->setUsuarioCreacion($usuario);


            
            $em->persist($capacitacionFinanciera);
            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion', array('idPCF' => $idPCF));
        }
        
        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-nuevo.html.twig', 
            array('form' => $form->createView(),
                  'idPCF' => $idPCF ));
    } 


 /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/editar", name="capacitacionFinancieraEditar")
     */
    public function capacitacionFinancieraEditarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );

        $form = $this->createForm(new CapacitacionFinancieraType(), $capacitacionFinanciera);
        
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

            $capacitacionFinanciera = $form->getData();

            $capacitacionFinanciera->setFechaModificacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $capacitacionFinanciera->setUsuarioModificacion($usuario);


            $em->flush();

            return $this->redirectToRoute('capacitacionFinancieraGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCapacitacionFinanciera' => $idCapacitacionFinanciera,
                    'capacitacionFinanciera' => $capacitacionFinanciera,
            )
        );

    }
/**
     * @Route("/gestion-financiera/cprograma-capacitacion-financiera/apacitacion/{idCapacitacionFinanciera}/eliminar", name="capacitacionFinancieraEliminar")
     */
    public function capacitacionFinancieraEliminarAction(Request $request, $idCapacitacionFinanciera)
    {
        $em = $this->getDoctrine()->getManager();
        $capacitacionFinanciera = new CapacitacionFinanciera();

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->find($idCapacitacionFinanciera);              

        $em->remove($capacitacionFinanciera);
        $em->flush();

        return $this->redirect($this->generateUrl('capacitacionFinancieraGestion'));

    }



/**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte", name="capacitacionFinancieraSoporte")
     */
    public function capacitacionFinancieraSoporteAction(Request $request, $idCapacitacionFinanciera)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $form = $this->createForm(new CapacitacionFinancieraSoporteType(), $capacitacionFinancieraSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '1', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
            array('active' => '0', 'capacitacionFinanciera' => $idCapacitacionFinanciera),
            array('fecha_creacion' => 'ASC')
        );
        
        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacionFinanciera)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $capacitacionFinancieraSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'capacitacion_financiera_tipo_soporte'
                    )
                );
                
                $actualizarCapacitacionFinancieraSoportes = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'capacitacionFinanciera' => $idCapacitacionFinanciera
                    )
                );  
            
                foreach ($actualizarCapacitacionFinancieraSoportes as $actualizarCapacitacionFinancieraSoporte){
                    echo $actualizarCapacitacionFinancieraSoporte->getId()." ".$actualizarCapacitacionFinancieraSoporte->getTipoSoporte()."<br />";
                    $actualizarCapacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
                    $actualizarCapacitacionFinancieraSoporte->setActive(0);
                    $actualizarCapacitacionFinancieraSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $capacitacionFinancieraSoporte->setCapacitacionFinanciera($capacitacionFinanciera);
                $capacitacionFinancieraSoporte->setActive(true);
                $capacitacionFinancieraSoporte->setFechaCreacion(new \DateTime());
                $capacitacionFinancieraSoporte->setUsuarioCreacion($usuario);

                $em->persist($capacitacionFinancieraSoporte);
                $em->flush();

                return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera/CapacitacionFinanciera:capacitacion-financiera-capacitacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/capacitacion/{idCapacitacionFinanciera}/documentos-soporte/{idCapacitacionFinancieraSoporte}/borrar", name="capacitacionFinancieraSoporteBorrar")
     */
    public function capacitacionFinancieraSoporteBorrarAction(Request $request, $idCapacitacionFinanciera, $idCapacitacionFinancieraSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $capacitacionFinancieraSoporte = new CapacitacionFinancieraSoporte();
        
        $capacitacionFinancieraSoporte = $em->getRepository('AppBundle:CapacitacionFinancieraSoporte')->findOneBy(
            array('id' => $idCapacitacionFinancieraSoporte)
        );
        
        $capacitacionFinancieraSoporte->setFechaModificacion(new \DateTime());
        $capacitacionFinancieraSoporte->setActive(0);
        $capacitacionFinancieraSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('capacitacionFinancieraSoporte', array( 'idCapacitacionFinanciera' => $idCapacitacionFinanciera));
        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario", name="beneficiarioCapacitacionFinancieraGestion")
     */
    public function beneficiarioCapacitacionFinancieraAction(Request $request, $idPCF, $idCapacitacion)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $programaCapacitacion = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBy(
            array('id' => $idPCF)
        );                     

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findBy(
            array('id' => $idCapacitacion,
                  'programaCapacitacionFinanciera' => $idPCF)
        );

        $asignacionesBeneficiariosPCF = $em->getRepository('AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera')->findBy(
            array('programaCapacitacionFinanciera' => $idCapacitacion)
        );

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera abc WHERE beneficiario = abc.beneficiario AND abc.programaCapacitacionFinanciera = :programaCapacitacionFinanciera) AND b.active = 1');
        $query->setParameter(':programaCapacitacionFinanciera', $capacitacionFinanciera);
        $beneficiarios = $query->getResult();

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new BeneficiarioPCFFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
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
            $beneficiarios, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:asignacion-beneficiario-capacitacion-financiera-gestion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query,
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosPCF,
                'idPCF' => $idPCF,
                'idCapacitacion' => $idCapacitacion,
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

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario/{idBeneficiario}/asignacion-participante", name="participanteCapacitacionFinancieraGestion")
     */
    public function participanteCapacitacionFinancieraAction(Request $request, $idPCF, $idCapacitacion, $idBeneficiario)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $programaCapacitacion = $em->getRepository('AppBundle:ProgramaCapacitacionFinanciera')->findBy(
            array('id' => $idPCF)
        );                     

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findBy(
            array('id' => $idCapacitacion,
                  'programaCapacitacionFinanciera' => $idPCF)
        );

        $asignacionesBeneficiariosPCF = $em->getRepository('AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera')->findBy(
            array('programaCapacitacionFinanciera' => $idCapacitacion,
                  'beneficiario' => $idBeneficiario)
        );

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario));

        $query = $em->createQuery('SELECT p FROM AppBundle:Participante p WHERE p.id NOT IN (SELECT participante.id FROM AppBundle:Participante participante JOIN AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera apc WHERE participante = apc.participante AND apc.programaCapacitacionFinanciera = :programaCapacitacionFinanciera) AND p.active = 1');
        $query->setParameter(':programaCapacitacionFinanciera', $capacitacionFinanciera);
        $participantes = $query->getResult();

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new BeneficiarioPCFFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
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
            $participantes, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionFinanciera/CapacitacionFinanciera:asignacion-participante-capacitacion-financiera-gestion.html.twig', 
            array(
                'form' => $form->createView(),
                'participantes' => $query,
                'beneficiario' => $beneficiario,
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosPCF,
                'idPCF' => $idPCF,
                'idBeneficiario' => $idBeneficiario,
                'idCapacitacion' => $idCapacitacion,
                'pagination1' => $pagination1,
                'tipoUsuario' => $valuesFieldBlock[3]                
            ));        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario/{idBeneficiario}/asignacion-participante/{idParticipante}/asignar", name="participanteCapacitacionFinancieraAsignar")
     */
    public function participanteCapacitacionFinancieraAsignarAction(Request $request, $idPCF, $idCapacitacion, $idBeneficiario, $idParticipante)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $participante = $em->getRepository('AppBundle:Participante')->findOneBy(
            array('id' => $idParticipante)
        );

        $capacitacionFinanciera = $em->getRepository('AppBundle:CapacitacionFinanciera')->findOneBy(
            array('id' => $idCapacitacion)
        );

        $asignacionesParticipantesPCF = new AsignacionBeneficiarioProgramaCapacitacionFinanciera();      

        $asignacionesParticipantesPCF->setProgramaCapacitacionFinanciera($capacitacionFinanciera);        
        $asignacionesParticipantesPCF->setBeneficiario($beneficiario);
        $asignacionesParticipantesPCF->setParticipante($participante);
        $asignacionesParticipantesPCF->setActive(true);
        $asignacionesParticipantesPCF->setFechaCreacion(new \DateTime());
        $asignacionesParticipantesPCF->setUsuarioCreacion($usuario);

        $em->persist($asignacionesParticipantesPCF);
        $em->flush();

        $this->addFlash('success', 'Participante asignado');            

        return $this->redirectToRoute('participanteCapacitacionFinancieraGestion', 
            array(
                'idPCF' => $idPCF,          
                'asignacionesBeneficiariosPCF' => $asignacionesParticipantesPCF,                
                'idCapacitacion' => $idCapacitacion,
                'idBeneficiario' => $idBeneficiario
            ));        
        
    }

    /**
     * @Route("/gestion-financiera/programa-capacitacion-financiera/{idPCF}/capacitacion/{idCapacitacion}/asignacion-beneficiario/{idBeneficiario}/asignacion-participante/{idParticipantePCF}/eliminar", name="participanteCapacitacionFinancieraEliminar")
     */
    public function participanteCapacitacionFinancieraEliminarAction(Request $request, $idPCF, $idCapacitacion, $idBeneficiario, $idParticipantePCF)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesBeneficiariosPCF = $em->getRepository('AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera')->find($idParticipantePCF); 

        $em->remove($asignacionesBeneficiariosPCF);
        $em->flush();

        return $this->redirectToRoute('participanteCapacitacionFinancieraGestion',
            array(
                'idPCF' => $idPCF,
                'asignacionesBeneficiariosPCF' => $asignacionesBeneficiariosPCF,
                'idCapacitacion' => $idCapacitacion,
                'idBeneficiario' => $idBeneficiario
            ));      
        
    }


   }

