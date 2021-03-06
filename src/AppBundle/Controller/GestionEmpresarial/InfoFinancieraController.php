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


use AppBundle\Form\GestionEmpresarial\InfoFinancieraType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class InfoFinancieraController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/gestion-info", name="infoGestion")
     */
   public function infoGestionAction(Request $request, $idGrupo)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        $info=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        ); 

         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $info, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/InfoFinanciera:info-gestion.html.twig',
         array( 'info' => $info,
        'idGrupo' => $idGrupo,
        'pagination' => $pagination,
        'tipoUsuario' => $valuesFieldBlock[3]
        )
         );
    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/gestion-info/{idGrupo}/editar", name="infoEditar")
     */
    public function infoEditarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $info = new Grupo();

          $info=$em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id'=> $idGrupo)
        ); 

        $form = $this->createForm(new InfoFinancieraType(), $info);
        
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

            $info = $form->getData();
            
            $info->setFechaModificacion(new \DateTime());

            
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $info->setUsuarioModificacion($usuario);


            $em->persist($info);
            $em->flush();

            return $this->redirectToRoute('infoGestion', array('idGrupo' => $idGrupo));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/InfoFinanciera:info-editar.html.twig', 
            array(
                    'form' => $form->createView(),    
                    'idGrupo' => $idGrupo,
                    'info' => $info,
            )
        );

    }
  


}

