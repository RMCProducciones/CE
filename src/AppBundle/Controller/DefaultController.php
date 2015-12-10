<?php

namespace AppBundle\Controller;

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
use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Entity\Beneficiario;
use AppBundle\Form\GestionEmpresarial\BeneficiarioType;
use AppBundle\Entity\POA;
use AppBundle\Form\GestionAdministrativa\POAType;
use AppBundle\Entity\Convocatoria;
use AppBundle\Form\GestionAdministrativa\ConvocatoriaType;
use AppBundle\Entity\CLEAR;
use AppBundle\Form\GestionEmpresarial\CLEARType;

/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class DefaultController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('AppBundle:default:login.html.twig');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /*$usuario = new Usuario(); 
        $token = new UsernamePasswordToken($usuario, null, 'main', array('ROLE_USER'));
        $this->get('security.context')->setToken($token);*/

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

    
}
