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

app.controller('gestionGrupoRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoRuta = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionOrganizacionRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarOrganizacionRuta = function(ruta){		
		window.location.replace(ruta);

	};	
}]);



