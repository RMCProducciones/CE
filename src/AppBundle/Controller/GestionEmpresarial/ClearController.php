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


use AppBundle\Entity\CLEAR;
use AppBundle\Entity\ClearSoporte;
use AppBundle\Entity\Listas;
use AppBundle\Entity\Integrante;
use AppBundle\Entity\AsignacionIntegranteCLEAR;
use AppBundle\Entity\AsignacionGrupoCLEAR;
use AppBundle\Entity\Camino;
use AppBundle\Entity\HabilitacionFases;
use AppBundle\Entity\Grupo;


use AppBundle\Form\GestionEmpresarial\CLEARType;
use AppBundle\Form\GestionEmpresarial\ClearSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolBeneficiarioType;
use AppBundle\Form\GestionEmpresarial\ListaRolType;




/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ClearController extends Controller
{
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/gestion", name="clearGestion")
    */
    public function clearGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cleares = $em->getRepository('AppBundle:CLEAR')->findBY(
            array('active' => 1),
            array('fecha_inicio' => 'ASC')
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:clear-gestion.html.twig', 
            array( 'cleares' => $cleares)
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/nuevo", name="clearNuevo")
     */
    public function clearNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $clear = new Clear();
        
        $form = $this->createForm(new CLEARType(), $clear);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $clear = $form->getData();

            $clear->setActive(true);
            $clear->setFechaCreacion(new \DateTime());


            
            $em->persist($clear);
            $em->flush();

            return $this->redirectToRoute('clearGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:clear-nuevo.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/eliminar", name="clearEliminar")
     */
    public function ClearEliminarAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();
        $clear = new Clear();

        $clear = $em->getRepository('AppBundle:Clear')->find($idCLEAR);              

        $em->remove($clear);
        $em->flush();

        return $this->redirect($this->generateUrl('clearGestion'));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/editar", name="clearEditar")
     */
    public function clearEditarAction(Request $request, $idCLEAR)
    {
        
		$em = $this->getDoctrine()->getManager();
        $clear = new Clear();

        $clear = $em->getRepository('AppBundle:Clear')->findOneBy(
            array('id' => $idCLEAR)
        );
		
        $form = $this->createForm(new CLEARType(), $clear);

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
            // data is an array with "name", "email", and "message" keys
            $clear = $form->getData();

            $clear->setActive(true);
            $clear->setFechaCreacion(new \DateTime());

            $em->persist($clear);
            $em->flush();

            return $this->redirectToRoute('clearGestion');
        }


		return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:clear-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCLEAR' => $idCLEAR,
                    'clear' => $clear
            )
        );
		

    }	

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/documentos-soporte", name="clearSoporte")
     */
    public function clearSoporteAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clearSoporte = new ClearSoporte();
        
        $form = $this->createForm(new ClearSoporteType(), $clearSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ClearSoporte')->findBy(
            array('active' => '1', 'clear' => $idCLEAR),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ClearSoporte')->findBy(
            array('active' => '0', 'clear' => $idCLEAR),
            array('fecha_creacion' => 'ASC')
        );
        
        $clear = $em->getRepository('AppBundle:Clear')->findOneBy(
            array('id' => $idCLEAR)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $clearSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'clear_tipo_soporte'
                    )
                );
                
                $actualizarClearSoportes = $em->getRepository('AppBundle:ClearSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'clear' => $idCLEAR
                    )
                );  
            
                foreach ($actualizarClearSoportes as $actualizarClearSoporte){
                    //echo $actualizarClearSoporte->getId()." ".$actualizarClearSoporte->getTipoSoporte()."<br />";
                    $actualizarClearSoporte->setFechaModificacion(new \DateTime());
                    $actualizarClearSoporte->setActive(0);
                    $em->flush();
                }
                
                $clearSoporte->setClear($clear);
                $clearSoporte->setActive(true);
                $clearSoporte->setFechaCreacion(new \DateTime());

                if($clearSoporte->getTipoSoporte()->getDescripcion()=="Documento de legalización del Clear"){ 
                    //Despúes de subir el Acta final del CLEAR toma lo que esté almacenado en habilitacionFases de cada grupo 
                    //para asignar un nodo Ejecutado o un nodo Rechazado

                    self::operacionesLegalizacionClear($clear);

                }
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($clearSoporte);
                $em->flush();

                return $this->redirectToRoute('clearSoporte', array( 'idCLEAR' => $idCLEAR) );
            }
        }   
        

        //return new Response("Hola mundo");
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:clear-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idCLEAR' => $idCLEAR
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/documentos-soporte/{idClearSoporte}/borrar", name="clearSoporteBorrar")
     */
    public function clearSoporteBorrarAction(Request $request, $idCLEAR, $idClearSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $clearSoporte = new ClearSoporte();
        
        $clearSoporte = $em->getRepository('AppBundle:ClearSoporte')->findOneBy(
            array('id' => $idClearSoporte)
        );
        
        $clearSoporte->setFechaModificacion(new \DateTime());
        $clearSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('clearSoporte', array( 'idCLEAR' => $idCLEAR));
        
    }
    

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante", name="clearIntegrante")
     */
    public function clearIntegranteAction(Request $request, $idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        if ($request->getMethod() == 'POST') {


            if(isset($_POST["idRolIntegrante"])){

                echo ($_POST["idRolIntegrante"]["idIntegrante"]);


                $asignacionIntegranteCLEAR = new AsignacionIntegranteCLEAR();

                $rolIntegrante = $em->getRepository('AppBundle:Listas')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["rol"])
                );  

                $integrante = $em->getRepository('AppBundle:Integrante')->findOneBy(
                    array('id' => $_POST["idRolIntegrante"]["idIntegrante"])
                );  

                $asignacionIntegranteCLEAR->setRol($rolIntegrante);
                $asignacionIntegranteCLEAR->setClear($clear);
                $asignacionIntegranteCLEAR->setIntegrante($integrante);

                $asignacionIntegranteCLEAR->setFechaCreacion(new \DateTime());
                $asignacionIntegranteCLEAR->setActive(0);


                $em->persist($asignacionIntegranteCLEAR);
                $em->flush();

            }

        }        

        $asignacionesIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->findBy(
            array('clear' => $clear)
        );        

        $query = $em->createQuery('SELECT i FROM AppBundle:Integrante i WHERE i.id NOT IN (SELECT integrante.id FROM AppBundle:Integrante integrante JOIN AppBundle:AsignacionIntegranteCLEAR agc WHERE integrante = agc.integrante AND agc.clear = :clear) AND i.active = 1');
        $query->setParameter('clear', $clear);

        $integrantes = $query->getResult();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:integrantes-clear-gestion-asignacion.html.twig', 
            array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteCLEAR' => $asignacionesIntegranteCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante/{idIntegrante}/formulario", name="formularioRolIntegranteClear")
     */
    public function formularioRolIntegranteClearAction(Request $request, $idCLEAR, $idIntegrante)
    {

        $em = $this->getDoctrine()->getManager();

        $asignacionesIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $form = $this->createForm(new ListaRolType(), $asignacionesIntegranteCLEAR);

        $form->add(
            'idIntegrante', 
            'hidden', 
            array(
                'mapped' => false,
                'attr' => array(      
                    'value' => $idIntegrante,              
                    'style' => 'visibility:hidden'
                )
            )
        );
//El boton tiene un error al enviar el ID del beneficiario
        $form->add(
            'Asignar_'.$idIntegrante, 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );


        $form->handleRequest($request);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:asignarRolIntegranteClear.html.twig',
            array(
                'form' => $form->createView(),
                'idIntegrante' => $idIntegrante,
                'idCLEAR' => $idCLEAR
                )
        );
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-integrante/{idAsignacionIntegranteCLEAR}/eliminar", name="clearEliminarIntegrante")
     */
    public function clearEliminarIntegranteAction(Request $request, $idCLEAR, $idAsignacionIntegranteCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionIntegranteCLEAR = new AsignacionIntegranteCLEAR();

        $asignacionIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->find($idAsignacionIntegranteCLEAR); 

        $integrantes = $em->getRepository('AppBundle:Integrante')->findBy(
            array('active' => '1'),
            array('primer_apellido' => 'ASC')            
        );  

        $em->remove($asignacionIntegranteCLEAR);
        $em->flush();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionIntegranteCLEAR')->findBy(
            array('clear' => $clear)
        );  

        return $this->redirectToRoute('clearIntegrante',
             array(
                'integrantes' => $integrantes,
                'asignacionesIntegranteCLEAR' => $asignacionIntegranteCLEAR,
                'idCLEAR' => $idCLEAR
            ));    
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo", name="clearGrupo")
     */
    public function clearGrupoAction($idCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesGrupoCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
            array('clear' => $clear)
        );  

        $query = $em->createQuery('SELECT g FROM AppBundle:Grupo g WHERE g.id NOT IN (SELECT grupo.id FROM AppBundle:Grupo grupo JOIN AppBundle:AsignacionGrupoCLEAR agc WHERE grupo = agc.grupo AND agc.clear = :clear) AND g.active = 1');
        $query->setParameter('clear', $clear);

        $grupos = $query->getResult();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Clear:grupo-clear-gestion-asignacion.html.twig', 
            array(
                'grupos' => $grupos,
                'asignacionesGrupoCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo/{idGrupo}/nueva-asignacion", name="clearAsignarGrupo")
     */
    public function clearAsignarGrupoAction($idCLEAR, $idGrupo)
    {

        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );  

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );
           
        $asignacionesGrupoCLEAR = new AsignacionGrupoCLEAR();

        $asignacionesGrupoCLEAR->setGrupo($grupo);
        $asignacionesGrupoCLEAR->setClear($clear);           
        $asignacionesGrupoCLEAR->setActive(true);
        $asignacionesGrupoCLEAR->setFechaCreacion(new \DateTime());


        $camino = $em->getRepository('AppBundle:Camino')->findBy(
            array('grupo' => $grupo)
        );

        $ultimoNodo = $camino[count($camino)-1];
        $idUltimoNodo = $ultimoNodo->getNodo()->getId();
        $estado = $ultimoNodo->getEstado();

        $habilitacionFases = $em->getRepository('AppBundle:HabilitacionFases')->findOneBy(
            array('grupo' => $asignacionesGrupoCLEAR->getGrupo()) 
        );  

        //if según HabilitacionFases alguno en true
        //$habilitacionFases->getMotFormal() || $habilitacionFases->getMotNoFormal() || $habilitacionFases->getIea() || $habilitacionFases->getPi() || $habilitacionFases->getPn()
            
        //die("cantidad ".count($camino));
        
        //PROGRAMACIÓN(1) PARTICIPACIÓN PARA HABILITACIÓN ******** ******** ******** ********
        if ($idUltimoNodo == 1){
            $asignacionesGrupoCLEAR->setHabilitacion(true); 
            self::nodoCamino($idGrupo, 2, 1);//Programación(1) a Clear de Habilitación
        }
        //PROGRAMACIÓN(1) PARTICIPACIÓN PARA ASIGNACIÓN ******** ******** ********  ********      
        elseif($estado == 2 && $idUltimoNodo == 2 && ($habilitacionFases->getMotFormal() || $habilitacionFases->getMotNoFormal())){ // Si el ultimo nodo es 2(Habilitación) y tiene estado 2(Ejecutado) y en HabilitaciónFases permita MOT Formal o MOT no Formal
            $asignacionesGrupoCLEAR->setAsignacion(true);
            if($habilitacionFases->getMotFormal()) 
                self::nodoCamino($idGrupo, 6, 1); //Programación(1) a Clear de Asignación MOT Formal
            else
                self::nodoCamino($idGrupo, 10, 1); //Programación(1) a Clear de Asignación MOT No Formal
        }
        elseif($estado == 2 && ($idUltimoNodo == 3 || $idUltimoNodo == 4 || $idUltimoNodo == 5)) {//Si el último nodo es 3, 4, 5(Visita Previa) y tiene estado 2(Ejecutado)
            $asignacionesGrupoCLEAR->setAsignacion(true);
            if($idUltimoNodo == 3)
                self::nodoCamino($idGrupo, 26, 1); //Programación(1) a Clear de Asignación PN
            elseif($idUltimoNodo == 4)
                self::nodoCamino($idGrupo, 20, 1); //Programación(1) a Clear de Asignación PI
            elseif($idUltimoNodo == 5)
                self::nodoCamino($idGrupo, 14, 1); //Programación(1) a Clear de Asignación IEA
        }
        elseif($estado == 2 && ($idUltimoNodo == 9 || $idUltimoNodo == 13 || $idUltimoNodo == 19 || $idUltimoNodo == 25)) {//Si el último nodo es 9, 13, 19 o 25(Contraloria) y tiene estado 2(Ejecutado)
            $asignacionesGrupoCLEAR->setAsignacion(true);
            if($idUltimoNodo == 9)
                self::nodoCamino($idGrupo, 26, 1); //Programación(1) a Clear de Asignación PN
            elseif($idUltimoNodo == 13)
                self::nodoCamino($idGrupo, 14, 1); //Programación(1) a Clear de Asignación IEA
            elseif($idUltimoNodo == 19){
                self::nodoCamino($idGrupo, 20, 1); //Programación(1) a Clear de Asignación PI
            }
            elseif($idUltimoNodo == 25)
                self::nodoCamino($idGrupo, 26, 1); //Programación(1) a Clear de Asignación PN
        }
        //PROGRAMACIÓN(1) PARTICIPACIÓN PARA CONTRALORÍA ******** ******** ******** ********
        elseif($estado == 2 && ($idUltimoNodo == 8 || $idUltimoNodo == 12 || $idUltimoNodo == 18 || $idUltimoNodo == 24 || $idUltimoNodo == 30)){ //Si el último nodo es 8, 12, 18, 24 o 30 (Legalización Fase) y tiene estado 2(Ejecutado)
            $asignacionesGrupoCLEAR->setContraloriaSocial(true); 
            if($idUltimoNodo == 8)
                self::nodoCamino($idGrupo, 9, 1); //Programación(1) a Clear de Contraloria MOT Formal
            elseif($idUltimoNodo == 12)
                self::nodoCamino($idGrupo, 13, 1); //Programación(1) a Clear de Contraloria MOT No Formal
            elseif($idUltimoNodo == 18)
                self::nodoCamino($idGrupo, 19, 1); //Programación(1) a Clear de Contraloria IEA
            elseif($idUltimoNodo == 24)
                self::nodoCamino($idGrupo, 25, 1); //Programación(1) a Clear de Contraloria PI
            elseif($idUltimoNodo == 30)
                self::nodoCamino($idGrupo, 31, 1); //Programación(1) a Clear de Contraloria PN
        }
        else{
            //No se puede asignar a CLEAR
             $this->addFlash('warning', 'Este grupo no se puede asignar a un CLEAR, favor consulte el mapa de seguimiento.');
             return $this->redirectToRoute('clearGrupo', 
                array(
                    'grupos' => $grupo, 
                    'asignacionesGrupoCLEAR' => $asignacionesGrupoCLEAR,
                    'idCLEAR' => $idCLEAR
                ));   
        }

        
        /*
        $this->addFlash('info',  
                array(
                    'title' => "hola",
                    'message' => "asdfsadf")
                );
        $this->addFlash('warning', 'Mensaje 2');
        $this->addFlash('success', 'Mensaje 3');
        */

        $em->persist($asignacionesGrupoCLEAR);
        $em->flush();

        return $this->redirectToRoute('clearGrupo', 
            array(
                'grupos' => $grupo, 
                'asignacionesGrupoCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));        
        
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/clear/{idCLEAR}/asignacion-grupo/{idAsignacionGrupoCLEAR}/eliminar", name="clearEliminarGrupo")
     */
    public function clearEliminarGrupoAction(Request $request, $idCLEAR, $idAsignacionGrupoCLEAR)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionesGrupoCLEAR = new AsignacionGrupoCLEAR();

        $asignacionesGrupoCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->find($idAsignacionGrupoCLEAR); 

        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );      

        //buscando el ultimo en 1(Programado)
        $camino = $em->getRepository('AppBundle:Camino')->findBy(
            array('grupo' => $asignacionesGrupoCLEAR->getGrupo(), 
                'estado' => '1'
            )
        );
        $ultimoNodo = $camino[count($camino)-1];
        if(count($camino))
            $em->remove($ultimoNodo);
        
        $em->remove($asignacionesGrupoCLEAR);
        $em->flush();

        $clear = $em->getRepository('AppBundle:CLEAR')->findOneBy(
            array('id' => $idCLEAR)
        );

        $asignacionesIntegranteCLEAR = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
            array('clear' => $clear)
        );  

        return $this->redirectToRoute('clearGrupo',
             array(
                'grupos' => $grupos,
                'asignacionesIntegranteCLEAR' => $asignacionesGrupoCLEAR,
                'idCLEAR' => $idCLEAR
            ));    
        
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

    private function operacionesInstalacionClear(){

    }

    private function operacionesLegalizacionClear($clear){
        $em = $this->getDoctrine()->getManager();

        $asignacionGruposClear = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
            array('clear' => $clear) 
        );  

        foreach ($asignacionGruposClear as $asignacionGrupoClear){  //Bucle de operaciones a realizar por cada grupo asignado al CLEAR
        
            $camino = $em->getRepository('AppBundle:Camino')->findBy(
                array('grupo' => $asignacionGrupoClear->getGrupo())
            );

            $ultimoNodo = $camino[count($camino)-1];
            $idUltimoNodo = $ultimoNodo->getNodo()->getId();
            $estado = $ultimoNodo->getEstado();

            //CIERRE DE CREE : EJECUCIÓN O RECHAZO(Estados 2 o 3)  ******** ******** (CREE - Comité Regional de Evaluación de Elegibilidad)
            if ($idUltimoNodo == 2){
                
                $habilitacionFases = $em->getRepository('AppBundle:HabilitacionFases')->findOneBy(
                    array('grupo' => $asignacionGrupoClear->getGrupo()) 
                );
                //if según HabilitacionFases alguno en true
                if($habilitacionFases != null){
                    
                    echo "hola ".$idUltimoNodo;

                    if($asignacionGrupoClear->getGrupo()->getCodigo() == null){
                        $asignacionGrupoClear->getGrupo()->setFechaInscripcion(new \DateTime());
                        self::creacionCodigoGrupo($asignacionGrupoClear->getGrupo()->getId());
                    }
                    

                    if($idUltimoNodo == 2)
                        self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 2, 2);//Ejecutada(2) Clear de Habilitación
                    
                    if($habilitacionFases->getIea())
                        self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 5, 1);//Programación(1) a Visita previa IEA
                    if($habilitacionFases->getPn())
                        self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 3, 1);//Programación(1) a Visita previa PN                    
                }
                else{
                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 2, 3);//Rechazado(3) Clear de Habilitación                    
                }
                    
            }
            //CIERRE DE CLEAR DE EVALUACIÓN (ANTERIORMENTE LLAMADO CLEAR ASIGNACIÓN)
            elseif($idUltimoNodo == 6 || $idUltimoNodo == 10){

                    //Evaluar "Evaluación de Fase para definir el color", mientras tanto:
                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), $idUltimoNodo, 2);//En verde temporalmente a todos mientras se evalua la fase

                    //AGREGAR LA CONDICION DE NODO EN 3 SI NO SE HABILITA PARA LA FASE!!! según evaluacionFases


                    /*if($idUltimoNodo == 6)
                        self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 6, 2);//Ejecutada(2) Clear de Asignación MOT Formal

                    if($idUltimoNodo == 10)
                        self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 10, 2);//Ejecutada(2) Clear de Asignación MOT No Formal
                    */
            }
            else{//PROGRAMACIÓN GENÉRICA DE CONTRALORÍA O ASIGNACIÓN
                self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), $idUltimoNodo, 2);
            }
        }
    }

    private function creacionCodigoGrupo($idGrupo){          

            $em = $this->getDoctrine()->getManager();

            $traerGrupo = $em->getRepository('AppBundle:Grupo')->find($idGrupo);            

            $idMunicipio = $em->getRepository('AppBundle:Municipio')->findOneBy(
                array('id' => $traerGrupo->getMunicipio()));            

            $zona = $idMunicipio->getZona()->getAbreviatura();            

            if($traerGrupo->getId()<10){
                $consecutivo = "00";
            }

            if($traerGrupo->getId() >= 10 && $traerGrupo->getId() < 100){
                $consecutivo = "0";
            }

            if($traerGrupo->getId() >= 100){
                $consecutivo = "";
            }          

            $tipoGrupo = $traerGrupo->getTipo();       

            if($tipoGrupo == "No Formal Sin Negocio"){
                $tipo = "1";                
            }

            if($tipoGrupo == "No Formal Con Negocio"){
                $tipo = "2";                
            }

            if($tipoGrupo == "Formal Sin Negocio"){
                $tipo = "3";                
            }

            if($tipoGrupo == "Formal con negocio"){
                $tipo = "4";                
            }

            $traerGrupo->setCodigo($zona."-".$idMunicipio->getAbreviatura()."-".$tipo."-".date_format($traerGrupo->getFechaInscripcion(), 'Y/m')."-".$consecutivo.$traerGrupo->getId());  
    }
}