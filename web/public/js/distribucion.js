app.controller('gestionDistribucionCtrl', ['$scope', '$http', function($scope, $http) {


	$scope.idDistribucion = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarDistribucion = function(idDistribucion, consecutivo){

		$scope.idDistribucion= idDistribucion;
		$scope.consecutivoDistribucion = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion/" + $scope.idDistribucion + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaDistribucion" + $scope.consecutivoDistribucion).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

	};	

}]);



