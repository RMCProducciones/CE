
app.controller('FiltrosRolCtrl', ['$scope', '$http', function($scope, $http) {

}]);


app.controller('gestionRolCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idGrupo = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarGrupo = function(idGrupo, consecutivo){

		$scope.idGrupo = idGrupo;
		$scope.consecutivoGrupo = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/grupo/" + $scope.idGrupo + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaGrupo" + $scope.consecutivoGrupo).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

		});

		
	};	

}]);

