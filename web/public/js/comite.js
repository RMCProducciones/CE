app.controller('gestionComiteCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idComite = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarComite = function(idComite, consecutivo){

		$scope.idComite = idComite;
		$scope.consecutivoComite = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/comite-concursos/" + $scope.idComite + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaComite" + $scope.consecutivoComite).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			//console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())			
		});

		
	};	

}]);


app.controller('gestionIntegranteComiteConcursoCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarIntegranteComiteConcurso = function(ruta){

		window.location.replace(ruta);

	};	
}]);
