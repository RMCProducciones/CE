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

        $rol = $em->getRepository('AppBundle:Rol')->findOneBy(
            array('id' => $idRol)
        );

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

            $rol->setFechaModificacion(new \DateTime());

            /*
            $usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $rol->setUsuarioCreacion($usuarioCreacion);
            */

            $em->flush();

            return $this->redirectToRoute('rolGestion');
        }

        $permisoRol = $rol->getPermiso();

        $jsonPermisoRol = json_decode($permisoRol,true);

        return $this->render(
            'AppBundle:Backend/Parametrizacion:rol-editar.html.twig', 
            array( 
                'form' => $form->createView(),
                'permisoRol' =>  $jsonPermisoRol,
                'idRol' => $idRol
            )
        );

    }


    /**
     * @Route("/backend/rol/obtener/{idRol}", name="obtenerRol")
     */
    public function obtenerRolAction($idRol)
    {

        $em = $this->getDoctrine()->getManager();

        $rol = new Rol();

        $rol = $em->getRepository('AppBundle:Rol')->findOneBy(
            array('id' => $idRol)
        );

        $permisoRol = $rol->getPermiso();

        return new Response($permisoRol);

    }

    /**
     * @Route("/backend/rol/eliminar/{idRol}", name="rolEliminar")
     */
    public function rolEliminarAction(Request $request, $idRol)
    {
        $em = $this->getDoctrine()->getManager();
        $rol = new Rol();

        $rol = $em->getRepository('AppBundle:Rol')->find($idRol);              

        $em->remove($rol);
        $em->flush();

        return $this->redirect($this->generateUrl('rolGestion'));

    }



}
