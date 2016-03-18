
app.controller('gestionDocumentoSoporteContadorCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idContador = 0;
	$scope.idContadorSoporteActivo = 0;

	$scope.anularSoporteContador = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/contador/" + $scope.idContador + "/documentos-soporte/" + $scope.idContadorSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionContadorCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idContador = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarContador = function(idContador, consecutivo){
		
		$scope.idContador = idContador;
		$scope.consecutivoContador = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/contador/" + $scope.idContador + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaContador" + $scope.consecutivoContador).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('gestionContadorGrupoCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarContadorGrupo = function(ruta){		
		window.location.replace(ruta);

	};	
}]);




