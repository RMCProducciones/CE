app.controller('gestionDocumentoSoporteTalentoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idTalento = 0;
	$scope.idTalentoSoporteActivo = 0;

	$scope.anularSoporteTalento = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-conocimiento/talento/" + $scope.idTalento + "/documentos-soporte/" + $scope.idTalentoSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionTalentoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idTalento = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarTalento = function(idTalento, consecutivo){

		$scope.idTalento = idTalento;
		$scope.consecutivoTalento = consecutivo;

		$http.get($scope.rutaServidor + "gestion-conocimiento/talento/" + $scope.idTalento + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaTalento" + $scope.consecutivoTalento).fadeOut("slow");
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



