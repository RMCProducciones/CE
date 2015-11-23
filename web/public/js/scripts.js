
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('aplicationCE', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });

app.controller('rutaServidorCtrl', ['$scope', '$http',function($scope, $http) {

	$scope.rutaServidor = $('#path').val();

}]);


app.controller('ListasLocalizacionCtrl', ['$scope', '$http',function($scope, $http) {
	$scope.JSONDepartamento = [ ];
	$scope.JSONMunicipio    = [ ];
	$scope.JSONZona         = [ ];
	
	obtenerDepartamento($http,$scope);
	
	$scope.cargarZonas = function() { 
		obtenerZona($http,$scope,$scope.selDepartamento)
		obtenerMunicipio($http,$scope,$scope.selDepartamento,$scope.selZona)
	};

	$scope.cargarMunicipios = function() { 
		obtenerMunicipio($http,$scope,$scope.selDepartamento,$scope.selZona)
	};
	
}]);

app.controller('FiltrosCtrl', ['$scope', '$http', 'styleBuscarHerramientas',function($scope, $http, styleBuscarHerramientas) {
	$scope.count = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
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
		
}]);

function obtenerDepartamento($http,$scope){
	
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

function obtenerZona($http,$scope,idDepartamento){

	if(Object.prototype.toString.call(idDepartamento) === "[object Array]") idDepartamento = 0;
	
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

function obtenerMunicipio($http,$scope, idDepartamento, idZona){
	
	if(Object.prototype.toString.call(idZona) === "[object Array]") idZona = 0;
	if(Object.prototype.toString.call(idDepartamento) === "[object Array]") idDepartamento = 0;
	
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