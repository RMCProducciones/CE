
$('[data-toggle=confirmation]').confirmation();

var app = angular.module('aplicationCE', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });

app.controller('buttonBuscarHerramientas', ['$scope', 'styleBuscarHerramientas',function($scope, styleBuscarHerramientas) {
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
			