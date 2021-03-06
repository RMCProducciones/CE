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
use AppBundle\Entity\Beneficiario;
use AppBundle\Entity\Camino;
use AppBundle\Entity\HabilitacionFases;
use AppBundle\Entity\DiagnosticoOrganizacional;
use AppBundle\Entity\Nodo; 
use AppBundle\Entity\SeguimientoMOT;
use AppBundle\Entity\SeguimientoFase;
use AppBundle\Entity\Visita;
use AppBundle\Entity\EvaluacionFases;
use AppBundle\Entity\AsignacionBeneficiarioComiteCompras;
use AppBundle\Entity\AsignacionBeneficiarioComiteVamosBien;
use AppBundle\Entity\AsignacionBeneficiarioEstructuraOrganizacional;
use AppBundle\Entity\AsignacionContadorGrupo;
use AppBundle\Entity\AsignacionBeneficiarioVisitas;
use AppBundle\Entity\SeguimientoGrupoSoporte;
use AppBundle\Entity\VisitaSoporte;

use AppBundle\Form\GestionEmpresarial\HabilitacionFasesType;
use AppBundle\Form\GestionEmpresarial\SeguimientoMOTType;
use AppBundle\Form\GestionEmpresarial\SeguimientoFaseType;
use AppBundle\Form\GestionEmpresarial\VisitaType;
use AppBundle\Form\GestionEmpresarial\DiagnosticoOrganizacionalType;
use AppBundle\Form\GestionEmpresarial\EvaluacionFasesSoporteType;
use AppBundle\Form\GestionEmpresarial\EvaluacionFasesType;
use AppBundle\Form\GestionEmpresarial\VisitaFilterType;
use AppBundle\Form\GestionEmpresarial\VisitaSoporteType;
use AppBundle\Form\GestionEmpresarial\SeguimientoGrupoSoporteType;


use AppBundle\Utilities\Acceso;
use AppBundle\Utilities\FilterLocation;


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

        $taller = $em->getRepository('AppBundle:Taller')->findBy(          
            array('grupo' => $grupo)
        );

        $cerrarTalleres = 0;

        if(sizeof($taller) > 0){
            $cerrarTalleres = 1;
        }
        
        
       // die();

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:grupo-seguimiento.html.twig', 
            array( 'grupo' => $grupo, 
                   'camino' => $camino,
                   'cerrarTalleres' => $cerrarTalleres));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/habilitacion-fase", name="habilitacionFases")
     */
    public function habilitacionFasesAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $validacion = array(12);

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $habilitacionFases = $em->getRepository('AppBundle:HabilitacionFases')->findOneBy(
            array('grupo' => $grupo)
        );

        if(!$habilitacionFases)
            $habilitacionFases = new HabilitacionFases(); 

        //Validar si el CLEAR aun está abierto para crear o editar el formulario de habilitación, sino solo visualización
            
        $nodoCREE =  $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => '2')
        );

        $nodosCaminoCREE = $em->getRepository('AppBundle:Camino')->findBy(
            array('grupo' => $grupo, 'nodo' => $nodoCREE)
        );
 
        $nodoCaminoCREE = $nodosCaminoCREE[count($nodosCaminoCREE)-1];
   
        $clearFinalizado = false;
        if($nodoCaminoCREE->getEstado()==2 || $nodoCaminoCREE->getEstado()==3) //Si se encuentra un nodoCREE en estados 2 o 3 se determina que el CLEAR está cerrado
            $clearFinalizado = true;
            
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

            $habilitacionFases->setActive(true);
            $habilitacionFases->setFechaCreacion(new \DateTime());

            $em->persist($habilitacionFases);
            $em->flush();

            return $this->redirectToRoute('seguimientoGrupo', array( 'idGrupo' => $idGrupo));
        }


        $validacion[0] = true;
        $validacion[1] = true;
        $validacion[2] = true;
        

        //Validar acta de interes del grupo
        $validacion[3] = true;
        
        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'AI'
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[3] = false;
        }
//        echo "<pre>";
//        print_r($elementos);
//        echo "</pre>";


        $validacion[4] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'FRB'
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[4] = false;
        }

        $validacion[5] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CB'                
                AND grupo.entidad_financiera_cuenta IS NOT NULL
                AND grupo.tipo_cuenta IS NOT NULL
                AND grupo.numero_cuenta IS NOT NULL                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[5] = false;
        }

        $validacion[6] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CC'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[6] = false;
        }

        $validacion[7] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'
                AND grupo.numero_identificacion_tributaria IS NOT NULL
                AND grupo.numero_identificacion_tributaria != '0-0'
                AND documento_soporte.abreviatura = 'RUTG'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[7] = false;
        }

        $validacion[8] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'                
                AND documento_soporte.abreviatura = 'DRAA'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[8] = false;
        }

        $validacion[9] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'                
                AND documento_soporte.abreviatura = 'BGER'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[9] = false;
        }

        $validacion[10] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'                
                AND documento_soporte.abreviatura = 'ADGP'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[10] = false;
        }

        $validacion[11] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:GrupoSoporte grupo_soporte WITH grupo.id = grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH grupo_soporte.tipo_soporte = documento_soporte.id
            WHERE 
                grupo_soporte.active = 1
                AND documento_soporte.dominio = 'grupo_tipo_soporte'                
                AND documento_soporte.abreviatura = 'AFGC'                
                AND grupo.id = :idGrupo
        ");

        $query->setParameter('idGrupo', $idGrupo);

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[11] = false;
        }

        //$validacion[12] = true;
        //$validacion[13] = true;




        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:habilitacion-fases.html.twig', 
            array(
                    'form' => $form->createView(),
                    'grupo' => $grupo,
                    'validacion' => $validacion,
                    'clearFinalizado' => $clearFinalizado,
                    'habilitacionFases' => $habilitacionFases,
                    'query' => $query
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/inicio-mot/visualizar", name="seguimientoMotVisualizar")
     */
    public function seguimientoMotVisualizarAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();        

        $seguimientoMot = $em->getRepository('AppBundle:SeguimientoMOT')->findOneBy(
            array('grupo'=> $idGrupo)
        );
              
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-mot-visualizar.html.twig',
            array('seguimientoMot' => $seguimientoMot,
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
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/inicio-fase/visualizar", name="seguimientofaseVisualizar")
     */
    public function seguimientofaseVisualizarAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();        

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id'=>$idNodo)
        );        

        $fase = $nodo->getFase();

        $seguimientoFase = $em->getRepository('AppBundle:SeguimientoFase')->findOneBy(
            array('grupo'=> $idGrupo,
                  'fase' => $fase)
        );
              
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:seguimiento-fase-visualizar.html.twig',
            array('seguimientoFase' => $seguimientoFase,
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

        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $evaluacionFases = $em->getRepository('AppBundle:EvaluacionFases')->findOneBy(
            array('grupo' => $grupo)
        );

        if($idNodo == 6) //MOT
            self::nodoCamino($idGrupo, 7, 1);
        elseif ($idNodo == 10) { //MOT
            self::nodoCamino($idGrupo, 11, 1);
        }
        elseif ($idNodo == 26 && $evaluacionFases->getAptoPn()){
            self::nodoCamino($idGrupo, 27, 1);
        } 
        elseif ($idNodo == 20 && $evaluacionFases->getAptoPi()){
            self::nodoCamino($idGrupo, 21, 1);
        }
        elseif ($idNodo == 14 && $evaluacionFases->getAptoIea()) {
            self::nodoCamino($idGrupo, 15, 1);
        }
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/{idVisita}/nuevo", name="visitaNuevo")
     */
    public function visitaNuevoAction(Request $request, $idGrupo, $idNodo, $idVisita)
    {
        $em = $this->getDoctrine()->getManager();

        $visita= $em->getRepository('AppBundle:Visita')->findOneBy(
            array('id' => $idVisita));        
        
        $nodo= $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo));   

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
            $visita->setActive(true);
            $visita->setFechaCreacion(new \DateTime());      
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array('id' => $idUsuario));
            $visita->setUsuarioCreacion($usuario);     
            
            $em->persist($visita);
            $em->flush();

            if($visita->getInterventoria() == 1)
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
                                        'idGrupo' => $idGrupo,
                                        'visita' => $visita
                                    )
                            );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/comprobar", name="comprobarVisita")
     */
    public function comprobarVisitaAction(Request $request, $idGrupo, $idNodo)
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

        $comiteComprasGrupo = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->findBy(
            array('grupo' => $idGrupo)
        );
        
        $comiteVamosBienGrupo = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $idGrupo)
        );

        $contadorGrupo = $em->getRepository('AppBundle:AsignacionContadorGrupo')->findBy(
            array('grupo' => $idGrupo)
        );

        $form = $this->createForm(new VisitaType(), $visita);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $visita = $form->getData();

            if(sizeof($comiteComprasGrupo) != 0){
                $visita->setComiteCompras(true);                                            
            }
            
            if(sizeof($comiteVamosBienGrupo) >= 3){
                $visita->setComiteVamosBien(true);                                            
            }

            if(sizeof($contadorGrupo) != 0){
                $visita->setContador(true);                                            
            }

            $visita->setGrupo($grupo);
            $visita->setSeguimientoFase($seguimientoFase);
            $visita->setNodo($nodo);
            $visita->setActive(true);
            $visita->setFechaCreacion(new \DateTime());

            $usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $visita->setUsuarioCreacion($usuarioCreacion);
            
        
            $em->persist($visita);
            $em->flush();

            $idVisita = $visita->getId();

            return $this->redirect(
                $this->generateUrl(
                    'visitaNuevo', 
                    array(
                        'idGrupo' => $idGrupo,
                        'idNodo' => $idNodo,
                        'idVisita' => $idVisita
                    )
                )
            );  

     
        }

        $visita = $form->getData();

            if(sizeof($comiteComprasGrupo) != 0){
                $visita->setComiteCompras(true);                                            
            }
            
            if(sizeof($comiteVamosBienGrupo) >= 3){
                $visita->setComiteVamosBien(true);                                            
            }

            if(sizeof($contadorGrupo) != 0){
                $visita->setContador(true);                                            
            }

            $visita->setGrupo($grupo);
            $visita->setSeguimientoFase($seguimientoFase);
            $visita->setNodo($nodo);
            $visita->setActive(true);
            $visita->setFechaCreacion(new \DateTime());

            $usuarioCreacion = $em->getRepository('AppBundle:Usuario')->findOneBy(
                array(
                    'id' => 1
                )
            );
            
            $visita->setUsuarioCreacion($usuarioCreacion);
            
        
            $em->persist($visita);
            $em->flush();

            $idVisita = $visita->getId();
        
        return $this->redirect(
                $this->generateUrl(
                    'visitaNuevo', 
                    array(
                        'idGrupo' => $idGrupo,
                        'idNodo' => $idNodo,
                        'idVisita' => $idVisita
                    )
                )
            );  
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/visualizar", name="visitaVisualizar")
     */
    public function visualizarVisitaAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();        

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

        $visita = $em->getRepository('AppBundle:Visita')->findOneBy(
            array('grupo' => $idGrupo,
                  'nodo' => $idNodo)
        );
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:visita-visualizar.html.twig',
                                array('idGrupo' => $idGrupo,
                                      'visita' => $visita
                                    )
                            );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/beneficiarios-asignacion", name="beneficiarioVisitasNuevo")
     */
    public function beneficiariosVisitaAction(Request $request, $idGrupo, $idNodo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );

        $asignacionesBeneficiariosVisitas = $em->getRepository('AppBundle:AsignacionBeneficiarioVisitas')->findBy(
            array('grupo' => $grupo,
                  'nodo' => $nodo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioVisitas abv WHERE beneficiario = abv.beneficiario AND abv.nodo = :nodo) AND b.active = 1');
        $query->setParameter(':nodo', $nodo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Beneficiario')
            ->createQueryBuilder('q');

        $form = $this->get('form.factory')->create(new VisitaFilterType());

        if ($request->query->has($form->getName())) {
            
            $form->submit($request->query->get($form->getName()));
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $filterBuilder->andwhere('q.grupo = :idGrupo')
        ->setParameter('idGrupo', $idGrupo)
        ->andWhere('q.active = 1')
        ->andWhere('q.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioVisitas abv WHERE beneficiario = abv.beneficiario AND abv.nodo = :nodo)')
        ->setParameter(':nodo', $nodo);

        $query = $filterBuilder->getQuery();

        $paginator1  = $this->get('knp_paginator');

        $pagination1 = $paginator1->paginate(
            $query, /* fuente de los datos*/
            $request->query->get('page', 1)/*número de página*/,
            5/*límite de resultados por página*/
        );


        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:beneficiario-visita-asignacion.html.twig', 
            array(
                'form' => $form->createView(),
                'beneficiarios' => $query,
                'asignacionesBeneficiariosVisitas' => $asignacionesBeneficiariosVisitas,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo,
                'idNodo' => $idNodo,
                'pagination1' => $pagination1
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/beneficiarios-asignacion/{idBeneficiario}/nueva-asignacion", name="beneficiarioVisitasAsignar")
     */
    public function beneficiariosAsignarVisitaAction($idGrupo, $idNodo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        ); 

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );       
           
        $asignacionBeneficiarioVisitas = new AsignacionBeneficiarioVisitas();

        $asignacionBeneficiarioVisitas->setGrupo($grupo);        
        $asignacionBeneficiarioVisitas->setBeneficiario($beneficiario);
        $asignacionBeneficiarioVisitas->setNodo($nodo);
        $asignacionBeneficiarioVisitas->setActive(true);
        $asignacionBeneficiarioVisitas->setFechaCreacion(new \DateTime());
        $asignacionBeneficiarioVisitas->setUsuarioCreacion($usuario);


        $em->persist($asignacionBeneficiarioVisitas);
        $em->flush();



        return $this->redirectToRoute('beneficiarioVisitasNuevo', 
            array(
                'beneficiario' => $beneficiario,          
                'AsignacionBeneficiarioVisitas' => $asignacionBeneficiarioVisitas,                
                'idGrupo' => $idGrupo,
                'idNodo' => $idNodo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/beneficiarios-asignacion/{idAsignacionBeneficiariosVisita}/eliminar", name="beneficiarioVisitasEliminar")
     */
    public function beneficiariosEliminarVisitaAction($idGrupo, $idNodo, $idAsignacionBeneficiariosVisita)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioVisitas = new AsignacionBeneficiarioVisitas();

        $asignacionBeneficiarioVisitas = $em->getRepository('AppBundle:AsignacionBeneficiarioVisitas')->find($idAsignacionBeneficiariosVisita); 

        $em->remove($asignacionBeneficiarioVisitas);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosVisitas = $em->getRepository('AppBundle:AsignacionBeneficiarioVisitas')->findBy(
            array('grupo' => $grupo,
                  'nodo' => $nodo)
        ); 

        return $this->redirectToRoute('beneficiarioVisitasNuevo', 
            array(
                'beneficiario' => $beneficiarios,          
                'AsignacionBeneficiarioVisitas' => $asignacionBeneficiarioVisitas,                
                'idGrupo' => $idGrupo,
                'idNodo' => $idNodo
            ));        
        
    } 

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/evaluacion-fase/{clearFinalizado}", name="evaluacionFase")
     */
    public function evaluacionFaseAction(Request $request, $idGrupo, $idNodo, $clearFinalizado)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $evaluacionFases = $em->getRepository('AppBundle:EvaluacionFases')->findOneBy(
            array('grupo' => $grupo)
        );

        if(!$evaluacionFases)
            $evaluacionFases= new EvaluacionFases();
        
        $form = $this->createForm(new EvaluacionFasesType(), $evaluacionFases);
        
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
            $evaluacionFases = $form->getData();

            $evaluacionFases->setGrupo($grupo);

            $evaluacionFases->setActive(true);
            $evaluacionFases->setFechaCreacion(new \DateTime());
            $em->persist($evaluacionFases);
            $em->flush();

            return $this->redirectToRoute('seguimientoGrupo', 
                array('idGrupo' => $idGrupo));

        }

        $validacion = array(12);

        $validacion[0] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'FE'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 14
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[0] = false;
        }

        $validacion[1] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'FE'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 20
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[1] = false;
        }

        $validacion[2] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'FE'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 26
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[2] = false;
        }

        $validacion[3] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CAC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 14
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[3] = false;
        }

        $validacion[4] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CAC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 20
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[4] = false;
        }

        $validacion[5] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CAC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 26
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[5] = false;
        }


        $validacion[6] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CA'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 14
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[6] = false;
        }

        $validacion[7] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CA'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 20
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[7] = false;
        }

        $validacion[8] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'CA'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 26
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[8] = false;
        }


        $validacion[9] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'PC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 14
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[9] = false;
        }

        $validacion[10] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'PC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 20
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[10] = false;
        }

        $validacion[11] = true;

        $query = $em->createQuery("
            SELECT 
                grupo.nombre,
                documento_soporte.descripcion,
                seguimiento_grupo_soporte.path
            FROM AppBundle:Grupo grupo
            INNER JOIN AppBundle:SeguimientoGrupoSoporte seguimiento_grupo_soporte WITH grupo.id = seguimiento_grupo_soporte.grupo
            INNER JOIN AppBundle:DocumentoSoporte documento_soporte WITH seguimiento_grupo_soporte.tipo_soporte = documento_soporte.id
            INNER JOIN AppBundle:Nodo nodo WITH seguimiento_grupo_soporte.nodo = nodo.id
            WHERE 
                seguimiento_grupo_soporte.active = 1
                AND documento_soporte.dominio = 'seguimiento_grupo_tipo_soporte'
                AND documento_soporte.abreviatura = 'PC'                                
                AND grupo.id = :idGrupo
                AND seguimiento_grupo_soporte.nodo = 26
        ");

        $query->setParameter('idGrupo', $idGrupo);                   

        $elementos = $query->getResult();

        //echo "<pre>";
        //print_r($elementos);
        //echo "</pre>";

        //echo sizeof($elementos); 

        if (sizeof($elementos) == 0) {
            $validacion[11] = false;
        }



            
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:evaluacion-fases.html.twig', 
            array(
                    'form' => $form->createView(),
                    'grupo' => $grupo,
                    'clearFinalizado' => $clearFinalizado,
                    'evaluacionFases' => $evaluacionFases,
                    'idNodo' => $idNodo,
                    'validacion' => $validacion
            )
        );
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/evaluacionfase/{idEvaluacionFase}/documentos-soporte", name="evaluacionFasesSoporte")
     */
    public function evaluacionFasesSoporteAction(Request $request, $idEvaluacionFases)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $evaluacionfasesSoporte = new EvaluacionFasesSoporte();
        
        $form = $this->createForm(new EvaluacionFasesSoporteType(), $evaluacionfasesSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:EvaluacionFasesSoporte')->findBy(
            array('active' => '1', 'evaluacionfase' => $idEvaluacionsFase),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:EvaluacionFasesSoporte')->findBy(
            array('active' => '0', 'evaluacionfase' => $idEvaluacionFases),
            array('fecha_creacion' => 'ASC')
        );
        
        $evaluacionfases = $em->getRepository('AppBundle:EvaluacionFases')->findOneBy(
            array('id' => $idEvaluacionFases)
        );
        
        //echo ($idEvaluacionFase);
        //print_r($evaluacionfase);

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $evaluacionfasesSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarEvaluacionFasesSoportes = $em->getRepository('AppBundle:EvaluacionFasesSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'evaluacionfase' => $idEvaluacionFases,
                    )
                );  
            
                foreach ($actualizarEvaluacionFasesSoportes as $actualizarEvaluacionFasesSoporte){
                    echo $actualizarEvaluacionFasesSoporte->getId()." ".$actualizarEvaluacionFasesSoporte->getTipoSoporte()."<br />";
                    $actualizarEvaluacionFasesSoporte->setFechaModificacion(new \DateTime());
                    $actualizarEvaluacionFasesSoporte->setActive(0);
                    $actualizarEvaluacionFasesSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }
                
                $evaluacionfasesSoporte->setEvaluacionFase($evaluacionfases);
                $evaluacionfasesSoporte->setActive(true);
                $evaluacionfasesSoporte->setFechaCreacion(new \DateTime());
                $evaluacionfasesSoporte->setUsuarioCreacion($usuario);

                $em->persist($evaluacionfasesSoporte);
                $em->flush();

                return $this->redirectToRoute('evaluacionfasesSoporte', array( 'idEvaluacionFases' => $idEvaluacionFases));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:evaluacion-fases-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/evaluacionfase/{idEvaluacionFase}/documentos-soporte/{idEvaluacionFaseSoporte}/borrar", name="evaluacionfaseSoporteBorrar")
     */
    public function evaluacionfaseSoporteBorrarAction(Request $request, $idEvaluacionFase, $idEvaluacionFaseSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $evaluacionfaseSoporte = new EvaluacionFaseSoporte();
        
        $evaluacionfaseSoporte = $em->getRepository('AppBundle:EvaluacionFaseSoporte')->findOneBy(
            array('id' => $idEvaluacionFaseSoporte)
        );
        
        $evaluacionfaseSoporte->setFechaModificacion(new \DateTime());
        $evaluacionfaseSoporte->setActive(0);
        $evaluacionfaseSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('evaluacionfaseSoporte', array( 'idEvaluacionFase' => $idEvaluacionFase));
        
    }

    /**    
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/documentos-soporte", name="seguimientoGrupoSoporte")
     */
    public function seguimientoGrupoSoporteAction(Request $request, $idGrupo, $idNodo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $grupoSoporte = new SeguimientoGrupoSoporte();

        $evaluacionFaseGrupo = $em->getRepository('AppBundle:EvaluacionFases')->findOneBy(
            array('grupo' => $idGrupo)
        );

        $caminos = $em->getRepository('AppBundle:Camino')->findBy(
                array('grupo' => $idGrupo,
                      'nodo' => $idNodo)
            );

        $form = $this->createForm(new SeguimientoGrupoSoporteType(), $grupoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:SeguimientoGrupoSoporte')->findBy(
            array('active' => '1', 'grupo' => $idGrupo, 'nodo' => $idNodo),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:SeguimientoGrupoSoporte')->findBy(
            array('active' => '0', 'grupo' => $idGrupo, 'nodo' => $idNodo),
            array('fecha_creacion' => 'ASC')
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {


                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(

                    array(
                        'descripcion' => $grupoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'seguimiento_grupo_tipo_soporte'
                    )
                );

            
                $actualizarGrupoSoportes = $em->getRepository('AppBundle:SeguimientoGrupoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'grupo' => $idGrupo,
                        'nodo' => $idNodo
                    )
                );  
            
                foreach ($actualizarGrupoSoportes as $actualizarGrupoSoporte){
                    echo $actualizarGrupoSoporte->getId()." ".$actualizarGrupoSoporte->getTipoSoporte()."<br />";
                    $actualizarGrupoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarGrupoSoporte->setActive(0);
                    $actualizarGrupoSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }

                $grupoSoporte->setGrupo($grupo);
                $grupoSoporte->setNodo($nodo);
                $grupoSoporte->setActive(true);
                $grupoSoporte->setFechaCreacion(new \DateTime());
                $grupoSoporte->setUsuarioCreacion($usuario);


                $em->persist($grupoSoporte);

                $em->flush();

                return $this->redirectToRoute('seguimientoGrupoSoporte', array( 'idGrupo' => $idGrupo, 'idNodo' => $idNodo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:grupo-seguimiento-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'grupo' => $grupo,
                'idGrupo' => $idGrupo,
                'idNodo' => $idNodo,
                'evaluacionFaseGrupo' => $evaluacionFaseGrupo,
                'caminos' => $caminos
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/documentos-soporte/{idGrupoSoporte}/borrar", name="seguimientoGrupoSoporteBorrar")
     */
    public function seguimientoGrupoSoporteBorrarAction(Request $request, $idGrupo, $idNodo, $idGrupoSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $grupoSoporte = new SeguimientoGrupoSoporte();
        
        $grupoSoporte = $em->getRepository('AppBundle:SeguimientoGrupoSoporte')->findOneBy(
            array('id' => $idGrupoSoporte)
        );
        
        $grupoSoporte->setFechaModificacion(new \DateTime());
        $grupoSoporte->setActive(0);
        $grupoSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('seguimientoGrupoSoporte', array( 'idGrupo' => $idGrupo, 'idNodo' => $idNodo));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/documentos-soporte/{idGrupoSoporte}/descargar", name="seguimientoGrupoSoporteRecuperarArchivo")
     */
    public function seguimientoGrupoSoporteDescargarAction(Request $request, $idGrupo, $idNodo, $idGrupoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:SeguimientoGrupoSoporte')->findOneBy(
            array('id' => $idGrupoSoporte, 'nodo' => $idNodo));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename=".$path->getPath()."");
        header ("Content-Type: application/octet-stream");
        header ("Content-Length: ".filesize($link));
        readfile($link);           

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/documento-soporte", name="visitaSoporte")
     */
    public function visitaSoporteAction(Request $request, $idGrupo, $idNodo)
    {

        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $visitaSoporte = new VisitaSoporte();

        $visita = $em->getRepository('AppBundle:Visita')->findOneBy(
            array('grupo' => $idGrupo)
        );

        $caminos = $em->getRepository('AppBundle:Camino')->findBy(
                array('grupo' => $idGrupo,
                      'nodo' => $idNodo)
            );

        $form = $this->createForm(new VisitaSoporteType(), $visitaSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:VisitaSoporte')->findBy(
            array('active' => '1', 'grupo' => $idGrupo, 'nodo' => $idNodo),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:VisitaSoporte')->findBy(
            array('active' => '0', 'grupo' => $idGrupo, 'nodo' => $idNodo),
            array('fecha_creacion' => 'ASC')
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nodo = $em->getRepository('AppBundle:Nodo')->findOneBy(
            array('id' => $idNodo)
        );

        
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {


                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(

                    array(
                        'descripcion' => $visitaSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'visita_tipo_soporte'
                    )
                );

            
                $actualizarGrupoSoportes = $em->getRepository('AppBundle:VisitaSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'grupo' => $idGrupo,
                        'nodo' => $idNodo
                    )
                );  
            
                foreach ($actualizarGrupoSoportes as $actualizarGrupoSoporte){
                    echo $actualizarGrupoSoporte->getId()." ".$actualizarGrupoSoporte->getTipoSoporte()."<br />";
                    $actualizarGrupoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarGrupoSoporte->setActive(0);
                    $actualizarGrupoSoporte->setUsuarioModificacion($usuario);
                    $em->flush();
                }

                $visitaSoporte->setGrupo($grupo);
                $visitaSoporte->setNodo($nodo);
                $visitaSoporte->setActive(true);
                $visitaSoporte->setFechaCreacion(new \DateTime());
                $visitaSoporte->setUsuarioCreacion($usuario);

                if($visitaSoporte->getTipoSoporte()->getDescripcion()=="Documento de aprobación de interventoria"){ 
                        self::nodoCamino($idGrupo, $idNodo, 2);
                        self::nodoCamino($idGrupo, $idNodo+1, 1);
                }

                if($visitaSoporte->getTipoSoporte()->getDescripcion()=="Documento de rechazo de interventoria"){ 
                        self::nodoCamino($idGrupo, $idNodo, 3);                        
                }

                $em->persist($visitaSoporte);

                $em->flush();

                return $this->redirectToRoute('visitaSoporte', array( 'idGrupo' => $idGrupo, 'idNodo' => $idNodo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/SeguimientoGrupo:visita-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'grupo' => $grupo,
                'idGrupo' => $idGrupo,
                'idNodo' => $idNodo,
                'visita' => $visita,
                'caminos' => $caminos
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/documento-soporte/{idVisitaSoporte}/borrar", name="visitaSoporteBorrar")
     */
    public function visitaSoporteBorrarAction(Request $request, $idGrupo, $idNodo, $idVisitaSoporte)
    {
        new Acceso($this->getUser(), ["ROLE_PROMOTOR", "ROLE_COORDINADOR", "ROLE_USER"]);

        $em = $this->getDoctrine()->getManager();

        $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();

        $usuario = $em->getRepository('AppBundle:Usuario')->findOneBy(
            array('id' => $idUsuario));

        $visitaSoporte = new VisitaSoporte();
        echo "asklñjdaljkñasdkjñdas";
        $visitaSoporte = $em->getRepository('AppBundle:VisitaSoporte')->findOneBy(
            array('id' => $idVisitaSoporte)
        );
        
        $visitaSoporte->setFechaModificacion(new \DateTime());
        $visitaSoporte->setActive(0);
        $visitaSoporte->setUsuarioModificacion($usuario);
        $em->flush();

        return $this->redirectToRoute('visitaSoporte', array( 'idGrupo' => $idGrupo, 'idNodo' => $idNodo));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/seguimiento/{idNodo}/visita/{idVisitaSoporte}/documento-soporte/descargar", name="visitaSoporteDescargar")
     */
    public function visitaSoporteDescargarAction(Request $request, $idGrupo, $idNodo, $idVisitaSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $path = $em->getRepository('AppBundle:VisitaSoporte')->findOneBy(
            array('id' => $idVisitaSoporte, 'nodo' => $idNodo));

        $link = '..\uploads\documents\\'.$path->getPath();

        header("Content-Disposition: attachment; filename=".$path->getPath()."");
        header ("Content-Type: application/octet-stream");
        header ("Content-Length: ".filesize($link));
        readfile($link);           

    }

}