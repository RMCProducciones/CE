app.controller('gestionCriterioCtrl', ['$scope', '$http', function($scope, $http) {


	$scope.idCriterio = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarCriterio = function(idCriterio, consecutivo){

		$scope.idCriterio= idCriterio;
		$scope.consecutivoCriterio = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/concurso/gestion-distribucion/" + $scope.idCriterio + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaCriterio" + $scope.consecutivoCriterio).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

	};	

}]);



