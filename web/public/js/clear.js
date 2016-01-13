app.controller('gestionClearCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idCLEAR = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarClear = function(idCLEAR, consecutivo){

		$scope.idCLEAR = idCLEAR;
		$scope.consecutivoClear = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/clear/" + $scope.idCLEAR + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaCLEAR" + $scope.consecutivoClear).fadeOut("slow");
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


app.controller('gestionDocumentoSoporteClearCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idCLEAR = 0;
	$scope.idClearSoporteActivo = 0;

	$scope.anularSoporteClear = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/clear/" + $scope.idCLEAR + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
	};	



}]);