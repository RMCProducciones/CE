app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });


app.controller('rutaServidorCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.rutaServidor = $('#path').val();
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

app.controller('FiltrosCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientas = function(CountBuscarHerramientas){
		$scope.CountBuscarHerramientas = CountBuscarHerramientas * (-1);
		if($scope.CountBuscarHerramientas== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }	
	
    $scope.limpiarCamposFiltroBusqueda = function(){
       

		$("#txtBuscar").val("");
		$("#selDepartamento").val("");
		$("#selZona").val("");
		$("#selMunicipio").val("");
		$("#lstEstado").val("");
       
    }
      
		
}]);
