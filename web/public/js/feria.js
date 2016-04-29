app.controller('gestionDocumentoSoporteFeriaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idFeria = 0;
	$scope.idFeriaSoporteActivo = 0;

	$scope.anularSoporteFeria = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/servicio-complementario/feria/" + $scope.idFeria + "/documentos-soporte/" + $scope.idFeriaSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionFeriaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idFeria = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarFeria = function(idFeria, consecutivo){

		$scope.idFeria = idFeria;
		$scope.consecutivoFeria = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/servicio-complementario/feria/" + $scope.idFeria + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaFeria" + $scope.consecutivoFeria).fadeOut("slow");
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

app.controller('FiltrosFeriaCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasFeria = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaFeria = function(){
       
		
		$("#selMunicipio").val("");
		$("#feriaFilter_lugar").val("");
		$("#feriaFilter_nombre").val("");


       
    }
      
		
}]);

app.controller('CampoAprobacionFeriaCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#AprobacionFeria_aprobacion').prop('checked')==false){		
		$scope.swAprobacion = false;	
		$('#swAprobacion').removeClass('checked');
	}
	else
	{
		$scope.swAprobacion = true;	
		$('#swAprobacion').addClass('checked');		
	}

	
	$scope.$watch('swAprobacion', function() {

		$('#AprobacionFeria_aprobacion').prop('checked', $scope.swAprobacion);
		
	});
}]);

