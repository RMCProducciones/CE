<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Grupo;
use AppBundle\Form\gesion_empresarial\GrupoType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:default:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/nav", name="nav")
     */
    public function navAction()
    {
        return $this->render('AppBundle:default:nav.html.twig');
    }


    /**
     * @Route("/zonas", name="zonas")
     */
    public function zonasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $elementos = $em->getRepository('AppBundle:Zona')->findBy(
            array('active' => '1'),
            array('nombre' => 'ASC')
        );

        return $this->render('AppBundle:listas:options.html.twig', array('elementos'=>$elementos, 'idElemento'=>'0'));
    }

    /**
     * @Route("/departamentos", name="departamentos")
     */
    public function departamentosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $elementos = $em->getRepository('AppBundle:Departamento')->findBy(
            array('active' => '1'),
            array('nombre' => 'ASC')
        );

        return $this->render('AppBundle:listas:options.html.twig', array('elementos'=>$elementos, 'idElemento'=>'0'));
    }

    /**
     * @Route("/municipios/{idZona}/{idDepartamento}/{idElemento}", defaults={"idElemento" = 0}, name="municipios")
     */
    public function municipiosAction($idZona, $idDepartamento, $idElemento)
    {
        $em = $this->getDoctrine()->getManager();

        $elementos = $em->getRepository('AppBundle:Municipio')->findBy(
            array('zona' => $idZona, 'departamento' => $idDepartamento, 'active' => '1'),
            array('nombre' => 'ASC')
        );

        /*$query = $em->createQuery(
            'SELECT m
            FROM AppBundle:Municipios m
            WHERE z.zona = :zonaId
            AND m.departamento = :departamentoId
            GROUP BY c.nombre
            ORDER BY c.nombre ASC'
        );
        $query->setParameter('zonaId', $zonaId);
        $query->setParameter('departamentoId', $departamentoId);

        $municipios = $query->getResult();*/
        return $this->render('AppBundle:listas:options.html.twig', array('elementos'=>$elementos, 'idElemento'=>$idElemento));
    }


    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/", name="gruposGestion")
     */
    public function gruposGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $grupos = $em->getRepository('AppBundle:Grupo')->findAll(); 

        return $this->render('AppBundle:gestion_empresarial/desarrollo_empresarial:grupos-gestion.html.twig', array( 'grupos' => $grupos));
    }

    /**
     * @Route("/gestion-empresarial/desarrollo-empresarial/grupos/nuevo", name="gruposNuevo")
     */
    public function gruposNuevoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $grupo = new Grupo();
        
        $form = $this->createForm(new GrupoType(), $grupo);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $grupo = $form->getData();

            $grupo->setActive('true');


            
            $em->persist($grupo);
            $em->flush();

            return $this->redirectToRoute('gruposGestion');
        }
        
        return $this->render('AppBundle:gestion_empresarial/desarrollo_empresarial:grupos-nuevo.html.twig', array('form' => $form->createView()));
    }
}
