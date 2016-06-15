<?php

namespace AppBundle\Utilities;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\GestionEmpresarial\GrupoController;

use AppBundle\Entity\Grupo;
use AppBundle\Form\GestionEmpresarial\GrupoFilterType;

class Acceso
{

	public function __construct($user, $roles)
    {
    	$permitido = false;
    	for($i=0; $i < count($roles); $i++)
	       	if ($user->hasRole($roles[$i]))
	            $permitido = true; 
	    
	    if(!$permitido)
	    	die("Acceso denegado.");
    }

}

class FilterLocation{

	public function queryFilter($request, $grupoThis, $form, $rolUsuario, $municipioUsuario, $entidad){

		$filterBuilder = $grupoThis->get('doctrine.orm.entity_manager')
            ->getRepository($entidad)
            ->createQueryBuilder('q')
            ->innerJoin("q.municipio", "m")
            ->innerJoin("m.departamento", "d")
            ->innerJoin("m.zona", "z");

        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));
            $grupoThis->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);           
        }

        $filterBuilder->andWhere('q.active = 1');

        if(in_array("ROLE_PROMOTOR", $rolUsuario)){
            $_GET['selDepartamento'] = $municipioUsuario->getDepartamento()->getId();
            $_GET['selZona'] = $municipioUsuario->getZona()->getId();            
            $_GET['selMunicipio'] = $municipioUsuario->getId();
        }
        if(in_array("ROLE_COORDINADOR", $rolUsuario)){
            $_GET['selDepartamento'] = $municipioUsuario->getDepartamento()->getId();
            $_GET['selZona'] = $municipioUsuario->getZona()->getId();                        
        }
            
        if (isset($_GET['selMunicipio']) && $_GET['selMunicipio'][0] != "?") {
         $filterBuilder->andWhere('m.id = :idMunicipio')
        ->setParameter('idMunicipio', $_GET['selMunicipio']);
        }
        else{
            if (isset($_GET['selDepartamento']) && $_GET['selDepartamento'][0] != "?") {
                $filterBuilder->andWhere('d.id = :idDepartamento')
                ->setParameter('idDepartamento', $_GET['selDepartamento']);
            }
            if (isset($_GET['selZona']) && $_GET['selZona'][0] != "?") {   
                $filterBuilder->andWhere('z.id = :idZona')
                ->setParameter('idZona', $_GET['selZona']);
            }    
        }

		return $filterBuilder->getQuery();
	}

	public function fieldBlock($rolUsuario){
		$valuesFieldBlock = array(4);
		if(in_array("ROLE_PROMOTOR", $rolUsuario)){            
            $valuesFieldBlock[0] = 'disabled';
            $valuesFieldBlock[1] = 'disabled';
            $valuesFieldBlock[2] = 'disabled';
            $valuesFieldBlock[3] = 1;
        }

        if(in_array("ROLE_COORDINADOR", $rolUsuario)){            
            $_GET['selMunicipio'] = 0;
            $valuesFieldBlock[0] = 'disabled';
            $valuesFieldBlock[1] = 'disabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 2;
        }

        return $valuesFieldBlock;
	}


}