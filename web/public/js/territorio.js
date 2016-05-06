app.controller('gestionTerritorioAprendizajeCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idTerritorioAprendizaje = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarTerritorioAprendizaje = function(idTerritorioAprendizaje, consecutivo){

		$scope.idTerritorioAprendizaje = idTerritorioAprendizaje;
		$scope.consecutivoTerritorioAprendizaje = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/territorio/" + $scope.idTerritorioAprendizaje + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaTerritorioAprendizaje" + $scope.consecutivoTerritorioAprendizaje).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('gestionOrganizacionTerritorioCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarOrganizacionTerritorio = function(ruta){		
		window.location.replace(ruta);

	};	
}]);


app.controller('FiltrosTerritorioAprendizajeCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasTerritorioAprendizaje = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaTerritorioAprendizaje = function(){
       
		$("#territorioFilter_nombre_territorio").val("");
		$("#territorioFilter_observaciones").val("");
	


		

       
    }
      
		
}]);


app.controller('FiltrosPasantiaTerritorioCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPasantiaTerritorio = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPasantiaTerritorio = function(){
       
		
		$("#pasantiaTerritorioFilter_nombre_territorio").val("");
		

       
    }
      
		
}]);

