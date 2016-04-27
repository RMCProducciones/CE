<?php

namespace AppBundle\Controller\GestionFinanciera;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use AppBundle\Entity\Ahorro;
use AppBundle\Entity\AhorroSoporte;
use AppBundle\Entity\DocumentoSoporte;


use AppBundle\Form\GestionFinanciera\AhorroType;
use AppBundle\Form\GestionFinanciera\AhorroSoporteType;
use AppBundle\Form\GestionFinanciera\AhorroFilterType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AhorroController extends Controller
{
   /**
     * @Route("/gestion-financiera/ahorro/gestion", name="ahorroGestion")
     */
    public function ahorroGestionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /*$ahorros= $em->getRepository('AppBundle:Ahorro')->findBY(
            array('active' => 1)            
        ); */

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Ahorro')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new AhorroFilterType());

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

        return $this->render('AppBundle:GestionFinanciera/Ahorro:ahorro-gestion.html.twig', 
            array( 'form' => $form->createView(),
                    'ahorros' => $query,
                    'pagination' => $pagination
                )
            );
    }  
    
     /**
     * @Route("/gestion-financiera/ahorro/nuevo", name="ahorroNuevo")
     */
    public function ahorroNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();
        
        $form = $this->createForm(new AhorroType(), $ahorro);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $ahorro = $form->getData();

            $ahorro->setActive(true);
            $ahorro->setFechaCreacion(new \DateTime());


            
            $em->persist($ahorro);
            $em->flush();

            return $this->redirectToRoute('ahorroGestion');
        }
        
        return $this->render('AppBundle:GestionFinanciera/Ahorro:ahorro-nuevo.html.twig', array('form' => $form->createView()));
    } 
    
 /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/editar", name="ahorroEditar")
     */
    public function ahorroEditarAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();

        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro)
        );

        $form = $this->createForm(new AhorroType(), $ahorro);
        
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

            $ahorro = $form->getData();

            $ahorro->setFechaModificacion(new \DateTime());


            $em->flush();

            return $this->redirectToRoute('ahorroGestion');
        }

        return $this->render(
            'AppBundle:GestionFinanciera/Ahorro:ahorro-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idAhorro' => $idAhorro,
                    'ahorro' => $ahorro,
            )
        );

    }
/**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/eliminar", name="ahorroEliminar")
     */
    public function ahorroEliminarAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();
        $ahorro = new Ahorro();

        $ahorro = $em->getRepository('AppBundle:Ahorro')->find($idAhorro);              

        $em->remove($ahorro);
        $em->flush();

        return $this->redirect($this->generateUrl('ahorroGestion'));

    }



/**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/documentos-soporte", name="ahorroSoporte")
     */
    public function ahorroSoporteAction(Request $request, $idAhorro)
    {
        $em = $this->getDoctrine()->getManager();

        $ahorroSoporte = new AhorroSoporte();
        
        $form = $this->createForm(new AhorroSoporteType(), $ahorroSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
            array('active' => '1', 'ahorro' => $idAhorro),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
            array('active' => '0', 'ahorro' => $idAhorro),
            array('fecha_creacion' => 'ASC')
        );
        
        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $ahorroSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'ahorro_tipo_soporte'
                    )
                );
                
                $actualizarAhorroSoportes = $em->getRepository('AppBundle:AhorroSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'ahorro' => $idAhorro
                    )
                );  
            
                foreach ($actualizarAhorroSoportes as $actualizarAhorroSoporte){
                    echo $actualizarAhorroSoporte->getId()." ".$actualizarAhorroSoporte->getTipoSoporte()."<br />";
                    $actualizarAhorroSoporte->setFechaModificacion(new \DateTime());
                    $actualizarAhorroSoporte->setActive(0);
                    $em->flush();
                }
                
                $ahorroSoporte->setAhorro($ahorro);
                $ahorroSoporte->setActive(true);
                $ahorroSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($ahorroSoporte);
                $em->flush();

                return $this->redirectToRoute('ahorroSoporte', array( 'idAhorro' => $idAhorro));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionFinanciera/Ahorro:ahorro-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/documentos-soporte/{idAhorroSoporte}/borrar", name="ahorroSoporteBorrar")
     */
    public function ahorroSoporteBorrarAction(Request $request, $idAhorro, $idAhorroSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $ahorro = new AhorroSoporte();
        
        $ahorroSoporte = $em->getRepository('AppBundle:AhorroSoporte')->findOneBy(
            array('id' => $idAhorroSoporte)
        );
        
        $ahorroSoporte->setFechaModificacion(new \DateTime());
        $ahorroSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('ahorroSoporte', array( 'idAhorro' => $idAhorro));
        
    }


}

