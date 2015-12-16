app.controller('ListasLocalizacionCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
	$scope.JSONDepartamento = [ ];
	$scope.JSONMunicipio    = [ ];
	$scope.JSONZona         = [ ];
	$scope.idMunicipioSeleccionado = 0;
	
	if($location.absUrl().indexOf("editar") >= 0 || $location.absUrl().indexOf("nuevo") >= 0 )
	{
		if($location.absUrl().indexOf("editar") >= 0){
			$scope.idMunicipioSeleccionado = $('#grupo_municipio').val();	
		}	
	}

	obtenerDepartamento($http, $scope);
	
	$scope.cargarZonas = function() { 
		obtenerZona($http, $scope, $scope.selDepartamento)		
	};

	$scope.cargarMunicipios = function() { 
		obtenerMunicipio($http, $scope, $scope.selDepartamento, $scope.selZona)
	};
	
}]);

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

function obtenerDepartamento($http, $scope){
	
	$http.get($scope.rutaServidor + "departamentos")
	.success(function(data) {
		var array = data == null ? [] : (data.departamentos instanceof Array ? data.departamentos : [data.departamentos]);
		$scope.JSONDepartamento  = array;
		$scope.selDepartamento   = $scope.JSONDepartamento;

		//alert($scope.idMunicipioSeleccionado);
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerZona($http, $scope, lstDepartamento){

	var idDepartamento = 0
	if(!(Object.prototype.toString.call(lstDepartamento) === "[object Array]")) idDepartamento = lstDepartamento.id;
	
	$http.get($scope.rutaServidor + idDepartamento + "/zonas")
	.success(function(data) {
		var array = data == null ? [] : (data.zonas instanceof Array ? data.zonas : [data.zonas]);
		$scope.JSONZona  = array;
		$scope.selZona   = $scope.JSONZona;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerMunicipio($http, $scope, lstDepartamento, lstZona){
	
	var idDepartamento = 0;
	var idZona = 0;
	
	if(!(Object.prototype.toString.call(lstDepartamento) === "[object Array]")) idDepartamento = lstDepartamento.id;
	if(!(Object.prototype.toString.call(lstZona) === "[object Array]")) idZona = lstZona.id;
	
	$http.get($scope.rutaServidor  + idDepartamento + "/" + idZona + "/municipios")
	.success(function(data) {
		var array = data == null ? [] : (data.municipios instanceof Array ? data.municipios : [data.municipios]);
		$scope.JSONMunicipio  = array;
		$scope.selMunicipio   = $scope.JSONMunicipio;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}
