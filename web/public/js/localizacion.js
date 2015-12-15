app.controller('ListasLocalizacionCtrl', ['$scope', '$http', function($scope, $http) {
	$scope.JSONDepartamento = [ ];
	$scope.JSONMunicipio    = [ ];
	$scope.JSONZona         = [ ];
	
	obtenerDepartamento($http, $scope);
	
	$scope.cargarZonas = function() { 
		obtenerZona($http,$scope,$scope.selDepartamento)		
	};

	$scope.cargarMunicipios = function() { 
		obtenerMunicipio($http,$scope,$scope.selDepartamento,$scope.selZona)
	};
	
}]);

app.controller('CamposDireccionCtrl', ['$scope', '$http', function($scope, $http) {
	
	$('#grupo_barrio').attr('required', 'required');
	$('#grupo_corregimiento').removeAttr('required');
	$('#grupo_vereda').removeAttr('required');
	$('#grupo_cacerio').removeAttr('required');

	$scope.swRural = false;	
	
	$scope.$watch('swRural', function() {
		$('#grupo_rural').prop('checked', $scope.swRural);
		
		if($scope.swRural == false)
		{
			$('#grupo_barrio').attr('required', 'required');
			$('#grupo_corregimiento').removeAttr('required');
			$('#grupo_vereda').removeAttr('required');
			$('#grupo_cacerio').removeAttr('required');

			$('#grupo_barrio').val('');
			$('#grupo_corregimiento').val('');
			$('#grupo_vereda').val('');
			$('#grupo_cacerio').val('');
		}
		else
		{
			$('#grupo_barrio').removeAttr('required');
			$('#grupo_corregimiento').attr('required', 'required');
			$('#grupo_vereda').attr('required', 'required');
			$('#grupo_cacerio').attr('required', 'required');
		
			$('#grupo_barrio').val('');
			$('#grupo_corregimiento').val('');
			$('#grupo_vereda').val('');
			$('#grupo_cacerio').val('');
		}		
	});
	
	$scope.mostrarCamposRural = function(){
		
		
    }		
}]);

function obtenerDepartamento($http, $scope){
	
	$http.get($scope.rutaServidor + "departamentos")
	.success(function(data) {
		var array = data == null ? [] : (data.departamentos instanceof Array ? data.departamentos : [data.departamentos]);
		$scope.JSONDepartamento  = array;
		$scope.selDepartamento   = $scope.JSONDepartamento;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerZona($http,$scope,lstDepartamento){

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

function obtenerMunicipio($http,$scope, lstDepartamento, lstZona){
	
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
