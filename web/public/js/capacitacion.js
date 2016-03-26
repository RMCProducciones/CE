app.controller('gestionDocumentoSoporteCapacitacionCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idCapacitacion = 0;
	$scope.idCapacitacionSoporteActivo = 0;

	$scope.anularSoporteCapacitacion = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-conocimiento/capacitacion/" + $scope.idCapacitacion + "/documentos-soporte/" + $scope.idCapacitacionSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionCapacitacionCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idCapacitacion = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarCapacitacion = function(idCapacitacion, consecutivo){

		$scope.idCapacitacion = idCapacitacion;
		$scope.consecutivoCapacitacion = consecutivo;

		$http.get($scope.rutaServidor + "gestion-conocimiento/capacitacion/" + $scope.idCapacitacion + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaCapacitacion" + $scope.consecutivoCapacitacion).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);



