app.controller('gestionDocumentoSoporteConcursoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idConcurso = 0;
	$scope.idConcursoSoporteActivo = 0;

	$scope.anularSoporteConcurso = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/concurso/" + $scope.idConcurso + "/documentos-soporte/" + $scope.idConcursoSoporteActivo + "/borrar");
		
	};


}]);







app.controller('gestionConcursoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idConcurso = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarConcurso = function(idConcurso, consecutivo){

		$scope.idConcurso = idConcurso;
		$scope.consecutivoConcurso = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/concurso/" + $scope.idConcurso + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaConcurso" + $scope.consecutivoConcurso).fadeOut("slow");
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


app.controller('gestionGrupoConcursoCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoConcurso = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('FiltrosConcursoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasConcurso = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaConcurso = function(){
       
		$("#concursoFilter_tipo").val("");
		$("#concursoFilter_modalidad").val("");
		$("#concursoFilter_tematica").val("");
			


		

       
    }
      
		
}]);

app.controller('FiltrosConcursoGrupoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasConcursoGrupo = function(CountBuscarHerramientas){
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

    $scope.tipoUsuario = 0;	
	
    $scope.limpiarCamposFiltroBusquedaConcursoGrupo = function(tipoUsuario){
       
		$scope.tipoUsuario = tipoUsuario;

    	if($scope.tipoUsuario == 1){
    		$("#concursoGrupoFilter_nombre").val("");
    	}
    	if($scope.tipoUsuario == 2){
    		$("#selMunicipio").val("");
			$("#concursoGrupoFilter_nombre").val("");
    	}

		/*$("#concursoGrupoFilter_nombre").val("");
		$("#selDepartamento").val("");
		$("#selMunicipio").val("");
		$("#selZona").val("");*/


       
    }
      
		
}]);

app.controller('FiltrosConcursoIntegranteCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasConcursoIntegrante = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaConcursoIntegrante = function(){
       
		
		$("#concursoIntegranteFilter_primer_nombre").val("");
		$("#concursoIntegranteFilter_primer_apellido").val("");
		$("#concursoIntegranteFilter_numero_documento").val("");


		


       
    }
      
		
}]);

app.controller('CampoAprobacionConcursoCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#AprobacionConcurso_aprobacion').prop('checked')==false){		
		$scope.swAprobacion = false;	
		$('#swAprobacion').removeClass('checked');
	}
	else
	{
		$scope.swAprobacion = true;	
		$('#swAprobacion').addClass('checked');		
	}

	
	$scope.$watch('swAprobacion', function() {

		$('#AprobacionConcurso_aprobacion').prop('checked', $scope.swAprobacion);
		
	});
}]);




