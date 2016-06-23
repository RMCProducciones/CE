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
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use AppBundle\Entity\Rol;
use AppBundle\Entity\Usuario;

use AppBundle\Form\Backend\Parametrizacion\RolType;
use AppBundle\Form\Backend\Parametrizacion\RolFilterType;
use AppBundle\Form\Backend\Parametrizacion\UsuarioFilterType;
use AppBundle\Form\Backend\Parametrizacion\UsuarioAsignacionFilterType;

use AppBundle\Utilities\Acceso;




class ParametrizacionController extends Controller
{

    /**
     * @Route("/parametrizacion/usuario/gestion", name="usuarioGestion")
     */
    public function usuarioGestionAction(Request $request)
    {

        new Acceso($this->getUser(), ["ROLE_ADMIN", "ROLE_USER"]);
        $em = $this->getDoctrine()->getManager();

       
        $usuarios = $em->getRepository('AppBundle:Usuario')->findBY(
            array('active' => 1)         
        );

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Usuario')
            ->createQueryBuilder('q');
                  
        $form = $this->get('form.factory')->create(new UsuarioFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );
        
        return $this->render(
            'AppBundle:GestionParametro:usuario-gestion.html.twig', 
            array( 
                'form' => $form->createView(),
                'usuarios' => $usuarios,
                'pagination'=> $pagination

            )
        );

    }

 

    /**
     * @Route("/parametrizacion/usuario/{idUsuario}/asignacion-rol", name="usuarioRol")
     */
    public function usuarioRolAction(Request $request, $idUsuario)
    {


         $em = $this->getDoctrine()->getManager();

          $user = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario)
        );

        $rolesExistentes    = array('admin'=>"ROLE_ADMIN", 'promotor'=>"ROLE_PROMOTOR", 'coordinador'=>"ROLE_COORDINADOR", 'administrativo'=>"ROLE_ESPECIALISTA_ADMINISTRATIVO", 'conocimiento' =>"ROLE_ESPECIALISTA_CONOCIMIENTO", 'financiero' =>"ROLE_ESPECIALISTA_FINANCIERO", 'empresarial' =>"ROLE_ESPECIALISTA_EMPRESARIAL");
        $arrayVacio    = array();
        $rolAsignar = array_diff($rolesExistentes, $user->getRoles());

        if($user->getRoles() != null){
            $rolUser = $user->getRoles();
        }     
       
        $usuarios = $em->getRepository('AppBundle:Usuario')->findBY(
            array('active' => 1)         
        );                

        return $this->render('AppBundle:GestionParametro:usuario-rol-asignar-gestion.html.twig', 
            array(                
               'idUsuario' => $idUsuario,
               'rolAsignar' => $rolAsignar,
               'rolUser' => $rolUser

            ));        
    }

        /**
     * @Route("/parametrizacion/usuario/{idUsuario}/asignacion-rol/{idRol}/asignar", name="usuarioAsignarRol")
     */
    public function usuarioAsignarRolAction(Request $request, $idUsuario, $idRol)
    {       


        $promotor = 1;
        $coordinador = 2;
        $admin = 3;
        $administrativo = 4;
        $conocimiento = 5;
        $financiero = 6;
        $empresarial = 7;


        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario)
        );    
       
        $usuarios = $em->getRepository('AppBundle:Usuario')->findBY(
            array('active' => 1)         
        );   

        
        if($idRol == $promotor){
            $user->addRole($promotor);    
        }

        else if($idRol == $coordinador){
            $user->addRole($coordinador);    
        }

        else if($idRol == $admin){            
           $user->addRole($admin);    
        }

        else if($idRol == $administrativo){            
           $user->addRole($administrativo);    
        }

        else if($idRol == $conocimiento){            
           $user->addRole($conocimiento);    
        }

        else if($idRol == $financiero){            
           $user->addRole($financiero);    
        }
        
        else if($idRol == $empresarial){            
           $user->addRole($empresarial);    
        }
        
        $em->persist($user);
        $em->flush();
           



        return $this->redirectToRoute('usuarioRol',
            array(                
               'idUsuario' => $idUsuario

            ));    


    }

        /**
     * @Route("/parametrizacion/usuario/{idUsuario}/asignacion-rol/{idRol}/eliminar", name="usuarioEliminarRol")
     */
    public function usuarioEliminarRolAction(Request $request, $idUsuario, $idRol)
    {       


        $promotor = 1;
        $coordinador = 2;
        $admin = 3;
        $administrativo = 4;
        $conocimiento = 5;
        $financiero = 6;
        $empresarial = 7;


        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario)
        );    
       
               
        if($idRol == $promotor){
            $user->deleteRole($promotor);    
        }

        else if($idRol == $coordinador){
            $user->deleteRole($coordinador);    
        }

        else if($idRol == $admin){            
           $user->deleteRole($admin);    
        }

        else if($idRol == $administrativo){            
           $user->deleteRole($administrativo);    
        }

        else if($idRol == $conocimiento){            
           $user->deleteRole($conocimiento);    
        }

        else if($idRol == $financiero){            
           $user->deleteRole($financiero);    
        }

        else if($idRol == $empresarial){            
           $user->deleteRole($empresarial);    
        }
        
        $em->persist($user);
        $em->flush();       

        return $this->redirectToRoute('usuarioRol',
            array(                
               'idUsuario' => $idUsuario

            ));        
    }







}
