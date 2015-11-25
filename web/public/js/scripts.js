
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('aplicationCE', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });

app.controller('rutaServidorCtrl', ['$scope', '$http',function($scope, $http) {

	$scope.rutaServidor = $('#path').val();

}]);

app.controller('FiltrosCtrl', ['$scope', '$http', 'styleBuscarHerramientas',function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientas = function(CountBuscarHerramientas){
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
		
}]);

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
	$scope.CountCamposRural = -1;
	
	$('#grupo_barrio').attr('required', 'required');
	$('#grupo_corregimiento').removeAttr('required');
	$('#grupo_vereda').removeAttr('required');
	$('#grupo_cacerio').removeAttr('required');

	$scope.mostrarCamposRural = function(CountCamposRural){
		
		$scope.CountCamposRural = CountCamposRural * (-1);	
		
		if($scope.CountCamposRural== -1)
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