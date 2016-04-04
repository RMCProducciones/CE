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


use AppBundle\Entity\Taller;

use AppBundle\Entity\TallerSoporte;




use AppBundle\Form\GestionEmpresarial\TallerSoporteType;
use AppBundle\Form\GestionEmpresarial\TallerType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class TallerController extends Controller
{
/**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/gestion", name="tallerGestion")
     */
    public function tallerGestionAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo));

        $taller = $em->getRepository('AppBundle:Taller')->findBy(          
            array('grupo' => $grupo)
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-gestion.html.twig', 
            array( 'taller' => $taller,
                   'idGrupo' => $idGrupo
                )
        );
    }



/**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/nuevo", name="tallerNuevo")
     */
    public function tallerNuevoAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo));
        
        $form = $this->createForm(new TallerType(), $taller);
        
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
            
            $taller = $form->getData();

            $taller->setAsistentes('0');
            $taller->setGrupo($grupo);
            $taller->setActive(true);
            $taller->setFechaCreacion(new \DateTime());


            $em->persist($taller);
            $em->flush();

            return $this->redirectToRoute('tallerGestion', 
                array( 'idGrupo' => $idGrupo
                )
            );
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-nuevo.html.twig', 
            array('form' => $form->createView(),
                  'idGrupo' => $idGrupo));
    }

    
/**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/{idTaller}/editar", name="tallerEditar")
     */
    public function tallerEditarAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)
        );

        $form = $this->createForm(new TallerType(), $taller);
        
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

            $taller = $form->getData();

            $taller->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('tallerGestion', 
                array( 'idGrupo' => $idGrupo
                )
            );
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idTaller' => $idTaller,
                    'taller' => $taller,
                    'idGrupo' => $idGrupo
            )
        );

    }


/**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/{idTaller}/eliminar", name="tallerEliminar")
     */
    public function tallerEliminarAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();
        $taller = new Taller();

        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller));              

        $em->remove($taller);
        $em->flush();

        return $this->redirect($this->generateUrl('tallerGestion',
            array('idGrupo' => $idGrupo)
            )
        );

    }



/**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/{idTaller}/documentos-soporte", name="tallerSoporte")
     */
    public function tallerSoporteAction(Request $request, $idGrupo, $idTaller)
    {
        $em = $this->getDoctrine()->getManager();

        $tallerSoporte = new TallerSoporte();
        
        $form = $this->createForm(new TallerSoporteType(), $tallerSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:TallerSoporte')->findBy(
            array('active' => '1', 'taller' => $idTaller),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:TallerSoporte')->findBy(
            array('active' => '0', 'taller' => $idTaller),
            array('fecha_creacion' => 'ASC')
        );
        
        $taller = $em->getRepository('AppBundle:Taller')->findOneBy(
            array('id' => $idTaller)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $tallerSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarTallerSoportes = $em->getRepository('AppBundle:TallerSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'taller' => $idTaller
                    )
                );  
            
                foreach ($actualizarTallerSoportes as $actualizarTallerSoporte){
                    echo $actualizarTallerSoporte->getId()." ".$actualizarTallerSoporte->getTipoSoporte()."<br />";
                    $actualizarTallerSoporte->setFechaModificacion(new \DateTime());
                    $actualizarTallerSoporte->setActive(0);
                    $em->flush();
                }
                
                $tallerSoporte->setTaller($taller);
                $tallerSoporte->setActive(true);
                $tallerSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($tallerSoporte);
                $em->flush();

                return $this->redirectToRoute('tallerSoporte', array( 'idTaller' => $idTaller, 'idGrupo' => $idGrupo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Taller:taller-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idGrupo' => $idGrupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/servicio-complementario/taller/{idGrupo}/{idTaller}/documentos-soporte/{idTallerSoporte}/borrar", name="tallerSoporteBorrar")
     */
    public function tallerSoporteBorrarAction(Request $request, $idGrupo, $idTaller, $idTallerSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $tallerSoporte = new TallerSoporte();
        
        $tallerSoporte = $em->getRepository('AppBundle:TallerSoporte')->findOneBy(
            array('id' => $idTallerSoporte)
        );
        
        $tallerSoporte->setFechaModificacion(new \DateTime());
        $tallerSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('tallerSoporte', array( 'idTaller' => $idTaller, 'idGrupo' => $idGrupo));
        
    }
    


}

