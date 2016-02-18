
app.controller('gestionDocumentoSoporteTallerCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idTaller = 0;
	$scope.idTallerSoporteActivo = 0;

	$scope.anularSoporteTaller = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/taller/" + $scope.idTaller + "/documentos-soporte/" + $scope.idTallerSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionTallerCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idTaller = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarTaller = function(idTaller, consecutivo){

		$scope.idTaller = idTaller;
		$scope.consecutivoTaller = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/taller/" + $scope.idTaller + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaTaller" + $scope.consecutivoTaller).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);



