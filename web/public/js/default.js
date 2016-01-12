app.constant('styleBuscarHerramientas', { dropdown: 'dropdown', dropup: 'dropup' });


app.controller('rutaServidorCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.rutaServidor = $('#path').val();
	$scope.elementPermiso = "inicioMenu";
	$scope.jsonPermiso = [];

	$scope.estadoMensaje = "success";
	$scope.mostrarMensaje = false;
	$scope.textoMensaje = ""


    $scope.mostrarMensaje = function(estadoMensaje, mostrarMensaje, textoMensaje){
		
		$scope.estadoMensaje = estadoMensaje;
		$scope.mostrarMensaje = mostrarMensaje;
		$scope.textoMensaje = textoMensaje;

    }

	
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
	
    $scope.limpiarCamposFiltroBusqueda = function(){
       

		$("#txtBuscar").val("");
		$("#selDepartamento").val("");
		$("#selZona").val("");
		$("#selMunicipio").val("");
		$("#lstEstado").val("");
       
    }
      
		
}]);

app.controller('PermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';

	$http({
    	method  : 'GET',
    	url     : $scope.rutaServidor + "public/xml/estructuraPermiso.xml",
    	timeout : 10000,
    	params  : {},  // Query Parameters (GET)
    	transformResponse : function(data) {
        	var x2js = new X2JS();
            var json = x2js.xml_str2json(data);

            return json;
    	}
	}).success(function(data, status, headers, config) {
    
		var array = data == null ? [] : (data.structure.component instanceof Array ? data.structure.component : [data.structure.component]);

		$scope.RPP = array;

	}).error(function(data, status, headers, config) {
		console.log("Problemas al cargar la estructura del mapa de navegación de los usuarios");
	});

	$scope.construirJsonPermisos = function(){
		
		/*
		"code":1,
		"level":3,
		"type":"Funcionalidad",
		"title":"Nuevo",
		"path":"#" 
		*/							

		var elementPermiso = {};
		var arrayComponent = [];

		//Para los componentes
		$.each($('.component'), function(idObjComponent, objComponent) {
		
			var elementComponent = {};
			var arrayModule = [];

			elementComponent.code = (idObjComponent + 1);

			//Para los módulos
			$.each($('.component .module-' + (idObjComponent+1)), function( idObjModule, objModule ) {

				var elementModule = {};
				var arraySubModule = [];

				elementModule.code = (idObjModule + 1);

				//Para los submódulos
				$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1)), function( idObjSubModule, objSubModule ) {

						var elementSubModule = {};
						var arrayAction = [];

						elementSubModule.code = (idObjSubModule + 1);

						//Para las funciones o acciones
						$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' .ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) ), function( idObjFuncionalidad, objFuncionalidad ) {

							var elementAction = {};

							elementAction.code = (idObjFuncionalidad + 1);
							elementAction.checked = $('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' #ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) + '-' + (idObjFuncionalidad+1))[0].checked;

							arrayAction.push(elementAction);

						});

						elementSubModule.action = arrayAction;
						arraySubModule.push(elementSubModule);

				});

				elementModule.subModule = arraySubModule;
				arrayModule.push(elementModule);
				

			});

			elementComponent.module = arrayModule;			
			arrayComponent.push(elementComponent);

		});

		elementPermiso.component = arrayComponent;

		$scope.elementPermiso = JSON.stringify(elementPermiso);

		//console.log($scope.elementPermiso);

    }	

}]);

app.controller('MenuCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.pruebaJsonMenu = '{"component":[{"code":1,"module":[{"code":1,"subModule":[{"code":1,"action":[{"code":1,"checked":true},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":2,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":3,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]}]},{"code":2,"subModule":[{"code":1,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":2,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":3,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]}]},{"code":3,"subModule":[{"code":1,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":2,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":3,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":4,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]},{"code":5,"action":[{"code":1,"checked":false},{"code":2,"checked":false},{"code":3,"checked":false},{"code":4,"checked":false}]}]}]}]}';
	$scope.pruebaJsonMenu = angular.fromJson($scope.pruebaJsonMenu);

	console.log($scope.pruebaJsonMenu);

    $scope.construirMenuUsuario = function(){

    }


}]);	
