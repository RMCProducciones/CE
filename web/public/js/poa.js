app.controller('gestionDocumentoSoportePOACtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idPOA = 0;
	$scope.idPOASoporteActivo = 0;

	$scope.anularSoportePOA = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-administrativa/poa/" + $scope.idPOA + "/documentos-soporte/" + $scope.idPOASoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionPOACtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idPOA = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarPOA = function(idPOA, consecutivo){

		$scope.idPOA = idPOA;
		$scope.consecutivoPOA = consecutivo;

		$http.get($scope.rutaServidor + "gestion-administrativa/poa/" + $scope.idPOA + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaPOA" + $scope.consecutivoPOA).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);

app.controller('FiltrosPOACtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPOA = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPOA = function(){
       
		$("#poaFilter_anio").val("");
		$("#poaFilter_presupuesto").val("");
		
       
    }
      
		
}]);


