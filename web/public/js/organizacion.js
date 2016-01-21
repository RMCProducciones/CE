
app.controller('gestionDocumentoSoporteOrganizacionCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idOrganizacion = 0;
	$scope.idOrganizacionSoporteActivo = 0;

	$scope.anularSoporteOrganizacion = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/organizacion/" + $scope.idOrganizacion + "/documentos-soporte/" + $scope.idOrganizacionSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionOrganizacionCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idOrganizacion = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarOrganizacion = function(idOrganizacion, consecutivo){

		$scope.idOrganizacion = idOrganizacion;
		$scope.consecutivoOrganizacion = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/organizacion/" + $scope.idOrganizacion + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaOrganizacion" + $scope.consecutivoOrganizacion).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

