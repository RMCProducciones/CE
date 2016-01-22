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

use AppBundle\Form\Backend\Parametrizacion\RolType;



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
            'AppBundle:Backend/Parametrizacion:rol-gestion.html.twig',
            array( 'roles' => $roles) 
        );

    }

    /**
     * @Route("/backend/rol/nuevo", name="rolNuevo")
     */
    public function rolNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $rol = new Rol();
        
        $form = $this->createForm(new RolType(), $rol);
        
        $form->add(
            'guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:visible'
                ),
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $rol = $form->getData();


            $rol->setActive(true);
            $rol->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($rol);
            $em->flush();

            echo $rol->getRol(); 


            //return new Response("Hola");

            return $this->redirectToRoute('rolGestion');
        }
        
        //return new Response ("Hola"); 
        return $this->render(
            'AppBundle:Backend/Parametrizacion:rol-nuevo.html.twig', 
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/backend/rol/editar/{idRol}", name="rolEditar")
     */
    public function rolEditarAction(Request $request, $idRol)
    {

        $em = $this->getDoctrine()->getManager();

        $rol = new Rol();
        
        $form = $this->createForm(new RolType(), $rol);

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
            
            $rol = $form->getData();


            $rol->setActive(true);
            $rol->setFechaCreacion(new \DateTime());

//            $usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
//                array(
//                    'id' => 1
//                )
//            );
            
//            $grupo->setUsuarioCreacion($usuarioCreacion);

            $em->persist($rol);
            $em->flush();

            return $this->redirectToRoute('rolGestion');
        }

        $permisoRol = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","checked":true,"module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","checked":true,"subModule":[{"id":1,"code":"1","path":"gruposGestion","title":"Gestión de Grupos","checked":true,"action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","checked":false,"subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","checked":false,"subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","checked":false,"action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';        
        $jsonPermisoRol = json_decode($permisoRol,true);

        return $this->render(
            'AppBundle:Backend/Parametrizacion:rol-editar.html.twig', 
            array( 
                'form' => $form->createView(),
                'permisoRol' =>  $jsonPermisoRol
            )
        );

    }


    /**
     * @Route("/backend/rol/obtener/{idRol}", name="obtenerRol")
     */
    public function obtenerRolAction($idRol)
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


}
