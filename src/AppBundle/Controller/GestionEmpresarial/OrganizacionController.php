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


use AppBundle\Entity\Organizacion;
use AppBundle\Entity\OrganizacionSoporte;



use AppBundle\Form\GestionEmpresarial\OrganizacionType;
use AppBundle\Form\GestionEmpresarial\OrganizacionSoporteType;
use AppBundle\Form\GestionEmpresarial\OrganizacionFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class OrganizacionController extends Controller
{

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/gestion", name="organizacionGestion")
     */
    public function organizacionGestionAction(Request $request)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        /*$organizaciones = $em->getRepository('AppBundle:Organizacion')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );*/

         $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Organizacion')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new OrganizacionFilterType());

    
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

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'organizaciones' => $query,
                    'pagination' => $pagination,
                    'tipoUsuario' => $valuesFieldBlock[3] ));
    }
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/nuevo", name="organizacionNuevo")
     */
    public function organizacionNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();
        
        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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
            
            $organizacion = $form->getData();

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioCreacion($usuarioCreacion);*/

            $em->persist($organizacion);
            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-nuevo.html.twig', array('form' => $form->createView()));
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/editar", name="organizacionEditar")
     */
    public function organizacionEditarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );

        $form = $this->createForm(new OrganizacionType(), $organizacion);
        
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

            $organizacion = $form->getData();

            if($organizacion->getRural() == true){             
                $organizacion->setBarrio(null);
            }
            else
            {
                $organizacion->setCorregimiento(null);
                $organizacion->setVereda(null);
                $organizacion->setCacerio(null);
            }

            $organizacion->setActive(true);
            $organizacion->setFechaCreacion(new \DateTime());


            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $organizacion->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('organizacionGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idOrganizacion' => $idOrganizacion,
                    'organizacion' => $organizacion,
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/eliminar", name="organizacionEliminar")
     */
    public function organizacionEliminarAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();
        $organizacion = new Organizacion();

        $organizacion = $em->getRepository('AppBundle:Organizacion')->find($idOrganizacion);              

        $em->remove($organizacion);
        $em->flush();

        return $this->redirect($this->generateUrl('organizacionGestion'));

    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte", name="organizacionSoporte")
     */
    public function organizacionSoporteAction(Request $request, $idOrganizacion)
    {
        $em = $this->getDoctrine()->getManager();

        $organizacionSoporte = new OrganizacionSoporte();
        
        $form = $this->createForm(new OrganizacionSoporteType(), $organizacionSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '1', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
            array('active' => '0', 'organizacion' => $idOrganizacion),
            array('fecha_creacion' => 'ASC')
        );
        
        $organizacion = $em->getRepository('AppBundle:Organizacion')->findOneBy(
            array('id' => $idOrganizacion)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $organizacionSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'organizacion_tipo_soporte'
                    )
                );
                
                $actualizarOrganizacionSoportes = $em->getRepository('AppBundle:OrganizacionSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'organizacion' => $idOrganizacion
                    )
                );  
            
                foreach ($actualizarOrganizacionSoportes as $actualizarOrganizacionSoporte){
                    echo $actualizarOrganizacionSoporte->getId()." ".$actualizarOrganizacionSoporte->getTipoSoporte()."<br />";
                    $actualizarOrganizacionSoporte->setFechaModificacion(new \DateTime());
                    $actualizarOrganizacionSoporte->setActive(0);
                    $em->flush();
                }
                
                $organizacionSoporte->setOrganizacion($pasantia);
                $organizacionSoporte->setActive(true);
                $organizacionSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($organizacionSoporte);
                $em->flush();

                return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Organizacion:organizacion-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idOrganizacion' => $idOrganizacion
            )
        );
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte/{idOrganizacionSoporte}/descargar", name="organizacionSoporteRecuperarArchivo")
     */
    public function organizacionSoporteDescargarAction(Request $request, $idOrganizacion, $idOrganizacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:OrganizacionSoporte')->findOneBy(
            array('id' => $idOrganizacionSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/organizacion/{idOrganizacion}/documentos-soporte/{idOrganizacionSoporte}/borrar", name="organizacionSoporteBorrar")
     */
    public function organizacionSoporteBorrarAction(Request $request, $idOrganizacion, $idOrganizacionSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $OrganizacionSoporte = new OrganizacionSoporte();
        
        $organizacionSoporte = $em->getRepository('AppBundle:OrganizacionSoporte')->findOneBy(
            array('id' => $idOrganizacionSoporte)
        );
        
        $organizacionSoporte->setFechaModificacion(new \DateTime());
        $organizacionSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('organizacionSoporte', array( 'idOrganizacion' => $idOrganizacion));
        
    }

    


}

