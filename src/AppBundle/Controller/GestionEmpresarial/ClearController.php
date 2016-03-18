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


use AppBundle\Form\GestionEmpresarial\CLEARType;
use AppBundle\Form\GestionEmpresarial\ClearSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolBeneficiarioType;


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

                //if($clearSoporte->getDescripcion()=="Acta final Clear"){ //Despúes de subir el Acta final del CLEAR toma lo que esté almacenado en habilitacionFases de cada grupo para asignar un nodo Ejecutado o un nodo Rechazado


                if(true){

                    //echo "entra";

                    $asignacionGruposClear = $em->getRepository('AppBundle:AsignacionGrupoCLEAR')->findBy(
                        array('clear' => $clear) 
                    );  

                    foreach ($asignacionGruposClear as $asignacionGrupoClear){
                    
                        $habilitacionFases = $em->getRepository('AppBundle:HabilitacionFases')->findOneBy(
                            array('grupo' => $asignacionGrupoClear->getGrupo()) 
                        );

                        $camino = $em->getRepository('AppBundle:Camino')->findBy(
                            array('grupo' => $asignacionGrupoClear->getGrupo())
                        );

                        $ultimoNodo = $camino[count($camino)-1];
                        $idUltimoNodo = $ultimoNodo->getNodo()->getId();
                        $estado = $ultimoNodo->getEstado();

                        //EJECUCIÓN O RECHAZO(2 o 3) CIERRE DE CLEAR HABILITACIÓN ******** ******** ******** ********
                        if ($idUltimoNodo == 2 || $idUltimoNodo == 6 || $idUltimoNodo == 10){
                            //if según HabilitacionFases alguno en true
                            if($habilitacionFases->getMotFormal() || $habilitacionFases->getMotNoFormal() || $habilitacionFases->getIea() || $habilitacionFases->getPi() || $habilitacionFases->getPn()){
                                
                                echo "hola ".$idUltimoNodo;

                                if($idUltimoNodo == 2)
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 2, 2);//Ejecutada(2) Clear de Habilitación
                                
                                if($idUltimoNodo == 6)
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 6, 2);//Ejecutada(2) Clear de Habilitación

                                if($idUltimoNodo == 10)
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 10, 2);//Ejecutada(2) Clear de Habilitación


                                if($habilitacionFases->getIea())
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 5, 1);//Programación(1) a Visita previa IEA
                                if($habilitacionFases->getPi())
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 4, 1);//Programación(1) a Visita previa PI
                                if($habilitacionFases->getPn())
                                    self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 3, 1);//Programación(1) a Visita previa PN
                            }
                            else
                                self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), 2, 3);//Rechazado(3) Clear de Habilitación
                        }
                        else{//PROGRAMACIÓN GENÉRICA DE CONTRALORÍA O ASIGNACIÓN
                            self::nodoCamino($asignacionGrupoClear->getGrupo()->getId(), $idUltimoNodo, 2);
                        }

                    }

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

}