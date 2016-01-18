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


class ParametrizacionController extends Controller
{


    /**
     * @Route("/backend/rol/gestion", name="rolGestion")
     */
    public function rolGestionAction()
    {


        $em = $this->getDoctrine()->getManager();
        $roles = $em->getRepository('AppBundle:Rol')->findBy(
            array('active' => '1'),
            array('rol' => 'ASC')
        );

        return $this->render(
            'AppBundle:Backend/Parametrizacion:permiso-gestion.html.twig',
            array( 'roles' => $roles) 
        );
    }


    /**
     * @Route("/backend/rol/editar/{idRol}", name="rolEditar")
     */
    public function rolEditarAction($idRol)
    {

        $permisoRol = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';        


        /*
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
            SELECT 
                departamento.id, 
                departamento.nombre 
            FROM AppBundle:Departamento departamento
            ORDER BY departamento.nombre ASC
        ');

        $elementos = $query->getResult();
        */

        $jsonPermisoRol = json_decode($permisoRol,true);


        return $this->render(
            'AppBundle:Backend/Parametrizacion:permiso-rol-editar.html.twig', 
            array( 
                'permisoRol' =>  $jsonPermisoRol
            )
        );

    }


    /**
     * @Route("/backend/permiso-rol/obtener/{idUsuario}", name="obtenerPermisoRol")
     */
    public function obtenerPermisoRolAction($idUsuario)
    {

        $permisoRol = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';        


        /*
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
            SELECT 
                departamento.id, 
                departamento.nombre 
            FROM AppBundle:Departamento departamento
            ORDER BY departamento.nombre ASC
        ');

        $elementos = $query->getResult();
        */
        
        //$jsonPermisoRol = json_decode($permisoRol,true);


        return new Response($permisoRol);

    }

    /**
     * @Route("/backend/permiso-rol/menu/{idUsuario}", name="menuPermisoRol")
     */
    public function menuPermisoRolAction()
    {

		$permisoRol = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';

		/*
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
        	SELECT 
        		departamento.id, 
        		departamento.nombre 
            FROM AppBundle:Departamento departamento
            ORDER BY departamento.nombre ASC
    	');

		$elementos = $query->getResult();
		*/
		
        $jsonPermisoRol = json_decode($permisoRol,true);

        $idArrayComponente = 0;
        $idArrayModule = 0;
        $idArraySubModule = 0;

        foreach($jsonPermisoRol['component'] as $component){

            if($component['checked'] == true){


                if($component['path'] != "#"){
                    
                    $component['path'] = $this->generateUrl($component['path']); 

                }

                $idArrayModule = 0;

                foreach($component['module'] as $module){


                    if($module['checked'] == true){

                        if($module['path'] != "#"){
                            
                            $module['path'] = $this->generateUrl($module['path']); 

                        }

                        $idArraySubModule = 0;                

                        foreach($module['subModule'] as $subModule){

                            if($subModule['checked'] == true){                            

                                if($subModule['path'] != "#"){
                                    
                                    $jsonPermisoRol['component'][$idArrayComponente]['module'][$idArrayModule]['subModule'][$idArraySubModule]['path'] = $this->generateUrl($subModule['path']); 

                                }

                            }

                            $idArraySubModule++;

                        }
                    }

                    $idArrayModule++;
                    
                }

            }

            $idArrayComponente++;

        }

        return $this->render(
        	'AppBundle:default:main-menu.html.twig', 
        	array( 
        		'permisoRol' =>  $jsonPermisoRol
        	)
        );

    }


}
