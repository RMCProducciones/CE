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

use AppBundle\Entity\Grupo;
use AppBundle\Entity\Listas;
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\Ahorro;
use AppBundle\Entity\AsignacionBeneficiarioAhorro;
use AppBundle\Entity\BeneficiarioAhorroCorte;

use AppBundle\Form\GestionEmpresarial\BeneficiarioSoporteType;
use AppBundle\Form\GestionFinanciera\AsignacionBeneficiarioAhorroType;
use AppBundle\Form\GestionFinanciera\BeneficiarioAhorroCorteType;

use AppBundle\Form\GestionEmpresarial\BeneficiarioFilterType;

use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;



class BeneficiarioAhorroController extends Controller
{

    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/grupo/{idGrupo}/beneficiario-ahorro/gestion", name="beneficiarioAhorroGestion")
     */
    public function beneficiarioAhorroGestionAction(Request $request, $idAhorro, $idGrupo)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');
                  
        $form = $this->get('form.factory')->create(new BeneficiarioFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");


        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro));

        $incentivoAhorro = $em->getRepository('AppBundle:AsignacionBeneficiarioAhorro')->findBy(
            array('ahorro' => $ahorro));

        $ahorroReal = $em->getRepository('AppBundle:BeneficiarioAhorroCorte')->findBy(
            array('ahorro' => $ahorro));

        return $this->render('AppBundle:GestionFinanciera/BeneficiarioAhorro:beneficiario-ahorro-gestion.html.twig', 
        array( 'form' => $form->createView(), 
               'idGrupo' => $idGrupo, 
               'beneficiarios' => $query, 
               'grupo'=>$grupo, 
               'pagination'=> $pagination, 
               'incentivoAhorro' => $incentivoAhorro,
               'idAhorro' => $idAhorro,
               'ahorroRealBeneficiarios' => $ahorroReal,
               'tipoUsuario' => $valuesFieldBlock[3]));

    }

    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/grupo/{idGrupo}/beneficiario-ahorro/{idBeneficiario}/nuevo", name="beneficiarioAhorroNuevo")
     */
    public function beneficiarioAhorroNuevoAction(Request $request, $idAhorro, $idGrupo, $idBeneficiario)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioAhorro = $em->getRepository('AppBundle:AsignacionBeneficiarioAhorro')->findOneBy(
            array('ahorro' => $idAhorro,
                  'beneficiario' => $idBeneficiario));
        if($asignacionBeneficiarioAhorro == null){
            $asignacionBeneficiarioAhorro = new AsignacionBeneficiarioAhorro();            
        }
        
        
        $form = $this->createForm(new AsignacionBeneficiarioAhorroType(), $asignacionBeneficiarioAhorro);

        $form->handleRequest($request);

        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro));
        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario));

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $asignacionBeneficiarioAhorro = $form->getData();


            $asignacionBeneficiarioAhorro->setAhorro($ahorro);
            $asignacionBeneficiarioAhorro->setBeneficiario($beneficiario);

            $asignacionBeneficiarioAhorro->setActive(true);
            $asignacionBeneficiarioAhorro->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $asignacionBeneficiarioAhorro->setUsuarioCreacion($usuario);


            
            $em->persist($asignacionBeneficiarioAhorro);
            $em->flush();

            $asignacionBeneficiarioAhorro->setPlanAhorroIndividual($asignacionBeneficiarioAhorro->getMetaAhorroActivacion() + ($asignacionBeneficiarioAhorro->getMetaAhorroMensual() * 12 ));

            $em->persist($asignacionBeneficiarioAhorro);
            $em->flush();

            return $this->redirectToRoute('beneficiarioAhorroGestion', array('idAhorro' => $idAhorro, 'idGrupo' => $idGrupo));
        }
        
        return $this->render('AppBundle:GestionFinanciera/BeneficiarioAhorro:incentivo-ahorro-beneficiario-nuevo.html.twig',
            array('form' => $form->createView(),
                  'idAhorro' => $idAhorro,
                  'idGrupo' => $idGrupo));
    }

    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/grupo/{idGrupo}/beneficiario-ahorro/{idBeneficiario}/corte-ahorro/gestion", name="beneficiarioAhorroCorteGestion")
     */
    public function beneficiarioAhorroCorteGestionAction(Request $request, $idAhorro, $idGrupo, $idBeneficiario)
    {
        
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:BeneficiarioAhorroCorte')
            ->createQueryBuilder('q');
                  
        $form = $this->get('form.factory')->create(new BeneficiarioFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.beneficiario = :idBeneficiario')
        ->setParameter('idBeneficiario', $idBeneficiario)
        ->andwhere('q.ahorro = :idAhorro')
        ->setParameter('idAhorro', $idAhorro)
        ->andWhere('q.active = 1');

        $query = $filterBuilder->getQuery();

        //var_dump($filterBuilder->getDql());
        //die("");


        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            10/*límite de resultados por página*/
        );

        $rolUsuario = $this->get('security.context')->getToken()->getUser()->getRoles();

        $obj = new FilterLocation();

        $valuesFieldBlock = $obj->fieldBlock($rolUsuario);

        return $this->render('AppBundle:GestionFinanciera/BeneficiarioAhorro:beneficiario-ahorro-corte-gestion.html.twig', 
        array( 'form' => $form->createView(), 
               'idGrupo' => $idGrupo, 
               'beneficiarios' => $query, 
               'grupo'=>$grupo, 
               'pagination'=> $pagination,                
               'idAhorro' => $idAhorro,
               'idBeneficiario' => $idBeneficiario,
               'tipoUsuario' => $valuesFieldBlock[3]));

    }

    /**
     * @Route("/gestion-financiera/ahorro/{idAhorro}/grupo/{idGrupo}/beneficiario-ahorro/{idBeneficiario}/corte-ahorro/nuevo", name="beneficiarioAhorroCorteNuevo")
     */
    public function beneficiarioAhorroCorteNuevoAction(Request $request, $idAhorro, $idGrupo, $idBeneficiario)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();
        $beneficiarioAhorroCorte = new BeneficiarioAhorroCorte();
        
        $form = $this->createForm(new BeneficiarioAhorroCorteType(), $beneficiarioAhorroCorte);

        $form->handleRequest($request);

        $ahorro = $em->getRepository('AppBundle:Ahorro')->findOneBy(
            array('id' => $idAhorro));
        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario));

        $incentivoAhorro = $em->getRepository('AppBundle:AsignacionBeneficiarioAhorro')->findOneBy(
            array('ahorro' => $ahorro,
                  'beneficiario' => $beneficiario));

        $cantidadCortesAhorro = $em->getRepository('AppBundle:BeneficiarioAhorroCorte')->findBy(
            array('ahorro' => $ahorro,
                  'beneficiario' => $beneficiario));

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $beneficiarioAhorroCorte = $form->getData();


            $beneficiarioAhorroCorte->setAhorro($ahorro);
            $beneficiarioAhorroCorte->setBeneficiario($beneficiario);

            $beneficiarioAhorroCorte->setActive(true);
            $beneficiarioAhorroCorte->setFechaCreacion(new \DateTime());
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $beneficiarioAhorroCorte->setUsuarioCreacion($usuario);


            
            $em->persist($beneficiarioAhorroCorte);
            $em->flush();

            $añoCorte = $beneficiarioAhorroCorte->getFechaRealizacion()->format('Y');
            $mesCorte = $beneficiarioAhorroCorte->getFechaRealizacion()->format('m');
            $diaCorte = $beneficiarioAhorroCorte->getFechaRealizacion()->format('d');

            $añoInicio = $incentivoAhorro->getFechaInicio()->format('Y');
            $mesInicio = $incentivoAhorro->getFechaInicio()->format('m');
            $diaInicio = $incentivoAhorro->getFechaInicio()->format('d'); 

            if(sizeof($cantidadCortesAhorro) == 0){
                $beneficiarioAhorroCorte->setMetaAhorroCorte($incentivoAhorro->getMetaAhorroActivacion());
                $beneficiarioAhorroCorte->setCumplimientoCorte(($beneficiarioAhorroCorte->getAhorroCorte() / $incentivoAhorro->getMetaAhorroActivacion()) * 100);
                $beneficiarioAhorroCorte->setAhorroRealCorte($beneficiarioAhorroCorte->getAhorroCorte());                                
                if($beneficiarioAhorroCorte->getAhorroCorte() > 50000){
                    $beneficiarioAhorroCorte->setIncentivoCorte(50000);
                }else{
                    $beneficiarioAhorroCorte->setIncentivoCorte($beneficiarioAhorroCorte->getAhorroCorte());                                        
                }
            }else{
                if($añoCorte == $añoInicio){
                    if($mesCorte == $mesInicio){
                        if(sizeof($cantidadCortesAhorro) == 1){ 
                            $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual();
                        }else{
                            $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getMetaAhorroCorte();
                        }
                        $beneficiarioAhorroCorte->setMetaAhorroCorte($metaAhorroCorte);
                        $ahorroReal = $beneficiarioAhorroCorte->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getIncentivoCorte();
                        $beneficiarioAhorroCorte->setAhorroRealCorte($ahorroReal);
                        $cumplimientoCorte = ($ahorroReal / $metaAhorroCorte) * 100;
                        $beneficiarioAhorroCorte->setCumplimientoCorte($cumplimientoCorte);                        
                        
                        if($cumplimientoCorte >= 80 ){
                            if($ahorroReal > $incentivoAhorro->getMetaAhorroMensual()){
                                $beneficiarioAhorroCorte->setIncentivoCorte($incentivoAhorro->getMetaAhorroMensual() / 2);    
                            }else{
                                $beneficiarioAhorroCorte->setIncentivoCorte($beneficiarioAhorroCorte->getAhorroCorte() / 2);    
                            }                                                
                        }else{
                            $beneficiarioAhorroCorte->setIncentivoCorte(0);
                        }
                    }else if($mesCorte > $mesInicio){
                        if($diaCorte <= $diaInicio){
                            $meses = $mesCorte - $mesInicio;
                            if(sizeof($cantidadCortesAhorro) == 1){ 
                                $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual() * $meses;
                            }else{
                                $metaAhorroCorte = ($incentivoAhorro->getMetaAhorroMensual() * $meses) - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getMetaAhorroCorte();
                            }   
                            $beneficiarioAhorroCorte->setMetaAhorroCorte($metaAhorroCorte);                         
                            $ahorroReal = $beneficiarioAhorroCorte->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getIncentivoCorte();
                            $beneficiarioAhorroCorte->setAhorroRealCorte($ahorroReal);
                            $cumplimientoCorte = ($ahorroReal / $metaAhorroCorte) * 100;
                            $beneficiarioAhorroCorte->setCumplimientoCorte($cumplimientoCorte);                        
                            
                            if($cumplimientoCorte >= 80 ){
                                if($ahorroReal > ($incentivoAhorro->getMetaAhorroMensual() * $meses)){
                                    $beneficiarioAhorroCorte->setIncentivoCorte(($incentivoAhorro->getMetaAhorroMensual() * $meses) / 2);    
                                }else{
                                    $beneficiarioAhorroCorte->setIncentivoCorte($ahorroReal / 2);    
                                }                                                
                            }else{
                                $beneficiarioAhorroCorte->setIncentivoCorte(0);
                            }
                        }else{
                            $meses = $mesCorte - $mesInicio + 1;
                            if(sizeof($cantidadCortesAhorro) == 1){ 
                                $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual() * $meses;
                            }else{
                                $metaAhorroCorte = ($incentivoAhorro->getMetaAhorroMensual() * $meses) - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getMetaAhorroCorte();
                            }   
                            $beneficiarioAhorroCorte->setMetaAhorroCorte($metaAhorroCorte);                            
                            $ahorroReal = $beneficiarioAhorroCorte->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getIncentivoCorte();
                            $beneficiarioAhorroCorte->setAhorroRealCorte($ahorroReal);
                            $cumplimientoCorte = ($ahorroReal / $metaAhorroCorte) * 100;
                            $beneficiarioAhorroCorte->setCumplimientoCorte($cumplimientoCorte);                        
                            
                            if($cumplimientoCorte >= 80 ){
                                if($ahorroReal > ($incentivoAhorro->getMetaAhorroMensual() * $meses)){
                                    $beneficiarioAhorroCorte->setIncentivoCorte(($incentivoAhorro->getMetaAhorroMensual() * $meses) / 2);    
                                }else{
                                    $beneficiarioAhorroCorte->setIncentivoCorte($ahorroReal / 2);    
                                }                                                
                            }else{
                                $beneficiarioAhorroCorte->setIncentivoCorte(0);
                            }
                        }
                        
                    }
                }else{
                    if($diaCorte <= $diaInicio){
                        $meses = 12 + ($mesCorte - $mesInicio);
                        if(sizeof($cantidadCortesAhorro) == 1){ 
                            $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual() * $meses;
                        }else{
                            $metaAhorroCorte = ($incentivoAhorro->getMetaAhorroMensual() * $meses) - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getMetaAhorroCorte();
                        }   
                        $beneficiarioAhorroCorte->setMetaAhorroCorte($metaAhorroCorte);                                 
                        $ahorroReal = $beneficiarioAhorroCorte->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getIncentivoCorte();
                        $beneficiarioAhorroCorte->setAhorroRealCorte($ahorroReal);
                        $cumplimientoCorte = ($ahorroReal / $metaAhorroCorte) * 100;
                        $beneficiarioAhorroCorte->setCumplimientoCorte($cumplimientoCorte);                        
                        
                        if($cumplimientoCorte >= 80 ){
                            if($ahorroReal > ($incentivoAhorro->getMetaAhorroMensual() * $meses)){
                                $beneficiarioAhorroCorte->setIncentivoCorte(($incentivoAhorro->getMetaAhorroMensual() * $meses) / 2);    
                            }else{
                                $beneficiarioAhorroCorte->setIncentivoCorte($ahorroReal / 2);    
                            }                                                
                        }else{
                            $beneficiarioAhorroCorte->setIncentivoCorte(0);
                        }
                    }else{
                        $meses = 13 + ($mesCorte - $mesInicio);
                        if(sizeof($cantidadCortesAhorro) == 1){ 
                            $metaAhorroCorte = $incentivoAhorro->getMetaAhorroMensual() * $meses;
                        }else{
                            $metaAhorroCorte = ($incentivoAhorro->getMetaAhorroMensual() * $meses) - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getMetaAhorroCorte();
                        }   
                        $beneficiarioAhorroCorte->setMetaAhorroCorte($metaAhorroCorte);                                                                        
                        $ahorroReal = $beneficiarioAhorroCorte->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getAhorroCorte() - $cantidadCortesAhorro[sizeof($cantidadCortesAhorro) - 1]->getIncentivoCorte();
                        $beneficiarioAhorroCorte->setAhorroRealCorte($ahorroReal);
                        $cumplimientoCorte = ($ahorroReal / $metaAhorroCorte) * 100;
                        $beneficiarioAhorroCorte->setCumplimientoCorte($cumplimientoCorte);                        
                        
                        if($cumplimientoCorte >= 80 ){
                            if($ahorroReal > ($incentivoAhorro->getMetaAhorroMensual() * $meses)){
                                $beneficiarioAhorroCorte->setIncentivoCorte(($incentivoAhorro->getMetaAhorroMensual() * $meses) / 2);    
                            }else{
                                $beneficiarioAhorroCorte->setIncentivoCorte($ahorroReal / 2);    
                            }                                                
                        }else{
                            $beneficiarioAhorroCorte->setIncentivoCorte(0);
                        }
                    }
                    
                }

            }

            $em->persist($beneficiarioAhorroCorte);
            $em->flush();

            return $this->redirectToRoute('beneficiarioAhorroCorteGestion', array('idAhorro' => $idAhorro, 'idGrupo' => $idGrupo, 'idBeneficiario' => $idBeneficiario));
        }
        
        return $this->render('AppBundle:GestionFinanciera/BeneficiarioAhorro:beneficiario-ahorro-corte-nuevo.html.twig',
            array('form' => $form->createView(),
                  'idAhorro' => $idAhorro,
                  'idGrupo' => $idGrupo,
                  'idBeneficiario' => $idBeneficiario));
    }
}