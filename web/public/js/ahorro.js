
app.controller('gestionDocumentoSoporteAhorroCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idAhorro = 0;
	$scope.idAhorro = 0;

	$scope.anularSoporteAhorro = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-financiera/ahorro/" + $scope.idAhorro + "/documentos-soporte/" + $scope.idAhorroSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionAhorroCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idAhorro = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarAhorro= function(idAhorro, consecutivo){

		$scope.idAhorro = idAhorro;
		$scope.consecutivoAhorro = consecutivo;

		$http.get($scope.rutaServidor + "gestion-financiera/ahorro/" + $scope.idAhorro + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaAhorro" + $scope.consecutivoAhorro).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

