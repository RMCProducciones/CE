
app.controller('gestionDocumentoSoportePasantiaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idPasantia = 0;
	$scope.idPasantiaSoporteActivo = 0;

	$scope.anularSoportePasantia = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/pasantia/" + $scope.idPasantia + "/documentos-soporte/" + $scope.idPasantiaSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionPasantiaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idPasantia = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarPasantia = function(idPasantia, consecutivo){

		$scope.idPasantia = idPasantia;
		$scope.consecutivoPasantia = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/pasantia/" + $scope.idPasantia + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaPasantia" + $scope.consecutivoPasantia).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			
		});

		
	};	

}]);

app.controller('gestionGrupoPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoPasantia = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionOrganizacionPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarOrganizacionPasantia = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionGrupoBeneficiarioPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoBeneficiarioPasantia = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionTerritorioPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarTerritorioPasantia = function(ruta){		
		window.location.replace(ruta);

	};	
}]);




