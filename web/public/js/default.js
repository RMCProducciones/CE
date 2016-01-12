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

			elementComponent.id = (idObjComponent + 1);
			elementComponent.code = $(objComponent).attr("component-code");
			elementComponent.path = $(objComponent).attr("component-path");
			elementComponent.title = $(objComponent).attr("component-title");

			//Para los módulos
			$.each($('.component .module-' + (idObjComponent+1)), function( idObjModule, objModule ) {

				var elementModule = {};
				var arraySubModule = [];

				elementModule.id = (idObjModule + 1);
				elementModule.code = $(objModule).attr("module-code");
				elementModule.path = $(objModule).attr("module-path");
				elementModule.title = $(objModule).attr("module-title");

				//Para los submódulos
				$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1)), function( idObjSubModule, objSubModule ) {

						var elementSubModule = {};
						var arrayAction = [];

						elementSubModule.id = (idObjSubModule + 1);
						elementSubModule.code = $(objSubModule).attr("submodule-code");
						elementSubModule.path = $(objSubModule).attr("submodule-path");
						elementSubModule.title = $(objSubModule).attr("submodule-title");

						//Para las funciones o acciones
						$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' .ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) ), function( idObjFuncionalidad, objFuncionalidad ) {

							var elementAction = {};

							elementAction.id = (idObjFuncionalidad + 1);
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

		console.log($scope.elementPermiso);

    }	

}]);

app.controller('MenuCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.pruebaJsonMenu = '{"component":[{"id":1,"code":"1","path":"#","title":"Gestion Empresarial","module":[{"id":1,"code":"1","path":"#","title":"Formacion de capital social asociativo y desarrollo empresarial","subModule":[{"id":1,"code":"1","path":"/gestion-empresarial/desarrollo-empresarial/grupos/","title":"Gestión de Grupos","action":[{"id":1,"checked":true},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"CLEARGestion","title":"Gestión de CLEAR","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestión de seguimiento y monitoreo","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":2,"code":"2","path":"#","title":"Concursos de mejoramiento","subModule":[{"id":1,"code":"1","path":"concursoGestion","title":"Gestion de Concursos","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Gestion de Jurados","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Gestion de seguimiento y monitoreo","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]},{"id":3,"code":"3","path":"#","title":"Servicios complementarios","subModule":[{"id":1,"code":"1","path":"#","title":"Participación rutas y pasantias","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":2,"code":"2","path":"#","title":"Participación en talleres","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":3,"code":"3","path":"#","title":"Participación en Ferias","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":4,"code":"4","path":"#","title":"Participación en ferias de difusión del proyecto","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]},{"id":5,"code":"5","path":"#","title":"Desarrollo de ferias de difusión del proyecto","action":[{"id":1,"checked":false},{"id":2,"checked":false},{"id":3,"checked":false},{"id":4,"checked":false}]}]}]}]}';
	$scope.pruebaJsonMenu = angular.fromJson($scope.pruebaJsonMenu);

	console.log($scope.pruebaJsonMenu);

    $scope.construirMenuUsuario = function(){

    }

}]);	
