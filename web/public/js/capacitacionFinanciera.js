
app.controller('gestionDocumentoSoporteCapacitacionFinancieraCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idCapacitacionFinanciera = 0;
	$scope.idCapacitacionFinancieraSoporteActivo = 0;

	$scope.anularSoporteCapacitacionFinanciera = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-financiera/capacitacion-financiera/capacitacion/" + $scope.idCapacitacionFinanciera + "/documentos-soporte/" + $scope.idCapacitacionFinancieraSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionCapacitacionFinancieraCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idCapacitacionFinanciera = 0;
	$scope.idProgramaCapacitacionFinanciera = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarCapacitacionFinanciera= function(idCapacitacionFinanciera, idPCF, consecutivo){

		$scope.idCapacitacionFinanciera = idCapacitacionFinanciera;
		$scope.idProgramaCapacitacionFinanciera = idPCF;
		$scope.consecutivoCapacitacionFinanciera = consecutivo;

		$http.get($scope.rutaServidor + "gestion-financiera/programa-capacitacion-financiera/" + $scope.idProgramaCapacitacionFinanciera + "/capacitacion/" + $scope.idCapacitacionFinanciera + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaCapacitacionFinanciera" + $scope.consecutivoCapacitacionFinanciera).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

