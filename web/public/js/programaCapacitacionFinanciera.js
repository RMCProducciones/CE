
app.controller('gestionDocumentoSoporteProgramaCapacitacionFinancieraCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idProgramaCapacitacionFinanciera = 0;
	$scope.idProgramaCapacitacionFinancieraSoporteActivo = 0;

	$scope.anularSoporteProgramaCapacitacionFinanciera = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-financiera/capacitacion-financiera/" + $scope.idProgramaCapacitacionFinanciera + "/documentos-soporte/" + $scope.idProgramaCapacitacionFinancieraSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionProgramaCapacitacionFinancieraCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idProgramaCapacitacionFinanciera = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarProgramaCapacitacionFinanciera= function(idProgramaCapacitacionFinanciera, consecutivo){

		$scope.idProgramaCapacitacionFinanciera = idProgramaCapacitacionFinanciera;
		$scope.consecutivoProgramaCapacitacionFinanciera = consecutivo;

		$http.get($scope.rutaServidor + "gestion-financiera/programa-capacitacion-financiera/" + $scope.idProgramaCapacitacionFinanciera + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaProgramaCapacitacionFinanciera" + $scope.consecutivoProgramaCapacitacionFinanciera).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('FiltrosProgramaCapacitacionFinancieraCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasProgramaCapacitacionFinanciera = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaProgramaCapacitacionFinanciera = function(){
       
		
		$("#selMunicipio").val("");
		$("#programaCapacitacionFinancieraGestion_lugar").val("");
		$("#programaCapacitacionFinancieraGestion_talento_financiero").val("");
		$("#programaCapacitacionFinancieraGestion_estado").val("");


       
    }
      
		
}]);

app.controller('gestionBeneficiarioPCFCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioPCF = function(ruta){		
		window.location.replace(ruta);

	};	
}]);


app.controller('gestionParticipantePCFCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarParticipantePCF = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionBeneficiarioRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioRuta = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('FiltrosRutaFinancieraCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasRutaFinanciera = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaRutaFinanciera = function(){
       
		
		


       
    }
      
		
}]);

app.controller('FiltrosBeneficiarioPCFCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasBeneficiarioPCF = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaBeneficiarioPCF = function(){
       
		
		


       
    }
      
		
}]);

