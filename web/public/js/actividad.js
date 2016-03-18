
app.controller('gestionDocumentoSoporteActividadCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idActividad = 0;
	$scope.idActividadSoporteActivo = 0;

	$scope.anularSoporteActividad = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/concurso/actividad/" + $scope.idActividad + "/documentos-soporte/" + $scope.idActividadSoporteActivo + "/borrar");
		
	};


}]);

app.controller('gestionActividadCtrl', ['$scope', '$http', function($scope, $http) {

	console.log("Cargo gestionActividadCtrl");

	$scope.idActividad = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarActividad = function(idActividad, consecutivo){

		$scope.idActividad= idActividad;
		$scope.consecutivoActividad = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/concurso/actividad/" + $scope.idActividad + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaActividad" + $scope.consecutivoActividad).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

	};	

}]);



