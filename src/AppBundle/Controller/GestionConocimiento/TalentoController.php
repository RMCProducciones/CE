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


use AppBundle\Entity\Talento;
use AppBundle\Entity\TalentoSoporte;
use AppBundle\Entity\DocumentoSoporte;



use AppBundle\Form\GestionConocimiento\TalentoType;
use AppBundle\Form\GestionConocimiento\TalentoSoporteType;
use AppBundle\Form\GestionConocimiento\TalentoFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class TalentoController extends Controller
{    	
   /**
     * @Route("/gestion-conocimiento/talento/gestion", name="talentoGestion")
     */
    public function talentoGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$talentos= $em->getRepository('AppBundle:Talento')->findBY(
            array('active' => 1)            
        ); */
         
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Talento')
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        $form = $this->get('form.factory')->create(new TalentoFilterType());

    
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

        return $this->render('AppBundle:GestionConocimiento/Talento:talento-gestion.html.twig', 
            array(  'form' => $form->createView(),
                    'talentos' => $query,
                    'pagination' => $pagination
                )
            );
    }       
	
	 /**
     * @Route("/gestion-conocimiento/talento/nuevo", name="talentoNuevo")
     */
    public function talentoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();
        
        $form = $this->createForm(new TalentoType(), $talento);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $talento = $form->getData();

            $talento->setActive(true);
            $talento->setFechaCreacion(new \DateTime());


            
            $em->persist($talento);
            $em->flush();

            return $this->redirectToRoute('talentoGestion');
        }
        
        return $this->render('AppBundle:GestionConocimiento/Talento:talento-nuevo.html.twig', array('form' => $form->createView()));
    } 



/**
     * @Route("/gestion-conocimiento/talento/{idTalento}/editar", name="talentoEditar")
     */
    public function talentoEditarAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();

        $talento = $em->getRepository('AppBundle:Talento')->findOneBy(
            array('id' => $idTalento)
        );

        $form = $this->createForm(new TalentoType(), $talento);
        
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

            $talento = $form->getData();

            if($talento->getRural() == true){
                $talento->setBarrio(null);
            }
            else
            {
                $talento->setCorregimiento(null);
                $talento->setVereda(null);
                $talento->setCacerio(null);
            }

            $talento->setFechaModificacion(new \DateTime());

            /*$usuarioModificacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $grupo->setUsuarioModificacion($usuarioModificacion);*/

            $em->flush();

            return $this->redirectToRoute('talentoGestion');
        }

        return $this->render(
            'AppBundle:GestionConocimiento/Talento:talento-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTalento' => $idTalento,
                    'talento' => $talento,
            )
        );

    }




    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/eliminar", name="talentoEliminar")
     */
    public function talentoEliminarAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();
        $talento = new Talento();

        $talento = $em->getRepository('AppBundle:Talento')->find($idTalento);              

        $em->remove($talento);
        $em->flush();

        return $this->redirect($this->generateUrl('talentoGestion'));

    }

    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/documentos-soporte", name="talentoSoporte")
     */
    public function talentoSoporteAction(Request $request, $idTalento)
    {
        $em = $this->getDoctrine()->getManager();

        $talentoSoporte = new TalentoSoporte();
        
        $form = $this->createForm(new TalentoSoporteType(), $talentoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
            array('active' => '1', 'talento' => $idTalento),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
            array('active' => '0', 'talento' => $idTalento),
            array('fecha_creacion' => 'ASC')
        );
        
        $talento = $em->getRepository('AppBundle:Talento')->findOneBy(
            array('id' => $idTalento)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $talentoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'talento_tipo_soporte'
                    )
                );
                
                $actualizarTalentoSoportes = $em->getRepository('AppBundle:TalentoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'talento' => $idTalento
                    )
                );  
            
                foreach ($actualizarTalentoSoportes as $actualizarTalentoSoporte){
                    echo $actualizarTalentoSoporte->getId()." ".$actualizarTalentoSoporte->getTipoSoporte()."<br />";
                    $actualizarTalentoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarTalentoSoporte->setActive(0);
                    $em->flush();
                }
                
                $talentoSoporte->setTalento($talento);
                $talentoSoporte->setActive(true);
                $talentoSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($talentoSoporte);
                $em->flush();

                return $this->redirectToRoute('talentoSoporte', array( 'idTalento' => $idTalento));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionConocimiento/Talento:talento-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idTalento' => $idTalento
            )
        );
        
    }

    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/documentos-soporte/{idTalentoSoporte}/descargar", name="talentoSoporteRecuperarArchivo")
     */
    public function talentoSoporteDescargarAction(Request $request, $idTalento, $idTalentoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:TalentoSoporte')->findOneBy(
            array('id' => $idTalentoSoporte));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename = $link");
        header ("Content-Type: application/force-download");
        header ("Content-Length: ".filesize($link));
        readfile($link);           
        //return new BinaryFileResponse($link); -> para mostrar en ventana aparte
    }
    
    /**
     * @Route("/gestion-conocimiento/talento/{idTalento}/documentos-soporte/{idTalentoSoporte}/borrar", name="talentoSoporteBorrar")
     */
    public function talentoSoporteBorrarAction(Request $request, $idTalento, $idTalentoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $TalentoSoporte = new TalentoSoporte();
        
        $talentoSoporte = $em->getRepository('AppBundle:TalentoSoporte')->findOneBy(
            array('id' => $idTalentoSoporte)
        );
        
        $talentoSoporte->setFechaModificacion(new \DateTime());
        $talentoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('talentoSoporte', array( 'idTalento' => $idTalento));
        
    }

	
}
