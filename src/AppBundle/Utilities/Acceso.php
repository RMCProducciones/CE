<?php

namespace AppBundle\Utilities;

use Symfony\Component\HttpFoundation\Request;

use AppBundle\GestionEmpresarial\GrupoController;
use AppBundle\GestionEmpresarial\ClearController;

use AppBundle\Entity\Grupo;

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

        if(in_array("ROLE_ADMIN", $rolUsuario)){
            $_GET['selDepartamento'] = 0;
            $_GET['selZona'] = 0;                        
            $_GET['selMunicipio'] = 0;
        }

        if(in_array("ROLE_ESPECIALISTA_EMPRESARIAL", $rolUsuario)){
            $_GET['selDepartamento'] = 0;
            $_GET['selZona'] = 0;                        
            $_GET['selMunicipio'] = 0;
        }

        if(in_array("ROLE_ESPECIALISTA_FINANCIERO", $rolUsuario)){
            $_GET['selDepartamento'] = 0;
            $_GET['selZona'] = 0;                        
            $_GET['selMunicipio'] = 0;
        }

        if(in_array("ROLE_ESPECIALISTA_CONOCIMIENTO", $rolUsuario)){
            $_GET['selDepartamento'] = 0;
            $_GET['selZona'] = 0;                        
            $_GET['selMunicipio'] = 0;
        }

        if(in_array("ROLE_ESPECIALISTA_ADMINISTRATIVO", $rolUsuario)){
            $_GET['selDepartamento'] = 0;
            $_GET['selZona'] = 0;                        
            $_GET['selMunicipio'] = 0;
        }


		return $filterBuilder;
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

        if(in_array("ROLE_ADMIN", $rolUsuario)){                        
            $valuesFieldBlock[0] = 'enabled';
            $valuesFieldBlock[1] = 'enabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 3;
        }

        if(in_array("ROLE_ESPECIALISTA_EMPRESARIAL", $rolUsuario)){                        
            $valuesFieldBlock[0] = 'enabled';
            $valuesFieldBlock[1] = 'enabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 4;
        }

        if(in_array("ROLE_ESPECIALISTA_FINANCIERO", $rolUsuario)){                        
            $valuesFieldBlock[0] = 'enabled';
            $valuesFieldBlock[1] = 'enabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 5;
        }

        if(in_array("ROLE_ESPECIALISTA_CONOCIMIENTO", $rolUsuario)){                        
            $valuesFieldBlock[0] = 'enabled';
            $valuesFieldBlock[1] = 'enabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 6;
        }

        if(in_array("ROLE_ESPECIALISTA_ADMINISTRATIVO", $rolUsuario)){                        
            $valuesFieldBlock[0] = 'enabled';
            $valuesFieldBlock[1] = 'enabled';
            $valuesFieldBlock[2] = 'enabled';
            $valuesFieldBlock[3] = 7;
        }

        return $valuesFieldBlock;
	}

	public function valuesFormDMZ($rolUsuario, $municipioUsuario){
		$valuesFieldDMZ = array(3);
		if(in_array("ROLE_PROMOTOR", $rolUsuario)){            
            $valuesFieldDMZ[0] = $municipioUsuario->getDepartamento()->getId();
            $valuesFieldDMZ[1] = $municipioUsuario->getZona()->getId();
            $valuesFieldDMZ[2] = $municipioUsuario->getId();            
        }

        if(in_array("ROLE_COORDINADOR", $rolUsuario)){                        
            $valuesFieldDMZ[0] = $municipioUsuario->getDepartamento()->getId();
            $valuesFieldDMZ[1] = $municipioUsuario->getZona()->getId();
            $valuesFieldDMZ[2] = 0;            
        }

        if(in_array("ROLE_ADMIN", $rolUsuario)){                        
            $valuesFieldDMZ[0] = 0;
            $valuesFieldDMZ[1] = 0;
            $valuesFieldDMZ[2] = 0;            
        }

        if(in_array("ROLE_ESPECIALISTA_EMPRESARIAL", $rolUsuario)){                        
            $valuesFieldDMZ[0] = 0;
            $valuesFieldDMZ[1] = 0;
            $valuesFieldDMZ[2] = 0;            
        }

        if(in_array("ROLE_ESPECIALISTA_FINANCIERO", $rolUsuario)){                        
            $valuesFieldDMZ[0] = 0;
            $valuesFieldDMZ[1] = 0;
            $valuesFieldDMZ[2] = 0;            
        }

        if(in_array("ROLE_ESPECIALISTA_CONOCIMIENTO", $rolUsuario)){                        
            $valuesFieldDMZ[0] = 0;
            $valuesFieldDMZ[1] = 0;
            $valuesFieldDMZ[2] = 0;            
        }

        if(in_array("ROLE_ESPECIALISTA_ADMINISTRATIVO", $rolUsuario)){                        
            $valuesFieldDMZ[0] = 0;
            $valuesFieldDMZ[1] = 0;
            $valuesFieldDMZ[2] = 0;            
        }

        return $valuesFieldDMZ;
	}

}
