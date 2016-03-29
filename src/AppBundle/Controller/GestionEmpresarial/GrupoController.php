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
use AppBundle\Entity\AsignacionBeneficiarioComiteVamosBien;
use AppBundle\Entity\AsignacionBeneficiarioComiteCompras;
use AppBundle\Entity\AsignacionBeneficiarioEstructuraOrganizacional; 
use AppBundle\Entity\GrupoSoporte;
use AppBundle\Entity\Camino;
use AppBundle\Entity\Nodo;


use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolBeneficiarioType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GrupoController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/gestion", name="grupoGestion")
     */
    public function grupoGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $grupos = $em->getRepository('AppBundle:Grupo')->findBy(
            array('active' => '1'),
            array('fecha_creacion' => 'ASC')
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-gestion.html.twig', array( 'grupos' => $grupos));
    }

     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/nuevo", name="grupoNuevo")
     */
    public function grupoNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();
        
        $form = $this->createForm(new GrupoType(), $grupo);
        
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
            
            $grupo = $form->getData();

            if($grupo->getRural() == true){             
                $grupo->setBarrio(null);
            }
            else
            {
                $grupo->setCorregimiento(null);
                $grupo->setVereda(null);
                $grupo->setCacerio(null);
            }

            if($grupo->getTipo()->getDescripcion() != 'Formal con negocio'||$grupo->getTipo()->getDescripcion() != 'Formal Sin Negocio'){
   
             
                     
            }  

            $grupo->setActive(true);
            $grupo->setFechaCreacion(new \DateTime());


            //SEGUIMIENTO, Entidad Camino

           
            $em->persist($grupo);
            $em->flush();

            $idGrupo=$grupo->getId();            

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

            //$traerGrupo->setCodigo($zona."-".$idMunicipio->getAbreviatura()."-".$tipo."-".date_format($traerGrupo->getFechaInscripcion(), 'Y/m')."-".$consecutivo.$traerGrupo->getId());

            self::nodoCamino($idGrupo, 1, 2);
            
            $em->flush();

            return $this->redirectToRoute('grupoGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-nuevo.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/editar", name="grupoEditar")
     */
    public function grupoEditarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $nit = explode("-", $grupo->getNumeroIdentificacionTributaria());

        $form = $this->createForm(new GrupoType(), $grupo);
        
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

            $grupo = $form->getData();

            if($grupo->getRural() == true){
                $grupo->setBarrio(null);
            }
            else
            {
                $grupo->setCorregimiento(null);
                $grupo->setVereda(null);
                $grupo->setCacerio(null);
            }

            $grupo->setFechaModificacion(new \DateTime());

            $em->flush();

            $traerGrupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
                array('id' => $idGrupo));            

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

            $traerGrupo->setCodigo($zona."-".$idMunicipio->getAbreviatura()."-".$tipo."-".date_format($traerGrupo->getFechaInscripcion(), 'Y/m')."-".$consecutivo.$idGrupo);
            $em->flush();

            return $this->redirectToRoute('grupoGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idGrupo' => $idGrupo,
                    'grupo' => $grupo,
                    'numeroIdentificacion' => $nit[0],
                    'digitoVerificacion' => $nit[1],

            )
        );

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/eliminar", name="grupoEliminar")
     */
    public function grupoEliminarAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();

        $grupo = $em->getRepository('AppBundle:Grupo')->find($idGrupo);              

        $em->remove($grupo);
        $em->flush();

        return $this->redirect($this->generateUrl('grupoGestion'));

    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/documentos-soporte", name="grupoSoporte")
     */
    public function grupoSoporteAction(Request $request, $idGrupo)
    {


        $em = $this->getDoctrine()->getManager();

        $grupoSoporte = new GrupoSoporte();

        $form = $this->createForm(new GrupoSoporteType(), $grupoSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
            array('active' => '1', 'grupo' => $idGrupo),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
            array('active' => '0', 'grupo' => $idGrupo),
            array('fecha_creacion' => 'ASC')
        );

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {


                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(

                    array(
                        'descripcion' => $grupoSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );

            
                $actualizarGrupoSoportes = $em->getRepository('AppBundle:GrupoSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'grupo' => $idGrupo
                    )
                );  
            
                foreach ($actualizarGrupoSoportes as $actualizarGrupoSoporte){
                    echo $actualizarGrupoSoporte->getId()." ".$actualizarGrupoSoporte->getTipoSoporte()."<br />";
                    $actualizarGrupoSoporte->setFechaModificacion(new \DateTime());
                    $actualizarGrupoSoporte->setActive(0);
                    $em->flush();
                }

                $grupoSoporte->setGrupo($grupo);
                $grupoSoporte->setActive(true);
                $grupoSoporte->setFechaCreacion(new \DateTime());


                $em->persist($grupoSoporte);

                $em->flush();

                return $this->redirectToRoute('grupoSoporte', array( 'idGrupo' => $idGrupo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:grupo-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'grupo' => $grupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/documentos-soporte/{idGrupoSoporte}/borrar", name="grupoSoporteBorrar")
     */
    public function grupoSoporteBorrarAction(Request $request, $idGrupo, $idGrupoSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $grupoSoporte = new GrupoSoporte();
        
        $grupoSoporte = $em->getRepository('AppBundle:GrupoSoporte')->findOneBy(
            array('id' => $idGrupoSoporte)
        );
        
        $grupoSoporte->setFechaModificacion(new \DateTime());
        $grupoSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('grupoSoporte', array( 'idGrupo' => $idGrupo));
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien", name="grupoBeneficiarioCVB")
     */
    public function comiteVamosBienGrupoBeneficiarioAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosCVB = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );


        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-cvb-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idBeneficiario}/nueva-asignacion", name="grupoBeneficiarioCVBAsignacion")
     */
    public function comiteVamosBienAsignarGrupoBeneficiarioAction($idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );        
           
        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();

        $asignacionBeneficiarioComiteVamosBien->setGrupo($grupo);        
        $asignacionBeneficiarioComiteVamosBien->setBeneficiario($beneficiario);
        $asignacionBeneficiarioComiteVamosBien->setActive(true);
        $asignacionBeneficiarioComiteVamosBien->setFechaCreacion(new \DateTime());

        $em->persist($asignacionBeneficiarioComiteVamosBien);
        $em->flush();



        return $this->redirectToRoute('grupoBeneficiarioCVB', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiarioComiteVamosBien' => $asignacionBeneficiarioComiteVamosBien,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-vamos-bien/{idAsignacionBeneficiariosCVB}/eliminar", name="grupoBeneficiarioCVBEliminar")
     */
    public function comiteVamosBienEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosCVB)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioComiteVamosBien = new AsignacionBeneficiarioComiteVamosBien();

        $asignacionBeneficiarioComiteVamosBien = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->find($idAsignacionBeneficiariosCVB); 

        $em->remove($asignacionBeneficiarioComiteVamosBien);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosCVB = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteVamosBien')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteVamosBien abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioCVB',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCVB' => $asignacionesBeneficiariosCVB,
                'idGrupo' => $idGrupo
            ));      
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras", name="grupoBeneficiarioComiteCompras")
     */
    public function comiteComprasGrupoBeneficiarioAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );

        $asignacionesBeneficiariosCC = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );


        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-cc-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosCC' => $asignacionesBeneficiariosCC,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras/{idBeneficiario}/nueva-asignacion", name="grupoBeneficiarioComiteComprasAsignacion")
     */
    public function comiteComprasAsignarGrupoBeneficiarioAction($idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
            array('id' => $idBeneficiario)
        );      

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );        
           
        $asignacionBeneficiarioComiteCompras = new AsignacionBeneficiarioComiteCompras();

        $asignacionBeneficiarioComiteCompras->setGrupo($grupo);        
        $asignacionBeneficiarioComiteCompras->setBeneficiario($beneficiario);
        $asignacionBeneficiarioComiteCompras->setActive(true);
        $asignacionBeneficiarioComiteCompras->setFechaCreacion(new \DateTime());

        $em->persist($asignacionBeneficiarioComiteCompras);
        $em->flush();



        return $this->redirectToRoute('grupoBeneficiarioComiteCompras', 
            array(
                'beneficiario' => $beneficiario,          
                'asignacionesBeneficiarioComiteCompras' => $asignacionBeneficiarioComiteCompras,                
                'idGrupo' => $idGrupo
            ));        
        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/comite-compras/{idAsignacionBeneficiariosCVB}/eliminar", name="grupoBeneficiarioComiteComprasEliminar")
     */
    public function comiteComprasEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosCVB)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioComiteCompras = new AsignacionBeneficiarioComiteCompras();

        $asignacionBeneficiarioComiteCompras = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->find($idAsignacionBeneficiariosCVB); 

        $em->remove($asignacionBeneficiarioComiteCompras);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionBeneficiarioComiteCompras = $em->getRepository('AppBundle:AsignacionBeneficiarioComiteCompras')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioCVB',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiarioComiteCompras' => $asignacionBeneficiarioComiteCompras,
                'idGrupo' => $idGrupo
            ));      
        
    } 

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional", name="grupoBeneficiarioOrganizacional")
     */
    public function estructuraOrganizacionalGrupoBeneficiarioAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        if ($request->getMethod() == 'POST') {


            if(isset($_POST["idRolBeneficiario"])){

                //echo ($_POST["idRolBeneficiario"]["idBeneficiario"]);


                $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

                $rolBeneficiario = $em->getRepository('AppBundle:Listas')->findOneBy(
                    array('id' => $_POST["idRolBeneficiario"]["rol"])
                );  

                $beneficiario = $em->getRepository('AppBundle:Beneficiario')->findOneBy(
                    array('id' => $_POST["idRolBeneficiario"]["idBeneficiario"])
                );  

                $asignacionBeneficiarioEstructuraOrganizacional->setGrupo($grupo);                
                $asignacionBeneficiarioEstructuraOrganizacional->setBeneficiario($beneficiario);
                $asignacionBeneficiarioEstructuraOrganizacional->setRol($rolBeneficiario);                

                $asignacionBeneficiarioEstructuraOrganizacional->setFechaCreacion(new \DateTime());
                $asignacionBeneficiarioEstructuraOrganizacional->setActive(0);


                $em->persist($asignacionBeneficiarioEstructuraOrganizacional);
                $em->flush();

            }

        }

        $grupo=$em->getRepository('AppBundle:Grupo')->findBy(
            array('id'=> $idGrupo)
        );       

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionesBeneficiariosEO = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioEstructuraOrganizacional abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );


        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:beneficiario-grupo-eo-gestion-asignacion.html.twig', 
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiariosEO' => $asignacionesBeneficiariosEO,
                'idGrupo' => $idGrupo,
                'grupo' => $grupo
            ));        
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional/{idBeneficiario}/nueva-asignacion", name="formularioRolBeneficiarioOrganizacional")
     */
    public function formularioRolBeneficiarioEstructuraOrganizacionalAction(Request $request, $idGrupo, $idBeneficiario)
    {

        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

        $form = $this->createForm(new ListaRolBeneficiarioType(), $asignacionBeneficiarioEstructuraOrganizacional);

        $form->add(
            'idBeneficiario', 
            'hidden', 
            array(
                'mapped' => false,
                'attr' => array(      
                    'value' => $idBeneficiario,              
                    'style' => 'visibility:hidden'
                )
            )
        );
//El boton tiene un error al enviar el ID del beneficiario
        $form->add(
            'Asignar_'.$idBeneficiario, 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );


        $form->handleRequest($request);

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Grupo:asignarRolBeneficiarioEstructuraOrganizacional.html.twig',
            array(
                'form' => $form->createView(),
                'idBeneficiario' => $idBeneficiario,
                'idGrupo' => $idGrupo
                )
        );
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/asignacion-beneficiarios/estructura-organizacional/{idAsignacionBeneficiariosEO}/eliminar", name="grupoBeneficiarioEstructuraOrganizacionalEliminar")
     */
    public function estructuraOrganizacionalEliminarGrupoBeneficiarioAction($idGrupo, $idAsignacionBeneficiariosEO)
    {
        $em = $this->getDoctrine()->getManager();

        $asignacionBeneficiarioEstructuraOrganizacional = new AsignacionBeneficiarioEstructuraOrganizacional();

        $asignacionBeneficiarioEstructuraOrganizacional = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->find($idAsignacionBeneficiariosEO);         

        $em->remove($asignacionBeneficiarioEstructuraOrganizacional);
        $em->flush();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );

        $beneficiarios = new Beneficiario();

        $beneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('grupo' => $grupo)
        );     

        $asignacionBeneficiarioEstructuraOrganizacional = $em->getRepository('AppBundle:AsignacionBeneficiarioEstructuraOrganizacional')->findBy(
            array('grupo' => $grupo)
        ); 

        $query = $em->createQuery('SELECT b FROM AppBundle:Beneficiario b WHERE b.id NOT IN (SELECT beneficiario.id FROM AppBundle:Beneficiario beneficiario JOIN AppBundle:AsignacionBeneficiarioComiteCompras abc WHERE beneficiario = abc.beneficiario AND abc.grupo = :grupo) AND b.active = 1');
        $query->setParameter(':grupo', $grupo);
        $beneficiarios = $query->getResult();

        $mostrarBeneficiarios = $em->getRepository('AppBundle:Beneficiario')->findBy(
            array('id' => $beneficiarios, 'grupo' => $grupo )
        );

        return $this->redirectToRoute('grupoBeneficiarioOrganizacional',
            array(
                'beneficiarios' => $mostrarBeneficiarios,
                'asignacionesBeneficiarioEstructuraOrganizacional' => $asignacionBeneficiarioEstructuraOrganizacional,
                'idGrupo' => $idGrupo
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

    


}
