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

use Symfony\Component\Finder\Finder;

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


    /**
     * @Route("/menu", name="menu")
     */
    public function menuAction()
    {

        return $this->render('AppBundle:default:menu.html.twig');
    }

    /**
     * @Route("/testcorreo", name="homepage")
     */
    /*public function testCorreoAction(Request $request)
    {
        $name = "test";

        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('ce@rmcproducciones.com')
            ->setTo('j.bolanos@rmcproducciones.com')
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'Emails/registration.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        /*;
        $this->get('mailer')->send($message);

        return $this->render('AppBundle:default:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
        
    }*/
    


}
