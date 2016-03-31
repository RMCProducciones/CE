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


use AppBundle\Entity\Grupo;
use AppBundle\Entity\Camino;
use AppBundle\Entity\HabilitacionFases;
use AppBundle\Entity\DiagnosticoOrganizacional;
use AppBundle\Entity\Nodo; 
use AppBundle\Entity\SeguimientoMOT;
use AppBundle\Entity\SeguimientoFase;
use AppBundle\Entity\Visita;

use AppBundle\Form\GestionEmpresarial\HabilitacionFasesType;
use AppBundle\Form\GestionEmpresarial\SeguimientoMOTType;
use AppBundle\Form\GestionEmpresarial\SeguimientoFaseType;
use AppBundle\Form\GestionEmpresarial\VisitaType;
use AppBundle\Form\GestionEmpresarial\DiagnosticoOrganizacionalType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SeguimientoGrupoController extends Controller
{ 
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento", name="seguimientoGrupo")
     */
    public function seguimientoGrupoAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $camino = $em->getRepository('AppBundle:Camino')->findBy(
            array('grupo' => $grupo)
        );
        
       // die();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:grupo-seguimiento.html.twig', array( 'grupo' => $grupo, 'camino' => $camino));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/habilitacion-fase", name="habilitacionFases")
     */
    public function habilitacionFasesAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $habilitacionFases = $em->getRepository('AppBundle:HabilitacionFases')->findOneBy(
            array('grupo' => $grupo)
        );

        if(!$habilitacionFases)
            $habilitacionFases = new HabilitacionFases(); 

        //Validar si el clear aun está abierto para crear o editar el formulario, sino solo visualización
            //Validación mendiante consulta de la existencia de un "Documento de legalización del Clear" activo
        
        $asignacionGrupoCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(//Carga los CLEAR en los que se asigno el grupo
            array('grupo' => $grupo)
        );  

        $ultimoClearAsignado = $asignacionGrupoCLEAR[count($asignacionGrupoCLEAR)-1]->getId(); //Se obtiene el último CLEAR al que fue asignado
        
        $soportesActivos = $em->getRepository('AppBundle:ClearSoporte')->findOneBy(//Se busca la existencia del soporte activo
            array('active' => '1', 'clear' => $ultimoClearAsignado, ),
            array('fecha_creacion' => 'ASC')
        );

        $clearCerrado = false;
        if($soportesActivos) //Si se encuentra que existen un "Documento de legalización del Clear" activo, se determina que el CLEAR está cerrado
            $clearCerrado = true;
      
        $form = $this->createForm(new HabilitacionFasesType(), $habilitacionFases);

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
            $habilitacionFases = $form->getData();

            $habilitacionFases->setGrupo($grupo);

            //$habilitacionFases->setPi(true);

            $habilitacionFases->setActive(true);
            $habilitacionFases->setFechaCreacion(new \DateTime());

            $em->persist($habilitacionFases);
            $em->flush();

            return $this->redirectToRoute('seguimientoGrupo', array( 'idGrupo' => $idGrupo));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:grupo-habilitar-fases.html.twig', 
            array(
                    'form' => $form->createView(),
                    'grupo' => $grupo
            )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/diagnostico/nuevo", name="diagnosticoNuevo")
     */
    public function diagnosticoNuevoAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo= $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' =>$idGrupo) );

        $Diagnosticoorganizacional= new DiagnosticoOrganizacional();
        
        $form = $this->createForm(new DiagnosticoOrganizacionalType(), $Diagnosticoorganizacional);
        
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
            
            $Diagnosticoorganizacional = $form->getData();

            $Diagnosticoorganizacional->setGrupo($grupo);         

            $resultadoproductiva = ($Diagnosticoorganizacional->getProductivaA())+($Diagnosticoorganizacional->getProductivaB())+($Diagnosticoorganizacional->getProductivaC())+($Diagnosticoorganizacional->getProductivaD())+($Diagnosticoorganizacional->getProductivaE())+($Diagnosticoorganizacional->getProductivaF());
            $resultadocomercial = ($Diagnosticoorganizacional->getComercialA())+($Diagnosticoorganizacional->getComercialB())+($Diagnosticoorganizacional->getComercialC())+($Diagnosticoorganizacional->getComercialD())+($Diagnosticoorganizacional->getComercialE());
            $resultadofinanciera = ($Diagnosticoorganizacional->getFinancieraA())+($Diagnosticoorganizacional->getFinancieraB())+($Diagnosticoorganizacional->getFinancieraC())+($Diagnosticoorganizacional->getFinancieraD())+($Diagnosticoorganizacional->getFinancieraE())+($Diagnosticoorganizacional->getFinancieraF());
            $resultadoadministrativa = ($Diagnosticoorganizacional->getAdministrativaA())+($Diagnosticoorganizacional->getAdministrativaB())+($Diagnosticoorganizacional->getAdministrativaC())+($Diagnosticoorganizacional->getAdministrativaD())+($Diagnosticoorganizacional->getAdministrativaE());
            $resultadoorganizacional = ($Diagnosticoorganizacional->getOrganizacionalA())+($Diagnosticoorganizacional->getOrganizacionalB())+($Diagnosticoorganizacional->getOrganizacionalC())+($Diagnosticoorganizacional->getOrganizacionalD())+($Diagnosticoorganizacional->getOrganizacionalE())+($Diagnosticoorganizacional->getOrganizacionalF());
            $resultadototal=$resultadoproductiva+$resultadocomercial+ $resultadofinanciera+$resultadoadministrativa+$resultadoorganizacional +$resultadoorganizacional;

            $Diagnosticoorganizacional->setTotalProductiva($resultadoproductiva);
            $Diagnosticoorganizacional->setTotalComercial($resultadocomercial);
            $Diagnosticoorganizacional->setTotalFinanciera($resultadofinanciera);
            $Diagnosticoorganizacional->setTotalAdministrativa($resultadoadministrativa);
            $Diagnosticoorganizacional->setTotalOrganizacional($resultadoorganizacional);
            $Diagnosticoorganizacional->setTotal($resultadototal);


            $Diagnosticoorganizacional->setActive(true);
            $Diagnosticoorganizacional->setFechaCreacion(new \DateTime());


            $camino = $em->getRepository('AppBundle:Camino')->findBy(
                array('grupo' => $grupo)
            );

            foreach ($camino as $nodoCamino){
                if ($nodoCamino->getNodo()->getId() == 3 && $nodoCamino->getEstado() == 1) //Si el nodo es 3(Visita previa) y sus estado es 1(Siguiente/programado)
                    self::nodoCamino($idGrupo, 3, 2);
                if ($nodoCamino->getNodo()->getId() == 4 && $nodoCamino->getEstado() == 1) //Si el nodo es 4(Visita previa) y sus estado es 1(Siguiente/programado)
                    self::nodoCamino($idGrupo, 4, 2);
                if ($nodoCamino->getNodo()->getId() == 5 && $nodoCamino->getEstado() == 1) //Si el nodo es 5(Visita previa) y sus estado es 1(Siguiente/programado)
                    self::nodoCamino($idGrupo, 5, 2);
            }

            $em->persist($Diagnosticoorganizacional);
            $em->flush();

            return $this->redirectToRoute(
            'diagnosticoVisualizar', 
            array(
                    'idGrupo' => $idGrupo
            )
        );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:diagnostico-nuevo.html.twig',
         array('form' => $form->createView(), 'grupo' => $grupo,
        
            )
         );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/diagnostico/visualizar", name="diagnosticoVisualizar")
     */
    public function diagnosticoCalcularAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo= $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' =>$idGrupo) );

        $Diagnosticoorganizacional= $em->getRepository('AppBundle:DiagnosticoOrganizacional')->findOneBy(
            array('grupo' =>$grupo) );


        if(!$Diagnosticoorganizacional){
            return $this->redirectToRoute('diagnosticoNuevo', array( 'idGrupo' => $idGrupo));
        }

        $resultadoproductiva=$Diagnosticoorganizacional->getTotalProductiva();
        $resultadocomercial=$Diagnosticoorganizacional->getTotalComercial();
        $resultadofinanciera=$Diagnosticoorganizacional->getTotalFinanciera();
        $resultadoadministrativa=$Diagnosticoorganizacional->getTotalAdministrativa();
        $resultadoorganizacional=$Diagnosticoorganizacional->getTotalOrganizacional();
        $resultadototal=$Diagnosticoorganizacional->getTotal();


                 ;   
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:diagnostico-visualizacion.html.twig', 
            array(
                'grupo' => $grupo,
                'resultadoproductiva'=>$resultadoproductiva,
                'resultadocomercial'=>$resultadocomercial,
                'resultadofinanciera'=>$resultadofinanciera,
                'resultadoadministrativa'=>$resultadoadministrativa,
                'resultadoorganizacional'=>$resultadoorganizacional,
                'resultadototal'=>$resultadototal,
                'DiagnosticoOrganizacional' => $Diagnosticoorganizacional
            )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/inicio-mot/nuevo", name="seguimientoMotInicio")
     */
    public function seguimientoMotInicioAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();
        $seguimientoMot= new SeguimientoMOT();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id'=>$idGrupo)
        );   

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id'=>$idNodo)
        );        

        $fase = $nodo->getFase();    

        $form = $this->createForm(new SeguimientoMOTType(), $seguimientoMot);
        
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
            
            $seguimientoMot = $form->getData();

            $seguimientoMot->setGrupo($grupo);
            $seguimientoMot->setFase($fase);            
            $seguimientoMot->setActive(true);
            $seguimientoMot->setFechaCreacion(new \DateTime());
            $em->persist($seguimientoMot);


            self::encendidoNodoSeguimento($idGrupo, $idNodo);         
           
            $em->flush();


            return $this->redirect(
                $this->generateUrl(
                    'seguimientoGrupo', 
                    array(
                        'idGrupo' => $idGrupo
                    )
                )
            );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-mot-nuevo.html.twig',
            array('form' => $form->createView(),                   
                   'idNodo' => $idNodo,
                   'idGrupo' => $idGrupo
            )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/cierre-mot/nuevo", name="seguimientoMotCierre")
     */
    public function seguimientoMotCierreAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();
        $seguimientoMot= new SeguimientoMot(); 

       $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id'=>$idNodo)
        );        

        $fase = $nodo->getFase();    

        $seguimientoMot = $em->getRepository('AppBundle:SeguimientoMot')->findOneBy(
            array('grupo' => $idGrupo,
                  'fase' => $fase                  
                )
        );
        
        $seguimientoMotCierre = $em->getRepository('AppBundle:SeguimientoMot')->findOneBy(
            array('id' => $seguimientoMot->getId())
        );

        $form = $this->createForm(new SeguimientoMotType(), $seguimientoMotCierre);
        
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

            $seguimientoMotCierre = $form->getData();

            $seguimientoMotCierre->setFechaModificacion(new \DateTime());

            self::nodoCamino($idGrupo, $idNodo, 2);            

            $em->flush();

            return $this->redirect(
                $this->generateUrl(
                    'seguimientoGrupo', 
                    array(
                        'idGrupo' => $idGrupo
                    )
                )
            );
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-mot-nuevo.html.twig',
            array('form' => $form->createView(),                   
                   'idNodo' => $idNodo,
                   'idGrupo' => $idGrupo
            )
        );
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/inicio-fase/nuevo", name="seguimientofaseInicio")
     */
    public function seguimientofaseInicioAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();
        $seguimientofase= new SeguimientoFase();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id'=>$idGrupo)
        );

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id'=>$idNodo)
        );        

        $fase = $nodo->getFase();
        
        $form = $this->createForm(new SeguimientoFaseType(), $seguimientofase);
        
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
            
            $seguimientofase = $form->getData();

            $seguimientofase->setGrupo($grupo);
            $seguimientofase->setFase($fase);
            $seguimientofase->setActive(true);
            $seguimientofase->setFechaCreacion(new \DateTime());
            $em->persist($seguimientofase);

            self::encendidoNodoSeguimento($idGrupo, $idNodo);         
           
            $em->flush();


            return $this->redirect(
                $this->generateUrl(
                    'seguimientoGrupo', 
                    array(
                        'idGrupo' => $idGrupo
                    )
                )
            );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-fase-nuevo.html.twig',
            array('form' => $form->createView(),                   
                   'idNodo' => $idNodo,
                   'idGrupo' => $idGrupo
            )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/cierre-fase/nuevo", name="seguimientofaseCierre")
     */
    public function seguimientofaseCierreAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();
        $seguimientofase= new SeguimientoFase();

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id'=>$idNodo)
        );        

        $fase = $nodo->getFase();

        $seguimientofase = $em->getRepository('AppBundle:SeguimientoFase')->findOneBy(
            array('grupo' => $idGrupo,
                  'fase' => $fase
                )
        );
        
        $seguimientoFaseCierre = $em->getRepository('AppBundle:SeguimientoFase')->findOneBy(
            array('id' => $seguimientofase->getId())
        );

        $form = $this->createForm(new SeguimientoFaseType(), $seguimientoFaseCierre);
        
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

            $seguimientoFaseCierre = $form->getData();

            $seguimientoFaseCierre->setFechaModificacion(new \DateTime());

            self::nodoCamino($idGrupo, $idNodo, 2);            

            $em->flush();

            return $this->redirect(
                $this->generateUrl(
                    'seguimientoGrupo', 
                    array(
                        'idGrupo' => $idGrupo
                    )
                )
            );
        }

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-fase-nuevo.html.twig',
            array('form' => $form->createView(),                   
                   'idNodo' => $idNodo,
                   'idGrupo' => $idGrupo
            )
        );
    }


    private function nodoCamino($idGrupo, $idNodo, $estado)
    {
        $em = $this->getDoctrine()->getManager();

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodoCaminoAccion = new Camino();
        $nodoCaminoAccion->setGrupo($grupo);
        $nodoCaminoAccion->setNodo($nodo);
        $nodoCaminoAccion->setEstado($estado);
        $nodoCaminoAccion->setActive(true);
        $nodoCaminoAccion->setFechaCreacion(new \DateTime());

        $em->persist($nodoCaminoAccion);
    }

    private function encendidoNodoSeguimento($idGrupo, $idNodo){

        if($idNodo == 6)
            self::nodoCamino($idGrupo, 7, 1);
        elseif ($idNodo == 10) {
            self::nodoCamino($idGrupo, 11, 1);
        }
        elseif ($idNodo == 14) {
            self::nodoCamino($idGrupo, 15, 1);
        }
        elseif ($idNodo == 20){
            self::nodoCamino($idGrupo, 21, 1);
        }
        else{
            self::nodoCamino($idGrupo, 27, 1);
        }

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/nuevo", name="visitaNuevo")
     */
    public function visitaNuevoAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();
        $visita= new Visita();
        $seguimientoFase= new SeguimientoFase();
        $idSeguimientoFase= new SeguimientoFase();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo));

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo));

        $fase = $nodo->getFase();

        $seguimientoFase = $em->getRepository('AppBundle:SeguimientoFase')->findOneBy(
            array('grupo' => $idGrupo,
                  'fase' => $fase
                 )
        );       

        $idSeguimientoFase = $em->getRepository('AppBundle:SeguimientoFase')->findOneBy(
            array('id' => $seguimientoFase->getId())
        );
        
        $form = $this->createForm(new VisitaType(), $visita);
        
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
            
            $visita = $form->getData();

            $visita->setGrupo($grupo);
            $visita->setSeguimientoFase($seguimientoFase);
            $visita->setNodo($nodo);
            $visita->setActive(true);
            $visita->setFechaCreacion(new \DateTime());

            /*$usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $pasantia->setUsuarioCreacion($usuarioCreacion);*/
            
        
            $em->persist($visita);
            $em->flush();

            if($visita->getInterventoria() != 1)
                self::nodoCamino($idGrupo, $nodo->getId(), 6);
            else{
                self::nodoCamino($idGrupo, $nodo->getId(), 2);
                self::nodoCamino($idGrupo, $nodo->getId()+1, 1);
            }

            $em->flush();

            return $this->redirect(
                $this->generateUrl(
                    'seguimientoGrupo', 
                    array(
                        'idGrupo' => $idGrupo
                    )
                )
            );

     
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:visita-nuevo.html.twig',
                                array(
                                        'form' => $form->createView(),
                                        'idGrupo' => $idGrupo
                                    )
                            );
    }

}