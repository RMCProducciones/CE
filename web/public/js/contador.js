
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

app.controller('FiltrosContadorCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasContador = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaContador = function(){
       
		$("#contadorFilter_numero_documento").val("");
		$("#contadorFilter_primer_apellido").val("");
		$("#contadorFilter_primer_nombre").val("");
		$("#contadorFilter_genero").val("");	
		$("#contadorFilter_numero_tarjeta").val("");	


		

       
    }
      
		
}]);

app.controller('FiltrosContadorAsignacionCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasContadorAsignacion = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaContadorAsignacion = function(){
       
		$("#contadorAsignacionFilter_numero_documento").val("");
		$("#contadorAsignacionFilter_primer_apellido").val("");
		$("#contadorAsignacionFilter_primer_nombre").val("");
		


		

       
    }
      
		
}]);




