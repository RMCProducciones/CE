
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('aplicationCE', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });

app.controller('buscarHerramientasCtrl', ['$scope', '$http', 'styleBuscarHerramientas',function($scope, $http, styleBuscarHerramientas) {
	$scope.count = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;

	$scope.JSONDepartamento = [ ];
	$scope.JSONMunicipio    = [ ];
	$scope.JSONZona         = [ ];

	obtenerDepartamento($http,$scope);
	obtenerZona($http,$scope);
	
	$scope.buttonBuscarHerramientas = function(count){
		$scope.count = count * (-1);
		if($scope.count== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }
	
	$scope.cargarMunicipios = function() { 
		obtenerMunicipio($http,$scope,$scope.selDepartamento,$scope.selZona)
	};
	
		
}]);

function obtenerDepartamento($http,$scope){
	$http.get("http://localhost/rmc/ce/web/departamentos")
	.success(function(data) {
		var array = data == null ? [] : (data.departamentos instanceof Array ? data.departamentos : [data.departamentos]);
		$scope.JSONDepartamento  = array;
		$scope.selDepartamento   = $scope.JSONDepartamento;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerZona($http,$scope){
	$http.get("http://localhost/rmc/ce/web/zonas")
	.success(function(data) {
		var array = data == null ? [] : (data.zonas instanceof Array ? data.zonas : [data.zonas]);
		$scope.JSONZona  = array;
		$scope.selZona   = $scope.JSONZona;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}

function obtenerMunicipio($http,$scope, idDepartamento, idZona){
	
	if(Object.prototype.toString.call(idZona) === "[object Array]") idZona = 0;
	if(Object.prototype.toString.call(idDepartamento) === "[object Array]") idDepartamento = 0;
	
	$http.get("http://localhost/rmc/ce/web/" + idDepartamento + "/" + idZona + "/municipios")
	.success(function(data) {
		var array = data == null ? [] : (data.municipios instanceof Array ? data.municipios : [data.municipios]);
		$scope.JSONMunicipio  = array;
		$scope.selMunicipio   = $scope.JSONMunicipio;
	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    
}