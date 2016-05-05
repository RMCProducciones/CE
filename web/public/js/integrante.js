app.controller('gestionIntegranteComiteCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idIntegrante = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarIntegranteComite = function(idIntegrante, consecutivo){

		$scope.idIntegrante = idIntegrante;
		$scope.consecutivoIntegrante = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/integrante/" + $scope.idIntegrante + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaIntegrante" + $scope.consecutivoIntegrante).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			//console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())			
		});

		
	};	

}]);


app.controller('gestionDocumentoSoporteIntegranteComiteCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idIntegrante = 0;
	$scope.idIntegranteSoporteActivo = 0;

	$scope.anularSoporteIntegranteComite = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/integrante/" + $scope.idIntegrante + "/documentos-soporte/" + $scope.idIntegranteSoporteActivo + "/borrar");
		
	};	



}]);

app.controller('FiltrosIntegranteCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasIntegrante = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaIntegrante = function(){

       
		$("#integranteFilter_numero_documento").val("");
		$("#integranteFilter_primer_apellido").val("");
		$("#integranteFilter_primer_nombre").val("");			
       
    }
      
		
}]);
