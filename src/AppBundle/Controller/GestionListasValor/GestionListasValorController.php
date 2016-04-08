<?php

namespace AppBundle\Controller\GestionListasValor;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


use AppBundle\Entity\Listas;



use AppBundle\Form\GestionEmpresarial\GrupoType;
use AppBundle\Form\GestionEmpresarial\GrupoSoporteType;
use AppBundle\Form\GestionEmpresarial\ListaRolBeneficiarioType;


/*Para autenticación por código*/
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class GestionListasValorController extends Controller
{

    /**
     * @Route("/gestion-lista-valores/gestion", name="listaGestion")
     */
    public function listaGestionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listas = $em->getRepository('AppBundle:Listas')->findAll(
            array(
              'dominio' => 'ASC')
            
        );

      echo "<pre>";
      printf($listas); 
      echo "</pre>";

        /*return $this->render('AppBundle:GestionListasValor:grupo-gestion.html.twig', 
            array( 'listas' => $listas
                   )
        );*/
    }

    

    


}

