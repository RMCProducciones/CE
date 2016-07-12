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

use AppBundle\Entity\Participante;


use AppBundle\Form\GestionFinanciera\ParticipanteType;
use AppBundle\Form\GestionFinanciera\ParticipanteFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ParticipanteController extends Controller
{

    
    /**
     * @Route("/gestion-financiera/participante/gestion", name="participanteGestion")
     */
    public function participanteGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$participantes= $em->getRepository('AppBundle:Participante')->findBY(
            array('active' => 1)            
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Participante')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ParticipanteFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");


         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        return $this->render('AppBundle:GestionFinanciera/Participante:participante-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'participantes' => $query,
                    'pagination' => $pagination
                )
            );
    }  
    
     /**
     * @Route("/gestion-financiera/participante/nuevo", name="participanteNuevo")
     */
    public function participanteNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $participante = new Participante();
        
        $form = $this->createForm(new ParticipanteType(), $participante);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $participante = $form->getData();

            $participante->setActive(true);
            $participante->setFechaCreacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $participante->setUsuarioCreacion($usuario);


            
            $em->persist($participante);
            $em->flush();

            return $this->redirectToRoute('participanteGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera/Participante:participante-nuevo.html.twig', array('form' => $form->createView()));
    } 


     /**
     * @Route("/gestion-financiera/participante/{idParticipante}/editar", name="participanteEditar")
     */
    public function participanteEditarAction(Request $request, $idParticipante)
    {
        $em = $this->getDoctrine()->getManager();
        $participante = new Participante();

        $participante = $em->getRepository('AppBundle:Participante')->findOneBy(
            array('id' => $idParticipante)
        );

        $form = $this->createForm(new ParticipanteType(), $participante);
        
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

            $participante = $form->getData();

            $participante->setFechaModificacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $participante->setUsuarioModificacion($usuario);


            $em->flush();

            return $this->redirectToRoute('participanteGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/Participante:participante-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idParticipante' => $idParticipante,
                    'participante' => $participante,
            )
        );

    }
}