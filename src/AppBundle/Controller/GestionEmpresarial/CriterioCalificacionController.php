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

use AppBundle\Entity\CriterioCalificacion;


use AppBundle\Form\GestionEmpresarial\CriterioCalificacionType;



/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class CriterioCalificacionController extends Controller
{

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/gestion-criterio", name="criterioGestion")
     */
   public function criterioGestionAction($idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = $em->getRepository('AppBundle:CriterioCalificacion')->findBY(
            array('concurso' => $idConcurso)
          
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-gestion.html.twig',
         array( 'criterio' => $criterio,
            'idConcurso'=>$idConcurso));
    }

    
     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/gestion-criterio/nuevo", name="criterioNuevo")
     */
    public function criterioNuevoAction(Request $request ,$idConcurso)
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = new CriterioCalificacion();

        $concurso = $em->getRepository('AppBundle:Concurso')->findOneBy(
        array('id' => $idConcurso)
         ); 
          
        
        $form = $this->createForm(new CriterioCalificacionType(), $criterio);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $criterio = $form->getData();

            $criterio->setActive(true);
            $criterio->setFechaCreacion(new \DateTime());
            $criterio->setConcurso($concurso);


            
            $em->persist($criterio);
            $em->flush();

            return $this->redirectToRoute('criterioGestion',
             array(
                'idConcurso' =>$idConcurso
                ));
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-nuevo.html.twig', 
            array('form' => $form->createView(),
                'idConcurso' =>$idConcurso
                ));
    } 

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/{idConcurso}/gestion-criterio/{idCriterioCalificacion}/editar", name="criterioEditar")
     */
    public function criterioEditarAction(Request $request, $idConcurso, $idCriterioCalificacion )
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = new CriterioCalificacion();

        $criterio = $em->getRepository('AppBundle:CriterioCalificacion')->findOneBy(
            array('id' => $idCriterioCalificacion)
        );

        $form = $this->createForm(new CriterioCalificacionType(), $criterio);
        
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

            $criterio = $form->getData();

            $criterio->setFechaModificacion(new \DateTime());

            

            $em->flush();

            return $this->redirectToRoute('criterioGestion' ,
                array(
                'idConcurso' =>$idConcurso
                ));
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCriterioCalificacion' => $idCriterioCalificacion,
                    'criterio' => $criterio,
                    'idConcurso' =>$idConcurso
            )
        );

    }


/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-criterio/{idCriterioCalificacion}/eliminar", name="criterioEliminar")
     */
    public function distribucionEliminarAction(Request $request, $idCriterioCalificacion)
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = new CriterioCalificacion();

        $criterio = $em->getRepository('AppBundle:CriterioCalificacion')->find($idCriterioCalificacion);              

        $em->remove($criterio);
        $em->flush();

        return $this->redirect($this->generateUrl('criterioGestion'));

    }





    


}

