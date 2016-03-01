app.controller('gestionDocumentoSoporteConvocatoriaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idConvocatoria = 0;
	$scope.idConvocatoriaSoporteActivo = 0;

	$scope.anularSoporteConvocatoria = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-administrativa/gestion-POA/convocatoria/" + $scope.idConvocatoria + "/documentos-soporte/" + $scope.idConvocatoriaSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionConvocatoriaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idConvocatoria = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarConvocatoria = function(idConvocatoria, consecutivo){

		$scope.idConvocatoria = idConvocatoria;
		$scope.consecutivoConvocatoria = consecutivo;

		$http.get($scope.rutaServidor + "gestion-administrativa/gestion-POA/convocatoria/" + $scope.idConvocatoria + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaConvocatoria" + $scope.consecutivoConvocatoria).fadeOut("slow");
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



