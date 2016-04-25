app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });


app.controller('rutaServidorCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.rutaServidor = $('#path').val();
	console.log ($scope.rutaServidor);
	$scope.elementPermiso = "inicioMenu";
	$scope.jsonPermiso = [];

	$scope.estadoMensaje = "success";
	$scope.mostrarMensaje = false;
	$scope.textoMensaje = ""


    $scope.mostrarMensaje = function(estadoMensaje, mostrarMensaje, textoMensaje){
		
		$scope.estadoMensaje = estadoMensaje;
		$scope.mostrarMensaje = mostrarMensaje;
		$scope.textoMensaje = textoMensaje;

    }

	
}]);


