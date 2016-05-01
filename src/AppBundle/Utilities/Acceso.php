<?php

namespace AppBundle\Utilities;

use Symfony\Component\HttpFoundation\Request;

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
