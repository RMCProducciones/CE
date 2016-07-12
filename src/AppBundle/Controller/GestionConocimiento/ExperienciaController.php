<?php

namespace AppBundle\Controller\GestionConocimiento;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\ExperienciaExitosa;
use AppBundle\Entity\ExperienciaExitosaSoporte;



use AppBundle\Form\GestionConocimiento\ExperienciaExitosaType;
use AppBundle\Form\GestionConocimiento\ExperienciaExitosaSoporteType;
use AppBundle\Form\GestionConocimiento\ExperienciaExitosaFilterType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class ExperienciaController extends Controller
{
    
	 /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/gestion", name="experienciaGestion")
     */
    public function experienciaGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
       /*$experienciaexitosas = $em->getRepository('AppBundle:ExperienciaExitosa')->findBY(
            array('active' => 1)            
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:ExperienciaExitosa')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new ExperienciaExitosaFilterType());

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

        return $this->render('AppBundle:GestionConocimiento/Experiencia:experiencia-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'experienciaexitosas' => $query,
                    'pagination' => $pagination
                )
            );
    }                                                                                                                                                                                                                
	
 /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/nuevo", name="experienciaNuevo")
     */
    public function experienciaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();
        
        $form = $this->createForm(new ExperienciaExitosaType(), $experienciaexitosa);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $experienciaexitosa = $form->getData();

            $experienciaexitosa->setActive(true);
            $experienciaexitosa->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $experienciaexitosa->setUsuarioCreacion($usuario);


            
            $em->persist($experienciaexitosa);
            $em->flush();

            return $this->redirectToRoute('experienciaGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento/Experiencia:experiencia-nuevo.html.twig', array('form' => $form->createView()));
    } 

    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/editar", name="experienciaEditar")
     */
    public function experienciaEditarAction(Request $request, $idExperienciaExitosa)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();

        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->findOneBy(
            array('id' => $idExperienciaExitosa)
        );

        $form = $this->createForm(new ExperienciaExitosaType(), $experienciaexitosa);
        
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

            $experienciaexitosa = $form->getData();

            $experienciaexitosa->setFechaModificacion(new \DateTime());

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $experienciaexitosa->setUsuarioModificacion($usuario);

            

            $em->flush();

            return $this->redirectToRoute('experienciaGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Experiencia:experiencia-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idExperienciaExitosa' => $idExperienciaExitosa,
                    'experienciaexitosa' => $experienciaexitosa,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/eliminar", name="experienciaEliminar")
     */
    public function experienciaEliminarAction(Request $request, $idExperienciaExitosa)
    {
        $em = $this->getDoctrine()->getManager();
        $experienciaexitosa = new ExperienciaExitosa();

        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->find($idExperienciaExitosa);              

        $em->remove($experienciaexitosa);
        $em->flush();

        return $this->redirect($this->generateUrl('experienciaGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/documentos-soporte", name="experienciaSoporte")
     */
    public function experienciaSoporteAction(Request $request, $idExperienciaExitosa)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $experienciaexitosaSoporte = new ExperienciaExitosaSoporte();
        
        $form = $this->createForm(new ExperienciaExitosaSoporteType(), $experienciaexitosaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
            array('active' => '1', 'experienciaexitosa' => $idExperienciaExitosa),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
            array('active' => '0', 'experienciaexitosa' => $idExperienciaExitosa),
            array('fecha_creacion' => 'ASC')
        );
        
        $experienciaexitosa = $em->getRepository('AppBundle:ExperienciaExitosa')->findOneBy(
            array('id' => $idExperienciaExitosa)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $experienciaexitosaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'experiencia_tipo_soporte'
                    )
                );
                
                $actualizarExperienciaExitosaSoportes = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'experienciaexitosa' => $idExperienciaExitosa
                    )
                );  
            
                foreach ($actualizarExperienciaExitosaSoportes as $actualizarExperienciaExitosaSoporte){
                    echo $actualizarExperienciaExitosaSoporte->getId()." ".$actualizarExperienciaExitosaSoporte->getTipoSoporte()."<br />";
                    $actualizarExperienciaExitosaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarExperienciaExitosaSoporte->setActive(0);
                    $actualizarExperienciaExitosaSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $experienciaexitosaSoporte->setExperienciaExitosa($experienciaexitosa);
                $experienciaexitosaSoporte->setActive(true);
                $experienciaexitosaSoporte->setFechaCreacion(new \DateTime());
                $experienciaexitosaSoporte->setUsuarioCreacion($usuario);

                $em->persist($experienciaexitosaSoporte);
                $em->flush();

                return $this->redirectToRoute('experienciaSoporte', array( 'idExperienciaExitosa' => $idExperienciaExitosa));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Experiencia:experiencia-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idExperienciaExitosa' => $idExperienciaExitosa
            )
        );
        
    }

    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/documentos-soporte/{idExperienciaExitosaSoporte}/descargar", name="experienciaExitosaSoporteRecuperarArchivo")
     */
    public function experienciaSoporteDescargarAction(Request $request, $idExperienciaExitosa, $idExperienciaExitosaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findOneBy(
            array('id' => $idExperienciaExitosaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-conocimiento/experiencia-exitosa/{idExperienciaExitosa}/documentos-soporte/{idExperienciaExitosaSoporte}/borrar", name="experienciaSoporteBorrar")
     */
    public function experienciaSoporteBorrarAction(Request $request, $idExperienciaExitosa, $idExperienciaExitosaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_ADMIN", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $experienciaexitosaSoporte = new ExperienciaExitosaSoporte();
        
        $experienciaexitosaSoporte = $em->getRepository('AppBundle:ExperienciaExitosaSoporte')->findOneBy(
            array('id' => $idExperienciaExitosaSoporte)
        );
        
        $experienciaexitosaSoporte->setFechaModificacion(new \DateTime());
        $experienciaexitosaSoporte->setActive(0);
        $experienciaexitosaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('experienciaSoporte', array( 'idExperienciaExitosa' => $idExperienciaExitosa));
        
    }
   
   

  	
}
