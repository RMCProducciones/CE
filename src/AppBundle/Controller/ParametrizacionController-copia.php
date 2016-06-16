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




class ParametrizacionController extends Controller
{

    


    /**
     * @Route("/agregar/rol/", name="agregarRol")
     */
    public function agregarRolAction()
    {
        
        
        $em = $this->getDoctrine()->getManager();

        $promotor = 1;
        $coordinador = 2;
        $admin = 3;

        /*$userAdmin = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'admin')
        );

        $userAdmin->addRole($admin);
        
        $em->persist($userAdmin);
        $em->flush();*/


        /*
        $userCoordinador = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'coordinador')
        );


        $userCoordinador->addRole($admin);
        
        $em->persist($userCoordinador);
        $em->flush();*/

        /*

        $userPromotor = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'promotor')
        );

        $userPromotor->addRole($promotor);
        
        $em->persist($userPromotor);
        $em->flush();*/
        

        return new Response("Hola..");

    }   


     /**
     * @Route("/eliminar/rol/", name="eliminarRol")
     */
    public function eliminarRolAction()
    {
        
        
        $em = $this->getDoctrine()->getManager();

        $promotor = 1;
        $coordinador = 2;
        $admin = 3;

        
        $userAdmin = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'admin')
        );

        //$userAdmin->deleteRole($admin);
        
        //$em->persist($userAdmin);
        //$em->flush();

        $userCoordinador = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'coordinador')
        );

        //$userCoordinador->deleteRole($coordinador);
        
        //$em->persist($userCoordinador);
        //$em->flush();

        $userPromotor = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('username' => 'promotor')
        );

        //print_r(array_keys($userPromotor->getRoles()));

        $rolesExistentes    = array("ROLE_ADMIN", "ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_FINANCIERO");
        $arrayVacio    = array();
        $resultado = array_diff($rolesExistentes, $userPromotor->getRoles());

        print_r($resultado);
        echo "-----------------";
        print_r($userPromotor->getRoles());


        $userPromotor->addRole($admin);
        
        $em->persist($userPromotor);
        $em->flush();

        echo "<br />";
        $resultado = array_diff($rolesExistentes, $userPromotor->getRoles());

        print_r($resultado);
        echo "-----------------";
        print_r($userPromotor->getRoles());

        //$userPromotor->deleteRole($promotor);
        
        //$em->persist($userPromotor);
        //$em->flush();
        

        return new Response(".");

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




    /**
     * @Route("/parametrizacion/usuario/gestion", name="usuarioGestion")
     */
    public function usuarioGestionAction(Request $request)
    {
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

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario)
        );

        $roles = new Usuario();

        $usuario=$em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id'=> $idUsuario)
        );

        $roles = $em->getRepository('AppBundle:Usuario')->findBy(
            array('usuario' => $usuario)
        );     



        



        $query = $em->createQuery('SELECT u FROM AppBundle:Usuario u WHERE u.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );   

        

        return $this->render('AppBundle:GestionParametro:usuario-rol-asignar-gestion.html.twig', 
            array(                
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idBeneficiario}/nueva-asignacion", name="grupoBeneficiarioCVBAsignacion")
     */
    public function comiteVamosBienAsignarGrupoBeneficiarioAction($idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );        
           
        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();

        $asignacionBeneficiarioComiteVamosBien->setGrupo($grupo);        
        $asignacionBeneficiarioComiteVamosBien->setBeneficiario($beneficiario);
        $asignacionBeneficiarioComiteVamosBien->setActive(true);
        $asignacionBeneficiarioComiteVamosBien->setFechaCreacion(new \DateTime());

        $em->persist($asignacionBeneficiarioComiteVamosBien);
        $em->flush();



        return $this->redirectToRoute('grupoBeneficiarioCVB', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiarioComiteVamosBien' => $asignacionBeneficiarioComiteVamosBien,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idAsignacionBeneficiariosCVB}/eliminar", name="grupoBeneficiarioCVBEliminar")
     */
    public function comiteVamosBienEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosCVB)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();

        $asignacionBeneficiarioComiteVamosBien = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->find($idAsignacionBeneficiariosCVB); 

        $em->remove($asignacionBeneficiarioComiteVamosBien);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosCVB = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioCVB',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo
            ));      
        
    }




}
