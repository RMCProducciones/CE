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


use AppBundle\Entity\Contador;
use AppBundle\Entity\Grupo;
use AppBundle\Entity\ContadorSoporte;



use AppBundle\Form\GestionEmpresarial\ContadorSoporteType;
use AppBundle\Form\GestionEmpresarial\ContadorType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ContadorController extends Controller
{
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/contador/gestion", name="contadorGestion")
     */
    public function contadorGestionAction($idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = $em->getRepository('AppBundle:Contador')->findBy(
            array('grupo' => $idGrupo)            
        );

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-gestion.html.twig', 
            array( 
                'contador' => $contador,
                'idGrupo' => $idGrupo
            )
        );
    }
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/contador/nuevo", name="contadorNuevo")
     */
    public function contadorNuevoAction(Request $request, $idGrupo)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $form = $this->createForm(new ContadorType(), $contador);

        $grupo = $em->getRepository('AppBundle:Grupo')->findOneBy(
            array('id' => $idGrupo)
        );
        
        
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
            
            $contador = $form->getData();                     

            $contador->setGrupo($grupo);
            $contador->setActive(true);
            $contador->setFechaCreacion(new \DateTime());


            $em->persist($contador);
            $em->flush();

            return $this->redirectToRoute('contadorGestion', array( 'idGrupo' => $idGrupo));
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-nuevo.html.twig', 
            array(
                'form' => $form->createView(),
                'idGrupo' => $idGrupo
            )
        );
    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/contador/{idContador}/editar", name="contadorEditar")
     */
    public function contadorEditarAction(Request $request, $idGrupo, $idContador)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $contador = $em->getRepository('AppBundle:Contador')->findOneBy(
            array('id' => $idContador)
        );

        $form = $this->createForm(new ContadorType(), $contador);
        
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

            $contador = $form->getData();

            $contador->setActive(true);
            $contador->setFechaCreacion(new \DateTime());

            $em->flush();

            return $this->redirectToRoute('contadorGestion', array( 'idGrupo' => $idGrupo));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idContador' => $idContador,
                    'contador' => $contador,
                    'idGrupo' => $idGrupo
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/contador/{idContador}/eliminar", name="contadorEliminar")
     */
    public function contadorEliminarAction(Request $request, $idGrupo, $idContador)
    {
        $em = $this->getDoctrine()->getManager();
        $contador = new Contador();

        $contador = $em->getRepository('AppBundle:Contador')->find($idContador);              

        $em->remove($contador);
        $em->flush();

        return $this->redirect($this->generateUrl('contadorGestion', array('idGrupo' => $idGrupo)));

    }

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupo/{idGrupo}/contador/{idContador}/documentos-soporte", name="contadorSoporte")
     */
    public function contadorSoporteAction(Request $request, $idGrupo, $idContador)
    {
        $em = $this->getDoctrine()->getManager();

        $contadorSoporte = new ContadorSoporte();
        
        $form = $this->createForm(new ContadorSoporteType(), $contadorSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
            array('active' => '1', 'contador' => $idContador),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
            array('active' => '0', 'contador' => $idContador),
            array('fecha_creacion' => 'ASC')
        );
        
        $contador = $em->getRepository('AppBundle:Contador')->findOneBy(
            array('id' => $idContador)
        );
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $contadorSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'contador_tipo_soporte'
                    )
                );
                
                $actualizarContadorSoportes = $em->getRepository('AppBundle:ContadorSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'contador' => $idContador
                    )
                );  
            
                foreach ($actualizarContadorSoportes as $actualizarContadorSoporte){
                    echo $actualizarContadorSoporte->getId()." ".$actualizarContadorSoporte->getTipoSoporte()."<br />";
                    $actualizarContadorSoporte->setFechaModificacion(new \DateTime());
                    $actualizarContadorSoporte->setActive(0);
                    $em->flush();
                }
                
                $contadorSoporte->setContador($contador);
                $contadorSoporte->setActive(true);
                $contadorSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($contadorSoporte);
                $em->flush();

                return $this->redirectToRoute('contadorSoporte', array( 'idContador' => $idContador,
                                                                        'idGrupo' => $idGrupo));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/Contador:contador-soporte.html.twig', 
            array(
                'form' => $form->createView(), 
                'soportesActivos' => $soportesActivos, 
                'histotialSoportes' => $histotialSoportes,
                'idGrupo' => $idGrupo
            )
        );
        
    }
    
    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/contador/{idContador}/documentos-soporte/{idContadorSoporte}/borrar", name="contadorSoporteBorrar")
     */
    public function contadorSoporteBorrarAction(Request $request, $idContador, $idContadorSoporte)
    {
        $em = $this->getDoctrine()->getManager();

        $ContadorSoporte = new ContadorSoporte();
        
        $contadorSoporte = $em->getRepository('AppBundle:ContadorSoporte')->findOneBy(
            array('id' => $idContadorSoporte)
        );
        
        $contadorSoporte->setFechaModificacion(new \DateTime());
        $contadorSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('contadorSoporte', array( 'idContador' => $idContador));
        
    }
    


}

