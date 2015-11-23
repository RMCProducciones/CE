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


class LocalizacionController extends Controller
{
    /**
     * @Route("/departamentos", name="departamentos")
     */
    public function departamentosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
            'SELECT departamento.id, departamento.nombre
            FROM AppBundle:Departamento departamento
            ORDER BY departamento.nombre ASC'
		);
        
		$elementos = $query->getResult();

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response('{"departamentos": ' . $serializer->serialize($elementos, 'json') . '}');

    }

    /**
     * @Route("/{idDepartamento}/zonas", name="zonas")
     */
    public function zonasAction($idDepartamento)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
			SELECT zona.id, zona.nombre
            FROM AppBundle:Zona zona
			INNER JOIN AppBundle:Municipio municipio WITH zona.id = municipio.zona
			WHERE municipio.departamento = :idDepartamento
            GROUP BY zona.id
			ORDER BY zona.nombre ASC			
		');
		$query->setParameter('idDepartamento', $idDepartamento);
        
		$elementos = $query->getResult();

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response('{"zonas": ' . $serializer->serialize($elementos, 'json') . '}');

	}
	
    /**
     * @Route("/{idDepartamento}/{idZona}/municipios", name="municipios")
     */
    public function municipiosAction($idDepartamento, $idZona)
    {
        $em = $this->getDoctrine()->getManager();
		
		if($idDepartamento == 0 && $idZona == 0){

			$query = $em->createQuery('
				SELECT municipio.id, municipio.nombre
				FROM AppBundle:Municipio municipio
				ORDER BY municipio.nombre ASC
			');
			
		}else if($idDepartamento > 0 && $idZona == 0){
			$query = $em->createQuery('
				SELECT municipio.id, municipio.nombre
				FROM AppBundle:Municipio municipio
				WHERE municipio.departamento = :idDepartamento
				ORDER BY municipio.nombre ASC
			');
			$query->setParameter('idDepartamento', $idDepartamento);
			
		}else if($idDepartamento == 0 && $idZona > 0){
			$query = $em->createQuery('
				SELECT municipio.id, municipio.nombre
				FROM AppBundle:Municipio municipio
				WHERE municipio.zona = :idZona
				ORDER BY municipio.nombre ASC
			');
			$query->setParameter('idZona', $idZona);			
		}else{
			$query = $em->createQuery('
				SELECT municipio.id, municipio.nombre
				FROM AppBundle:Municipio municipio
				WHERE municipio.departamento = :idDepartamento
				AND municipio.zona = :idZona
				ORDER BY municipio.nombre ASC
			');
			$query->setParameter('idDepartamento', $idDepartamento);
			$query->setParameter('idZona', $idZona);			
		}		
		
        $elementos = $query->getResult();
		
		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);

		return new Response('{"municipios": ' . $serializer->serialize($elementos, 'json') . '}');

	}   
	
}
