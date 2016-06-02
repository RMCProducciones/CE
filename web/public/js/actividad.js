
app.controller('gestionDocumentoSoporteActividadCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idActividad = 0;
	$scope.idActividadSoporteActivo = 0;

	$scope.anularSoporteActividad = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/concurso/actividad/" + $scope.idActividad + "/documentos-soporte/" + $scope.idActividadSoporteActivo + "/borrar");
		
	};


}]);

app.controller('gestionActividadCtrl', ['$scope', '$http', function($scope, $http) {

	console.log("Cargo gestionActividadCtrl");

	$scope.idActividad = 0;	

	//console.log($scope.estadoMensaje);

	$scope.eliminarActividad = function(idActividad, consecutivo){

		$scope.idActividad= idActividad;
		$scope.consecutivoActividad = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/concurso/actividad/" + $scope.idActividad + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaActividad" + $scope.consecutivoActividad).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

	};	

}]);

app.controller('FiltrosActividadCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasActividad = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaActividad = function(){

       
		$("#actividadFilter_actividad").val("");
		$("#actividadFilter_mejoras").val("");
		$("#actividadFilter_duracion").val("");

				
       
    }
      
		
}]);




