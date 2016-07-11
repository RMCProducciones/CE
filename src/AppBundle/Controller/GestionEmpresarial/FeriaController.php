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


use AppBundle\Entity\Feria;

use AppBundle\Entity\FeriaSoporte;




use AppBundle\Form\GestionEmpresarial\FeriaSoporteType;
use AppBundle\Form\GestionEmpresarial\FeriaType;
use AppBundle\Form\GestionEmpresarial\FeriaFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class FeriaController extends Controller
{
/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/gestion", name="feriaGestion")
     */
    public function feriaGestionAction(Request $request)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        /*$ferias = $em->getRepository('AppBundle:Feria')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Feria')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new FeriaFilterType());

    
        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);           
        }

        $filterBuilder->andWhere('q.active = 1');
        
        if (isset($_GET['selMunicipio']) && $_GET['selMunicipio'] != "?") {
             $filterBuilder->andWhere('m.id = :idMunicipio')
            ->setParameter('idMunicipio', $_GET['selMunicipio']);
        }
        else{
            if (isset($_GET['selDepartamento']) && $_GET['selDepartamento'] != "?") {
                $filterBuilder->andWhere('d.id = :idDepartamento')
                ->setParameter('idDepartamento', $_GET['selDepartamento']);
            }
            if (isset($_GET['selZona']) && $_GET['selZona'] != "?") {
                $filterBuilder->andWhere('z.id = :idZona')
                ->setParameter('idZona', $_GET['selZona']);
            }      
        }

        //var_dump($filterBuilder->getDql());
        //die("");

        $query = $filterBuilder->getQuery();

         $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-gestion.html.twig', 
            array( 'form' => $form->createView(),
                    'ferias' => $query,
                    'pagination' => $pagination,
                    'tipoUsuario' => $valuesFieldBlock[3]
                )
            );
    }


/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/nuevo", name="feriaNuevo")
     */
    public function feriaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $feria= new Feria();
        
        $form = $this->createForm(new FeriaType(), $feria);
        
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
            
            $feria = $form->getData();


            $feria->setActive(true);
            $feria->setFechaCreacion(new \DateTime());
            $em->persist($feria);
            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-nuevo.html.twig', array('form' => $form->createView()));
    }





/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/eliminar", name="feriaEliminar")
     */
    public function feriaEliminarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->find($idFeria);              

        $em->remove($feria);
        $em->flush();

        return $this->redirect($this->generateUrl('feriaGestion'));

    }



/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/documentos-soporte", name="feriaSoporte")
     */
    public function feriaSoporteAction(Request $request, $idFeria)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $feriaSoporte = new FeriaSoporte();
        
        $form = $this->createForm(new FeriaSoporteType(), $feriaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '1', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
            array('active' => '0', 'feria' => $idFeria),
            array('fecha_creacion' => 'ASC')
        );
        
        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $feriaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarFeriaSoportes = $em->getRepository('AppBundle:FeriaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'feria' => $idFeria
                    )
                );  
            
                foreach ($actualizarFeriaSoportes as $actualizarFeriaSoporte){
                    echo $actualizarFeriaSoporte->getId()." ".$actualizarFeriaSoporte->getTipoSoporte()."<br />";
                    $actualizarFeriaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarFeriaSoporte->setActive(0);
                    $actualizarFeriaSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $feriaSoporte->setFeria($feria);
                $feriaSoporte->setActive(true);
                $feriaSoporte->setFechaCreacion(new \DateTime());
                $feriaSoporte->setUsuarioCreacion($usuario);

                $em->persist($feriaSoporte);
                $em->flush();

                return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idFeria' => $idFeria
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/documentos-soporte/{idFeriaSoporte}/borrar", name="feriaSoporteBorrar")
     */
    public function feriaSoporteBorrarAction(Request $request, $idFeria, $idFeriaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));


        $FeriaSoporte = new FeriaSoporte();
        
        $feriaSoporte = $em->getRepository('AppBundle:FeriaSoporte')->findOneBy(
            array('id' => $idFeriaSoporte)
        );
        
        $feriaSoporte->setFechaModificacion(new \DateTime());
        $feriaSoporte->setActive(0);
        $feriaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('feriaSoporte', array( 'idFeria' => $idFeria));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/feria/{idFeria}/documentos-soporte/{idFeriaSoporte}/descargar", name="feriaSoporteRecuperarArchivo")
     */
    public function feriaSoporteDescargarAction(Request $request, $idFeria, $idFeriaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:FeriaSoporte')->findOneBy(
            array('id' => $idFeriaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }

/**
     * @Route("/gestion-empresarial/servicio-complementario/feria/{idFeria}/editar", name="feriaEditar")
     */
    public function feriaEditarAction(Request $request, $idFeria)
    {
        $em = $this->getDoctrine()->getManager();
        $feria = new Feria();

        $feria = $em->getRepository('AppBundle:Feria')->findOneBy(
            array('id' => $idFeria)
        );
        //echo $integrantes->getPertenenciaEtnica();
        $form = $this->createForm(new FeriaType(), $feria);
        
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

            $feria = $form->getData();

            $feria->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('feriaGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/ServicioComplementario/Feria:feria-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idFeria' => $idFeria,
                    'feria' => $feria,
            )
        );

               
    }


}

