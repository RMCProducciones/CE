
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('aplicationCE', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });

app.controller('buscarHerramientasCtrl', ['$scope', 'styleBuscarHerramientas',function($scope, styleBuscarHerramientas) {
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

/*
function FiltroBusquedaCrtl($scope, $http) {
 
	$scope.JSONDepartamento = [ ];
    $scope.JSONMunicipio    = [ ];
    $scope.JSONZona         = [ ];

    obtenerDepartamento($http,$scope);

	//// EVENTO QUE GENERA BOTON LIMPIAR
	//$scope.limpiar = function() {
	//	limpiarForm($scope);
	//};

	//// EVENTO QUE GENERA LA DIRECTIVA ng-change
	//$scope.mostrarPistos = function() { 
	//	// $scope.selCategorias NOS TRAE EL VALOR DEL SELECT DE CATEGORIAS
	//	obtenerPistos($http,$scope,$scope.selCategorias)
	//};

} 
*/

/*
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
*/
 

/*app.controller('lstDepartamentoFiltro', ['$scope', '$http', function($scope, $http) {
    $http.get("http://localhost/rmc/ce/web/departamentos")
	.success(function (response) {$scope.departamentosFiltro = response});
	
	$scope.departamento = 0;
	
	$scope.cargarMunicipioFiltro = function(departamento){
		$scope.departamento = departamento;
	}
	
}]);

app.controller('lstMunicipioFiltro', ['lstDepartamentoFiltro', function($scope, $http) {
    $http.get("http://ce.local/app_dev.php/" + $scope.departamento + "/municipios").success(function (response) {$scope.municipiosFiltro = response});
}]);
*/		
