app.controller('gestionDocumentoSoporteBecaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idBeca = 0;
	$scope.idBecaSoporteActivo = 0;

	$scope.anularSoporteBeca = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-conocimiento/beca/" + $scope.idBeca + "/documentos-soporte/" + $scope.idBecaSoporteActivo + "/borrar");
		
	};


}]);





app.controller('gestionBecaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idBeca = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarBeca = function(idBeca, consecutivo){

		$scope.idBeca = idBeca;
		$scope.consecutivoBeca = consecutivo;

		$http.get($scope.rutaServidor + "gestion-conocimiento/beca/" + $scope.idBeca + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaBeca" + $scope.consecutivoBeca).fadeOut("slow");
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



