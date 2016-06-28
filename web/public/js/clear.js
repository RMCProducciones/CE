app.controller('gestionClearCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idCLEAR = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarClear = function(idCLEAR, consecutivo){

		$scope.idCLEAR = idCLEAR;
		$scope.consecutivoClear = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/clear/" + $scope.idCLEAR + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaCLEAR" + $scope.consecutivoClear).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);


app.controller('gestionDocumentoSoporteClearCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idCLEAR = 0;
	$scope.idClearSoporteActivo = 0;

	$scope.anularSoporteClear = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/clear/" + $scope.idCLEAR + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
	};	



}]);

app.controller('gestionIntegranteClearCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.eliminarIntegranteClear = function(ruta){
		window.location.replace(ruta);
	};	

}]);


app.controller('gestionGrupoClearCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.eliminarGrupoClear = function(ruta){
		window.location.replace(ruta);
	};	

}]);

app.controller('FiltrosClearCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasClear = function(CountBuscarHerramientas){
		$scope.CountBuscarHerramientas = CountBuscarHerramientas * (-1);
		if($scope.CountBuscarHerramientas== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }	

    $scope.tipoUsuario = 0;
	
    $scope.limpiarCamposFiltroBusquedaClear = function(tipoUsuario){

    	$scope.tipoUsuario = tipoUsuario;

    	if($scope.tipoUsuario == 1){
    		$("#clearFilter_fecha_inicio").val("");
			$("#clearFilter_fecha_finalizacion").val("");
    	}else if($scope.tipoUsuario == 2){
    		$("#selMunicipio").val("");
			$("#clearFilter_fecha_inicio").val("");
			$("#clearFilter_fecha_finalizacion").val("");
    	} else {
    		$("#selDepartamento").val("");
			$("#selZona").val("");
			$("#selMunicipio").val("");
			$("#clearFilter_fecha_inicio").val("");
			$("#clearFilter_fecha_finalizacion").val("");	
    	}
       
		/*$("#selDepartamento").val("");
		$("#selZona").val("");
		$("#selMunicipio").val("");
		$("#clearFilter_fecha_inicio").val("");
		$("#clearFilter_fecha_finalizacion").val("");*/
		

       
    }
      
		
}]);

app.controller('FiltrosClearIntegranteCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasClearIntegrante = function(CountBuscarHerramientas){
		$scope.CountBuscarHerramientas = CountBuscarHerramientas * (-1);
		if($scope.CountBuscarHerramientas== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }	
	
    $scope.limpiarCamposFiltroBusquedaClearIntegrante = function(){
       
		
		$("#clearIntegranteFilter_primer_nombre").val("");
		$("#clearIntegranteFilter_primer_apellido").val("");
		$("#clearIntegranteFilter_numero_documento").val("");

       
    }
      
		
}]);

app.controller('FiltrosClearGrupoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasClearGrupo = function(CountBuscarHerramientas){
		$scope.CountBuscarHerramientas = CountBuscarHerramientas * (-1);
		if($scope.CountBuscarHerramientas== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }	

    $scope.tipoUsuario = 0;
	
    $scope.limpiarCamposFiltroBusquedaClearGrupo = function(tipoUsuario){
	       
		$scope.tipoUsuario = tipoUsuario;

    	if($scope.tipoUsuario == 1){
    		$("#clearGrupoFilter_nombre").val("");
    	}else if($scope.tipoUsuario == 2){
    		$("#selMunicipio").val("");
			$("#clearGrupoFilter_nombre").val("");
    	} else {
 			$("#clearGrupoFilter_nombre").val("");
			$("#selDepartamento").val("");
			$("#selMunicipio").val("");
			$("#selZona").val("");   		
    	}

		/*$("#clearGrupoFilter_nombre").val("");
		$("#selDepartamento").val("");
		$("#selMunicipio").val("");
		$("#selZona").val("");*/
       
    }
      
		
}]);

