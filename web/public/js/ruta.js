
app.controller('gestionDocumentoSoporteRutaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idRuta = 0;
	$scope.idRutaSoporteActivo = 0;

	$scope.anularSoporteRuta = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/ruta/" + $scope.idRuta + "/documentos-soporte/" + $scope.idRutaSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionRutaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idRuta = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarRuta = function(idRuta, consecutivo){

		$scope.idRuta = idRuta;
		$scope.consecutivoRuta = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/ruta/" + $scope.idRuta + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaRuta" + $scope.consecutivoRuta).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('gestionGrupoRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoRuta = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionOrganizacionRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarOrganizacionRuta = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionGrupoBeneficiarioRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoBeneficiarioRuta = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionTerritorioRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarTerritorioRuta = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('asignarOrganizacionRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.habilitarAsignarOrganizacion = function(id, idRuta){		

		$scope.idBoton = id;
		$scope.idRuta = idRuta;

		//if(#ruta_territorio)

		console.log($scope.idBoton);
		console.log($scope.idRuta);

	};	
}]);



app.controller('FiltrosRutaCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasRuta = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaRuta = function(){
       
		$("#rutaFilter_nombre_ruta").val("");
		$("#rutaFilter_observaciones").val("");
	


		

       
    }
      
		
}]);

app.controller('FiltrosRutaTerritorioCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasRutaTerritorio = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaRutaTerritorio = function(){
       
		
		$("#rutaTerritorioFilter_nombre_territorio").val("");
		

       
    }
      
		
}]);

app.controller('FiltrosRutaGrupoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasRutaGrupo = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaRutaGrupo = function(tipoUsuario){

    	$scope.tipoUsuario = tipoUsuario;

    	if($scope.tipoUsuario == 1){
    		$("#rutaGrupoFilter_nombre").val("");
    	}else if($scope.tipoUsuario == 2){
    		$("#selMunicipio").val("");
			$("#rutaGrupoFilter_nombre").val("");
    	}else{
    		$("#selZona").val("");
    		$("#selDepartamento").val("");    		
    		$("#selMunicipio").val("");
    		$("#rutaGrupoFilter_nombre").val("");
    	}
    	   
		
		//$("#rutaGrupoFilter_nombre").val("");
		

       
    }
      
		
}]);

app.controller('CampoAprobacionRutaCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#AprobacionRuta_aprobacion').prop('checked')==false){		
		$scope.swAprobacion = false;	
		$('#swAprobacion').removeClass('checked');
	}
	else
	{
		$scope.swAprobacion = true;	
		$('#swAprobacion').addClass('checked');		
	}

	
	$scope.$watch('swAprobacion', function() {

		$('#AprobacionRuta_aprobacion').prop('checked', $scope.swAprobacion);
		
	});
}]);