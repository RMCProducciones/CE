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


use AppBundle\Entity\Beca;
use AppBundle\Entity\BecaSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\BecaType;
use AppBundle\Form\GestionConocimiento\BecaSoporteType;
use AppBundle\Form\GestionConocimiento\BecaFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class BecaController extends Controller
{
    
    	 /**
     * @Route("/gestion-conocimiento/beca/gestion", name="becaGestion")
     */
    public function becaGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /*$becas= $em->getRepository('AppBundle:Beca')->findBY(
            array('active' => 1)            
        ); */

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beca')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new BecaFilterType());

    
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

        return $this->render('AppBundle:GestionConocimiento/Beca:beca-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'becas' => $query,
                   'pagination' => $pagination
                )
            );
    }  
	
	 /**
     * @Route("/gestion-conocimiento/beca/nuevo", name="becaNuevo")
     */
    public function becaNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();
        
        $form = $this->createForm(new BecaType(), $beca);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $beca = $form->getData();

            $beca->setActive(true);
            $beca->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $beca->setUsuarioCreacion($usuario);


            
            $em->persist($beca);
            $em->flush();

            return $this->redirectToRoute('becaGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento/Beca:beca-nuevo.html.twig', array('form' => $form->createView()));
    } 
	

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/editar", name="becaEditar")
     */
    public function becaEditarAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();

        $beca = $em->getRepository('AppBundle:Beca')->findOneBy(
            array('id' => $idBeca)
        );

        $form = $this->createForm(new BecaType(), $beca);
        
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

            $beca = $form->getData();

            

            $beca->setFechaModificacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $beca->setUsuarioModificacion($usuario);

  

            $em->flush();

            return $this->redirectToRoute('becaGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Beca:beca-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idBeca' => $idBeca,
                    'beca' => $beca,
            )
        );

    }



    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/eliminar", name="becaEliminar")
     */
    public function becaEliminarAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();
        $beca = new Beca();

        $beca = $em->getRepository('AppBundle:Beca')->find($idBeca);              

        $em->remove($beca);
        $em->flush();

        return $this->redirect($this->generateUrl('becaGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/documentos-soporte", name="becaSoporte")
     */
    public function becaSoporteAction(Request $request, $idBeca)
    {
        $em = $this->getDoctrine()->getManager();

        $becaSoporte = new BecaSoporte();
        
        $form = $this->createForm(new BecaSoporteType(), $becaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:BecaSoporte')->findBy(
            array('active' => '1', 'beca' => $idBeca),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:BecaSoporte')->findBy(
            array('active' => '0', 'beca' => $idBeca),
            array('fecha_creacion' => 'ASC')
        );
        
        $beca = $em->getRepository('AppBundle:Beca')->findOneBy(
            array('id' => $idBeca)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $becaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'beca_tipo_soporte'
                    )
                );
                
                $actualizarBecaSoportes = $em->getRepository('AppBundle:BecaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'beca' => $idBeca
                    )
                );  
            
                foreach ($actualizarBecaSoportes as $actualizarBecaSoporte){
                    echo $actualizarBecaSoporte->getId()." ".$actualizarBecaSoporte->getTipoSoporte()."<br />";
                    $actualizarBecaSoporte->setFechaModificacion(new \DateTime());
                    $actualizarBecaSoporte->setActive(0);
                    $em->flush();
                }
                
                $becaSoporte->setBeca($beca);
                $becaSoporte->setActive(true);
                $becaSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($becaSoporte);
                $em->flush();

                return $this->redirectToRoute('becaSoporte', array( 'idBeca' => $idBeca));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Beca:beca-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idBeca' => $idBeca
            )
        );
        
    }

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/documentos-soporte/{idBecaSoporte}/descargar", name="becaSoporteRecuperarArchivo")
     */
    public function ExperienciaSoporteDescargarAction(Request $request, $idBeca, $idBecaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:BecaSoporte')->findOneBy(
            array('id' => $idBecaSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }

    /**
     * @Route("/gestion-conocimiento/beca/{idBeca}/documentos-soporte/{idBecaSoporte}/borrar", name="becaSoporteBorrar")
     */
    public function becaSoporteBorrarAction(Request $request, $idBeca, $idBecaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $becaSoporte = new BecaSoporte();
        
        $becaSoporte = $em->getRepository('AppBundle:BecaSoporte')->findOneBy(
            array('id' => $idBecaSoporte)
        );
        
        $becaSoporte->setFechaModificacion(new \DateTime());
        $becaSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('becaSoporte', array( 'idBeca' => $idBeca));
        
    }
	
}
