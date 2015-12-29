app.controller('CamposDireccionCtrl', ['$scope', '$http', function($scope, $http) {
	
	
	if($('#grupo_rural').prop('checked')==false){
		
		$scope.swRural = false;	

		$('#swRural').removeClass('checked');

		$('#grupo_barrio').attr('required', 'required');
		$('#grupo_corregimiento').removeAttr('required');
		$('#grupo_vereda').removeAttr('required');
		$('#grupo_cacerio').removeAttr('required');
	}
	else
	{
		$scope.swRural = true;	

		$('#swRural').addClass('checked');

		$('#grupo_barrio').removeAttr('required');
		$('#grupo_corregimiento').attr('required', 'required');
		$('#grupo_vereda').attr('required', 'required');
		$('#grupo_cacerio').attr('required', 'required');
	}

	$scope.$watch('swRural', function() {
		$('#grupo_rural').prop('checked', $scope.swRural);
		
		if($scope.swRural == false)
		{
			$('#grupo_barrio').attr('required', 'required');
			$('#grupo_corregimiento').removeAttr('required');
			$('#grupo_vereda').removeAttr('required');
			$('#grupo_cacerio').removeAttr('required');
		}
		else
		{
			$('#grupo_barrio').removeAttr('required');
			$('#grupo_corregimiento').attr('required', 'required');
			$('#grupo_vereda').attr('required', 'required');
			$('#grupo_cacerio').attr('required', 'required');
		}		
	});
	
}]);

app.controller('ListasLocalizacionCtrl', ['$scope', '$http', '$location', '$parse', function($scope, $http, $location, $parse) {
	$scope.JSONDepartamento = [ ];
	$scope.JSONMunicipio    = [ ];
	$scope.JSONZona         = [ ];

	$scope.selDepartamento = 0;
	$scope.selMunicipio = 0;
	$scope.selZona = 0;

	$scope.idDepartamento = 0;
	$scope.idZona = 0;
	$scope.idMunicipio = 0;

	$scope.nuevoRegistro = false;
	$scope.cambioDepartamento = false;
	$scope.cambioZona = false;
	

	$scope.valoresInicialesLocalizacion = function(nuevoRegistro, idDepartamento, idZona, idMunicipio){

		$scope.nuevoRegistro = nuevoRegistro;

		if($scope.nuevoRegistro == false){
			$scope.idDepartamento = idDepartamento;
			$scope.idZona = idZona;
			$scope.idMunicipio = idMunicipio;
		}

	}

	obtenerDepartamento($http, $scope);
	
	$scope.cargarZonas = function() { 

		$scope.idDepartamento = $('#selDepartamento').val();
		$scope.cambioDepartamento = true;
		obtenerZona($http, $scope)		
	};

	$scope.cargarMunicipios = function() { 

		$scope.idZona = $('#selZona').val();
		$scope.cambioZona = true;
		obtenerMunicipio($http, $scope)
	};		

	$scope.cambiarMunicipio = function(){

		$scope.idMunicipio = $('#selMunicipio').val();
		$('.selMunicipio').val($scope.idMunicipio);
	}
	
}]);


function obtenerDepartamento($http, $scope){

	$http.get($scope.rutaServidor + "departamentos")
	.success(function(data) {

		var array = data == null ? [] : (data instanceof Array ? data : [data]);

		if($scope.nuevoRegistro == true){
			$scope.idDepartamento = array[0].id;
		}

		$scope.JSONDepartamento  = array;
		$scope.selDepartamento   = $scope.JSONDepartamento;

		obtenerZona($http, $scope);

	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerZona($http, $scope){

	$http.get($scope.rutaServidor + $scope.idDepartamento + "/zonas")
	.success(function(data) {
		
		var array = data == null ? [] : (data instanceof Array ? data : [data]);

		if($scope.nuevoRegistro == true || ($scope.cambioDepartamento == true || $scope.cambioZona == true)){
			$scope.idZona = array[0].id;
		}
		
		$scope.JSONZona  = array;
		$scope.selZona   = $scope.JSONZona;

		obtenerMunicipio($http, $scope);

	})
	.error(function(data) {
		console.log('Error: ' + data);
	});
}

function obtenerMunicipio($http, $scope){

	$http.get($scope.rutaServidor + $scope.idDepartamento + "/" + $scope.idZona + "/municipios")
	.success(function(data) {

		var array = data == null ? [] : (data instanceof Array ? data : [data]);

		if($scope.nuevoRegistro == true || ($scope.cambioDepartamento == true || $scope.cambioZona == true)){
			$scope.idMunicipio = array[0].id;
		}

		$scope.JSONMunicipio  = array;
		$scope.selMunicipio   = $scope.JSONMunicipio;

		$('.selMunicipio').val($scope.idMunicipio);
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}
