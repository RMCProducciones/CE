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
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-criterio", name="criterioGestion")
     */
   public function criterioGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = $em->getRepository('AppBundle:CriterioCalificacion')->findBY(
            array('active' => 1)
          
        ); 

        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-gestion.html.twig', array( 'criterio' => $criterio));
    }

    
     /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-criterio/nuevo", name="criterioNuevo")
     */
    public function criterioNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $criterio = new CriterioCalificacion();
        
        $form = $this->createForm(new CriterioCalificacionType(), $criterio);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $criterio = $form->getData();

            $criterio->setActive(true);
            $criterio->setFechaCreacion(new \DateTime());


            
            $em->persist($criterio);
            $em->flush();

            return $this->redirectToRoute('criterioGestion');
        }
        
        return $this->render('AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-nuevo.html.twig', array('form' => $form->createView()));
    } 

/**
     * @Route("/gestion-empresarial/desarrollo-empresarial/concurso/gestion-criterio/{idCriterioCalificacion}/editar", name="criterioEditar")
     */
    public function criterioEditarAction(Request $request, $idCriterioCalificacion)
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

            return $this->redirectToRoute('criterioGestion');
        }

        return $this->render(
            'AppBundle:GestionEmpresarial/DesarrolloEmpresarial/CriterioCalificacion:criterio-editar.html.twig', 
            array(
                    'form' => $form->createView(),
                    'idCriterioCalificacion' => $idCriterioCalificacion,
                    'criterio' => $criterio,
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

