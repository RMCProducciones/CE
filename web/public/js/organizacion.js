
app.controller('gestionDocumentoSoporteOrganizacionCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idOrganizacion = 0;
	$scope.idOrganizacionSoporteActivo = 0;

	$scope.anularSoporteOrganizacion = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/organizacion/" + $scope.idOrganizacion + "/documentos-soporte/" + $scope.idOrganizacionSoporteActivo + "/borrar");
		
	};


}]);


app.controller('gestionOrganizacionCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idOrganizacion = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarOrganizacion = function(idOrganizacion, consecutivo){

		$scope.idOrganizacion = idOrganizacion;
		$scope.consecutivoOrganizacion = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/organizacion/" + $scope.idOrganizacion + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaOrganizacion" + $scope.consecutivoOrganizacion).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			
		});

		
	};	

}]);

app.controller('CamposDireccionOrganizacionCtrl', ['$scope', '$http', function($scope, $http) {

	if($('#organizacion_rural').prop('checked')==false){
		
		$scope.swRural = false;	

		$('#swRural').removeClass('checked');

		$('#organizacion_barrio').attr('required', 'required');
		$('#organizacion_corregimiento').removeAttr('required');
		$('#organizacion_vereda').removeAttr('required');
		$('#organizacion_cacerio').removeAttr('required');
	}
	else
	{
		$scope.swRural = true;	

		$('#swRural').addClass('checked');

		$('#organizacion_barrio').removeAttr('required');
		$('#organizacion_corregimiento').attr('required', 'required');
		$('#organizacion_vereda').attr('required', 'required');
		$('#organizacion_cacerio').attr('required', 'required');
	}

	$scope.$watch('swRural', function() {

		$('#organizacion_rural').prop('checked', $scope.swRural);
		
		if($scope.swRural == false)
		{
			$('#organizacion_barrio').attr('required', 'required');
			$('#organizacion_corregimiento').removeAttr('required');
			$('#organizacion_vereda').removeAttr('required');
			$('#organizacion_cacerio').removeAttr('required');
		}
		else
		{
			$('#organizacion_barrio').removeAttr('required');
			$('#organizacion_corregimiento').attr('required', 'required');
			$('#organizacion_vereda').attr('required', 'required');
			$('#organizacion_cacerio').attr('required', 'required');
		}		
	});

}]);

app.controller('CamposRutalPasantiaOrganizacionCtrl', ['$scope', '$http', function($scope, $http) {	
	

	if($('#organizacion_ruta').prop('checked')==false){
		
		$scope.swRuta = false;	
		$('#swRuta').removeClass('checked');
	}
	else
	{
		$scope.swRuta = true;	
		$('#swRuta').addClass('checked');		
	}

	$scope.$watch('swRuta', function() {

		$('#organizacion_ruta').prop('checked', $scope.swRuta);
		
	});

	if($('#organizacion_pasantia').prop('checked')==false){
		
		$scope.swPasantia = false;	
		$('#swPasantia').removeClass('checked');
	}
	else
	{
		$scope.swPasantia = true;	
		$('#swPasantia').addClass('checked');		
	}

	$scope.$watch('swPasantia', function() {

		$('#organizacion_pasantia').prop('checked', $scope.swPasantia);
		
	});
	
}]);


app.controller('gestionTerritorioAprendizajeOrganizacionCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarTerritorioAprendizajeOrganizacion = function(ruta){

		window.location.replace(ruta);

	};	
}]);

