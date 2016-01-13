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


class ParametrizacionController extends Controller
{


    /**
     * @Route("/backend/permiso-rol", name="permisoRol")
     */
    public function permisoRolAction()
    {

        return $this->render(
        	'AppBundle:Backend/Parametrizacion:permiso-rol.html.twig' 
        );
    }


    /**
     * @Route("/backend/permiso-rol/{idUsuario}", name="permisoRolActivo")
     */
    public function permisoRolActivoAction()
    {

		$permisoRol = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","subModule":[{"id":1,"code":"1","path":"CLEARGestion","title":"Gestión de Grupos","action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';

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
		
        echo $permisoRol;

        return $this->render(
        	'AppBundle:default:main-menu.html.twig', 
        	array( 
        		'permisoRol' => json_decode($permisoRol,true) 
        	)
        );

    }


}
