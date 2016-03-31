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



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class InfoFinancieraController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/gestion-info", name="infoGestion")
     */
   public function infoGestionAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        
        $info=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/InfoFinanciera:info-gestion.html.twig',
         array( 'info' => $info,
        'idGrupo' => $idGrupo));
    }

    
     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/gestion-info/nuevo", name="infoNuevo")
     */
    public function infoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $info = new Grupo();
        
        $form = $this->createForm(new InfoFinancieraType(), $info);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $info = $form->getData();

            $info->setActive(true);
            $info->setFechaCreacion(new \DateTime());


            
            $em->persist($info);
            $em->flush();

            return $this->redirectToRoute('infoGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/InfoFinanciera:info-nuevo.html.twig', 
            array('form' => $form->createView()));
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

