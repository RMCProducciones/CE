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

use AppBundle\Entity\CalificacionCriterioGrupoConcurso;
use AppBundle\Entity\CriterioCalificacion;
use AppBundle\Entity\AsignacionGrupoConcurso;

use AppBundle\Form\GestionEmpresarial\CalificacionCriterioConcursosType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class CalificacionCriteriosConcursoController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/{idAsignacionGrupoConcurso}/gestion-calificacion", name="calificacionGestion")
     */

   public function calificacionGestionAction(Request $request, $idConcurso, $idAsignacionGrupoConcurso)

    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $criterios = new CalificacionCriterioGrupoConcurso();
        $comprobar = 0;        
       
        $asignacionCalificacion = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->findOneBy(
            array('id' => $idAsignacionGrupoConcurso)          
        );       

        $calificacionCriterio = $em->getRepository('AppBundle:CalificacionCriterioGrupoConcurso')->findBy(
            array('grupo' => $asignacionCalificacion->getGrupo()->getId())        
        );

        $criterios = $em->getRepository('AppBundle:CriterioCalificacion')->findBy(
                array('concurso' => $asignacionCalificacion->getConcurso())          
        );     

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $criterios, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CalificacionCriterio:calificacion-gestion.html.twig', 
            array( 'criterios' => $criterios,                    
                   'calificaciones' => $calificacionCriterio,                                                 
                   'idAsignacionGrupoConcurso' => $idAsignacionGrupoConcurso,
                   'pagination'=> $pagination,
                   'idConcurso' => $idConcurso,
                   'tipoUsuario' => $valuesFieldBlock[3]
                   )
            );

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/{idAsignacionGrupoConcurso}/{idCriterio}/nuevo-calificacion", name="calificacionNuevo")
     */
    public function calificacionNuevoAction(Request $request, $idConcurso, $idAsignacionGrupoConcurso, $idCriterio)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionCalificacion = $em->getRepository('AppBundle:AsignacionGrupoConcurso')->findOneBy(
            array('id' => $idAsignacionGrupoConcurso)          
        );

        $criterio = $em->getRepository('AppBundle:CriterioCalificacion')->findOneBy(
            array('id' => $idCriterio)          
        );

        $concurso = $asignacionCalificacion->getConcurso();
        $grupo = $asignacionCalificacion->getGrupo();

        /*echo $grupo->getId();
        echo $idCriterio;
        ajshlñaskdas;*/

        $calificacion = $em->getRepository('AppBundle:CalificacionCriterioGrupoConcurso')->findOneBy(
            array('grupo' => $grupo->getId(),
                  'criterioCalificacion' => $idCriterio)          
        );

        if($calificacion == null){
            $calificacion = new CalificacionCriterioGrupoConcurso();            
        }

        

        

        $form = $this->createForm(new CalificacionCriterioConcursosType(), $calificacion);
        
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
            
            $calificacion = $form->getData();                                 

            $calificacion->setGrupo($grupo);
            $calificacion->setCriterioCalificacion($criterio);
            $calificacion->setConcurso($concurso);
            $calificacion->setActive(true);
            $calificacion->setFechaCreacion(new \DateTime());


            $em->persist($calificacion);
            $em->flush();

            return $this->redirectToRoute('calificacionGestion', array(
               'idAsignacionGrupoConcurso'=> $idAsignacionGrupoConcurso,
               'idConcurso' => $idConcurso ));
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CalificacionCriterio:calificacion-nuevo.html.twig', 
            array(
                'form' => $form->createView(),
                'idAsignacionGrupoConcurso'=>$idAsignacionGrupoConcurso,
                'idConcurso' => $idConcurso                
            )
        );
    }


}

