app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });


app.controller('rutaServidorCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.rutaServidor = $('#path').val();
	
}]);

app.controller('FiltrosCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

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

app.controller('MenuCtrl', ['$scope', '$http', function($scope, $http) {
	$scope.RPP = '';

	/*$http({
    	method  : 'GET',
    	url     : $scope.rutaServidor + "public/xml/menu.xml",
    	timeout : 10000,
    	params  : {},  // Query Parameters (GET)
    	transformResponse : function(data) {
        	// string -> XML document object
        	var x2js = new X2JS();
            var json = x2js.xml_str2json(data);

            return json;
    	}
	}).success(function(data, status, headers, config) {
    
		var array = data == null ? [] : (data.structure.component instanceof Array ? data.structure.component : [data.structure.component]);

		$scope.RPP = array;

		console.log($scope.RPP);
	
	}).error(function(data, status, headers, config) {
		console.log("Problemas al cargar la estructura del mapa de navegación de los usuarios");
    	//alert('Problemas a');
	});*/
}]);