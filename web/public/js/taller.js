
app.controller('gestionDocumentoSoporteTallerCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idTaller = 0;
	$scope.idTallerSoporteActivo = 0;

	$scope.anularSoporteTaller = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/servicio-complementario/taller/"+ $scope.idGrupo + "/" + $scope.idTaller + "/documentos-soporte/" + $scope.idTallerSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionTallerCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idGrupo = 0;	
	$scope.idTaller = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarTaller = function(idGrupo, idTaller, consecutivo){

		$scope.idGrupo = idGrupo;
		$scope.idTaller = idTaller;
		$scope.consecutivoTaller = consecutivo;

		console.log($scope.idGrupo);
		console.log($scope.idTaller);
		console.log($scope.consecutivoTaller);

		$http.get($scope.rutaServidor + "gestion-empresarial/servicio-complementario/taller/" + $scope.idGrupo + "/" + $scope.idTaller + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaTaller" + $scope.consecutivoTaller).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('tallerBeneficiariosCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminartallerBeneficiarios = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('cerrarTalleresGrupoCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.cerrarTalleresGrupo = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

