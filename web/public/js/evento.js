app.controller('gestionDocumentoSoporteEventoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idEvento = 0;
	$scope.idEventoSoporteActivo = 0;

	$scope.anularSoporteEvento = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-conocimiento/evento/" + $scope.idEvento + "/documentos-soporte/" + $scope.idEventoSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionEventoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idEvento = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarEvento = function(idEvento, consecutivo){

		$scope.idEvento = idEvento;
		$scope.consecutivoEvento = consecutivo;

		$http.get($scope.rutaServidor + "gestion-conocimiento/evento/" + $scope.idEvento + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaEvento" + $scope.consecutivoEvento).fadeOut("slow");
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

app.controller('FiltrosEventoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasEvento = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaEvento = function(){
       
		
		$("#selMunicipio").val("");
		$("#eventoFilter_organizador").val("");
		$("#eventoFilter_nombre").val("");
		$("#eventoFilter_tipo").val("");



       
    }
      
		
}]);



