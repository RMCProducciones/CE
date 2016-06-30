
app.controller('gestionDocumentoSoportePasantiaCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idPasantia = 0;
	$scope.idPasantiaSoporteActivo = 0;

	$scope.anularSoportePasantia = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/pasantia/" + $scope.idPasantia + "/documentos-soporte/" + $scope.idPasantiaSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionPasantiaCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idPasantia = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarPasantia = function(idPasantia, consecutivo){

		$scope.idPasantia = idPasantia;
		$scope.consecutivoPasantia = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/pasantia/" + $scope.idPasantia + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaPasantia" + $scope.consecutivoPasantia).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			
		});

		
	};	

}]);

app.controller('gestionGrupoPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoPasantia = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionOrganizacionPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarOrganizacionPasantia = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionGrupoBeneficiarioPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarGrupoBeneficiarioPasantia = function(ruta){

		window.location.replace(ruta);

	};	
}]);

app.controller('gestionTerritorioPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarTerritorioPasantia = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('FiltrosPasantiaCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPasantia = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPasantia = function(){
       
		$("#pasantiaFilter_nombre_pasantia").val("");
		$("#pasantiaFilter_observaciones").val("");
	


		

       
    }
      
		
}]);

app.controller('FiltrosPasantiaTerritorioCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPasantiaTerritorio = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPasantiaTerritorio = function(){
       
		
		$("#pasantiaTerritorioFilter_nombre_territorio").val("");
		

       
    }
      
		
}]);

app.controller('FiltrosPasantiaGrupoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPasantiaGrupo = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPasantiaGrupo = function(tipoUsuario){
       
		$scope.tipoUsuario = tipoUsuario;

    	if($scope.tipoUsuario == 1){
    		$("#pasantiaGrupoFilter_nombre").val("");
    	}else if($scope.tipoUsuario == 2){
    		$("#selMunicipio").val("");
			$("#pasantiaGrupoFilter_nombre").val("");
    	}else{
    		$("#selZona").val("");
    		$("#selDepartamento").val("");
    		$("#selMunicipio").val("");
			$("#pasantiaGrupoFilter_nombre").val("");
    	}

		//$("#pasantiaGrupoFilter_nombre").val("");
		

       
    }
      
		
}]);

app.controller('CampoAprobacionPasantiaCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#AprobacionPasantia_aprobacion').prop('checked')==false){		
		$scope.swAprobacion = false;	
		$('#swAprobacion').removeClass('checked');
	}
	else
	{
		$scope.swAprobacion = true;	
		$('#swAprobacion').addClass('checked');		
	}

	
	$scope.$watch('swAprobacion', function() {

		$('#AprobacionPasantia_aprobacion').prop('checked', $scope.swAprobacion);
		
	});
}]);


app.controller('FiltrosPasantiaOrganizacionCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasPasantiaOrganizacion = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaPasantiaOrganizacion = function(){
       
		$("#pasantiaOrganizacionFilter_nombre_organizacion").val("");
		$("#pasantiaOrganizacionFilter_tipo_producto").val("");
       
    }
      
		
}]);





