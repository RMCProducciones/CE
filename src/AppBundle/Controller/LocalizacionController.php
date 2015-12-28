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
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


class LocalizacionController extends Controller
{
    /**
     * @Route("/departamentos", name="departamentos")
     */
    public function departamentosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
        	SELECT 
        		departamento.id, 
        		departamento.nombre 
            FROM AppBundle:Departamento departamento
            ORDER BY departamento.nombre ASC
    	');

		$elementos = $query->getResult();

		$encoders = array(new JsonEncoder());
		$normalizers = array(new ObjectNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response($serializer->serialize($elementos, 'json'));
    }

    /**
     * @Route("/zonas", name="zonas")
     */
    public function zonasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
        	SELECT 
        		zona.id, 
        		zona.nombre
            FROM AppBundle:Zona zona
            ORDER BY zona.nombre ASC
    	');

		$elementos = $query->getResult();

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response('{"zonas": ' . $serializer->serialize($elementos, 'json') . '}');
    }

    /**
     * @Route("/municipios", name="municipios")
     */
    public function municipiosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
        	SELECT 
        		departamento.id as departamento_id,
        		zona.id as zona_id,
        		municipio.id, 
        		municipio.nombre
            FROM AppBundle:Municipio municipio
            INNER JOIN AppBundle:Zona zona WITH zona.id = municipio.zona
            INNER JOIN AppBundle:Departamento departamento WITH departamento.id = municipio.departamento
			ORDER BY municipio.nombre ASC
    	');

		$elementos = $query->getResult();

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response('{"municipios": ' . $serializer->serialize($elementos, 'json') . '}');
    }

    /**
     * @Route("/municipios/{idDepartamento}/{idZona}/x/1", name="municipios3")
     */
    public function municipios3Action($idDepartamento, $idZona)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
        	SELECT 
        		departamento.id as departamento_id,
        		zona.id as zona_id,
        		municipio.id, 
        		municipio.nombre
            FROM AppBundle:Municipio municipio
            INNER JOIN AppBundle:Zona zona WITH zona.id = municipio.zona
            INNER JOIN AppBundle:Departamento departamento WITH departamento.id = municipio.departamento
			WHERE municipio.departamento = :idDepartamento
			AND municipio.zona = :idZona
			ORDER BY municipio.nombre ASC
    	');

		$query->setParameters([
			'idDepartamento'=> $idDepartamento,
			'idZona'=> $idZona
		]);
		//$query->setParameter('idZona', $idZona);    	

		$elementos = $query->getResult();

		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);
		
		return new Response('{"municipios": ' . $serializer->serialize($elementos, 'json') . '}');
    }


    /**
     * @Route("/{idDepartamento}/zonas", name="zonas2")
     */
    public function zonas2Action($idDepartamento)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
			SELECT 
				zona.id, 
				zona.nombre
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
     * @Route("/{idDepartamento}/{idZona}/municipios/x/2", name="municipios2")
     */
    public function municipios2Action($idDepartamento, $idZona)
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
