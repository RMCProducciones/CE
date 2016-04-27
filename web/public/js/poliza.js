
app.controller('gestionDocumentoSoportePolizaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idPoliza = 0;
	$scope.idPolizaSoporteActivo = 0;

	$scope.anularSoportePoliza = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-financiera/poliza/" + $scope.idPoliza + "/documentos-soporte/" + $scope.idPolizaSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionPolizaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idPoliza = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarPoliza= function(idPoliza, consecutivo){

		$scope.idPoliza = idPoliza;
		$scope.consecutivoPoliza = consecutivo;

		$http.get($scope.rutaServidor + "gestion-financiera/poliza/" + $scope.idPoliza + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaPoliza" + $scope.consecutivoPoliza).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);


app.controller('FiltrosPolizaCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPoliza = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPoliza = function(){
       
		$("#ahorroFilter_estado").val("");
		$("#ahorroFilter_consecutivo").val("");
		$("#ahorroFilter_cofinanciacion").val("");

		
       
    }
      
		
}]);

