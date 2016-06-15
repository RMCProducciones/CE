
app.controller('gestionDocumentoSoporteTallerCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idTaller = 0;
	$scope.idAcceso = 0;
	$scope.idTallerSoporteActivo = 0;

	$scope.anularSoporteTaller = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/gestion-empresarial/taller/"+ $scope.idGrupo + "/" + $scope.idTaller + "/" +$scope.idAcceso + "/documentos-soporte/" + $scope.idTallerSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionTallerCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idGrupo = 0;	
	$scope.idTaller = 0;	
	$scope.idAcceso = 0;

	console.log($scope.estadoMensaje);

	$scope.eliminarTaller = function(idGrupo, idTaller, acceso, consecutivo){

		$scope.idGrupo = idGrupo;
		$scope.idTaller = idTaller;
		$scope.idAcceso = acceso;
		$scope.consecutivoTaller = consecutivo;

		console.log($scope.idGrupo);
		console.log($scope.idTaller);
		console.log($scope.acceso);
		console.log($scope.consecutivoTaller);

		$http.get($scope.rutaServidor + "gestion-empresarial/gestion-empresarial/taller/" + $scope.idGrupo + "/" + $scope.idTaller + "/" +$scope.idAcceso +"/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaTaller" + $scope.consecutivoTaller).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('tallerBeneficiariosCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminartallerBeneficiarios = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('cerrarTalleresGrupoCtrl', ['$scope', '$http', function($scope, $http) {

	console.log("dsjhasjkdlhs");
	
	$scope.cerrarTalleresGrupo = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('FiltrosTallerCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasTaller = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaTaller = function(){

       
		$("#tallerFilter_lugar").val("");
		$("#tallerFilter_asistentes").val("");

				
       
    }
      
		
}]);

app.controller('FiltrosTallerBeneficiarioCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasTallerBeneficiario = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaTallerBeneficiario = function(){

       
		$("#tallerBeneficiarioFilter_primer_nombre").val("");
		$("#tallerBeneficiarioFilter_primer_apellido").val("");
		$("#tallerBeneficiarioFilter_numero_documento").val("");
		$("#tallerBeneficiarioFilter_genero").val("");
       
    }
      
		
}]);
