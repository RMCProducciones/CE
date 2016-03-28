app.controller('gestionDocumentoSoporteExperienciaExitosaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idExperienciaExitosa = 0;
	$scope.idExperienciaExitosaSoporteActivo = 0;

	$scope.anularSoporteExperienciaExitosa = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-conocimiento/experiencia-exitosa/" + $scope.idExperienciaExitosa + "/documentos-soporte/" + $scope.idExperienciaExitosaSoporteActivo + "/borrar");
		
	};


}]);



app.controller('gestionExperienciaExitosaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idExperienciaExitosa = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarExperienciaExitosa = function(idExperienciaExitosa, consecutivo){

		$scope.idExperienciaExitosa = idExperienciaExitosa;
		$scope.consecutivoExperienciaExitosa = consecutivo;

		$http.get($scope.rutaServidor + "gestion-conocimiento/experiencia-exitosa/" + $scope.idExperienciaExitosa + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaExperienciaExitosa" + $scope.consecutivoExperienciaExitosa).fadeOut("slow");
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



