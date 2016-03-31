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




use AppBundle\Entity\EvaluacionFase;




use AppBundle\Form\GestionEmpresarial\EvaluacionFaseSoporteType;
use AppBundle\Form\GestionEmpresarial\EvaluacionFaseType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class EvaluacionFaseController extends Controller
{
/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/evaluacionfase/nuevo", name="evaluacionfaseNuevo")
     */
    public function evaluacionfaseNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $evaluacionfase= new EvaluacionFase();
        
        $form = $this->createForm(new EvaluacionFaseType(), $evaluacionfase);
        
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
            
            $evaluacionfase = $form->getData();


            $evaluacionfase->setActive(true);
            $evaluacionfase->setFechaCreacion(new \DateTime());
            $em->persist($evaluacionfase);
            $em->flush();

        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/EvaluacionFase:evaluacionfase-nuevo.html.twig', array('form' => $form->createView()));
    }



    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/evaluacionfase/{idEvaluacionFase}/documentos-soporte", name="evaluacionfaseSoporte")
     */
    public function evaluacionfaseSoporteAction(Request $request, $idEvaluacionFase)
    {
        $em = $this->getDoctrine()->getManager();

        $evaluacionfaseSoporte = new EvaluacionFaseSoporte();
        
        $form = $this->createForm(new EvaluacionFaseSoporteType(), $evaluacionfaseSoporte);

        $form->add(
            'Guardar', 
            'submit', 
            array(
                'attr' => array(
                    'style' => 'visibility:hidden'
                ),
            )
        );

        $soportesActivos = $em->getRepository('AppBundle:EvaluacionFaseSoporte')->findBy(
            array('active' => '1', 'evaluacionfase' => $idEvaluacionFase),
            array('fecha_creacion' => 'ASC')
        );

        $histotialSoportes = $em->getRepository('AppBundle:EvaluacionFaseSoporte')->findBy(
            array('active' => '0', 'evaluacionfase' => $idEvaluacionFase),
            array('fecha_creacion' => 'ASC')
        );
        
        $evaluacionfase = $em->getRepository('AppBundle:EvaluacionFase')->findOneBy(
            array('id' => $idEvaluacionFase)
        );
        
        //echo ($idEvaluacionFase);
        //print_r($evaluacionfase);

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $tipoSoporte = $em->getRepository('AppBundle:DocumentoSoporte')->findOneBy(
                    array(
                        'descripcion' => $evaluacionfaseSoporte->getTipoSoporte()->getDescripcion(), 
                        'dominio' => 'grupo_tipo_soporte'
                    )
                );
                
                $actualizarEvaluacionFaseSoportes = $em->getRepository('AppBundle:EvaluacionFaseSoporte')->findBy(
                    array(
                        'active' => '1' , 
                        'tipo_soporte' => $tipoSoporte->getId(), 
                        'evaluacionfase' => $idEvaluacionFase,
                    )
                );  
            
                foreach ($actualizarEvaluacionFaseSoportes as $actualizarEvaluacionFaseSoporte){
                    echo $actualizarEvaluacionFaseSoporte->getId()." ".$actualizarEvaluacionFaseSoporte->getTipoSoporte()."<br />";
                    $actualizarEvaluacionFaseSoporte->setFechaModificacion(new \DateTime());
                    $actualizarEvaluacionFaseSoporte->setActive(0);
                    $em->flush();
                }
                
                $evaluacionfaseSoporte->setEvaluacionFase($evaluacionfase);
                $evaluacionfaseSoporte->setActive(true);
                $evaluacionfaseSoporte->setFechaCreacion(new \DateTime());
                //$grupoSoporte->setUsuarioCreacion(1);

                $em->persist($evaluacionfaseSoporte);
                $em->flush();

                return $this->redirectToRoute('evaluacionfaseSoporte', array( 'idEvaluacionFase' => $idEvaluacionFase));
            }
        }   
        
        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/EvaluacionFase:evaluacionfase-soporte.html.twig', 
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
        $em = $this->getDoctrine()->getManager();

        $evaluacionfaseSoporte = new EvaluacionFaseSoporte();
        
        $evaluacionfaseSoporte = $em->getRepository('AppBundle:EvaluacionFaseSoporte')->findOneBy(
            array('id' => $idEvaluacionFaseSoporte)
        );
        
        $evaluacionfaseSoporte->setFechaModificacion(new \DateTime());
        $evaluacionfaseSoporte->setActive(0);
        $em->flush();

        return $this->redirectToRoute('evaluacionfaseSoporte', array( 'idEvaluacionFase' => $idEvaluacionFase));
        
    }



}

