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

app.controller('AsignarPermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';
	$scope.RPPActual = '';

	obtenerRPPXml($http, $scope);

	$scope.construirJsonPermisos = function(){
		
		/*
		"code":1,
		"level":3,
		"type":"Funcionalidad",
		"title":"Nuevo",
		"path":"#" 
		*/							

		var elementComponentChecked = false;
		var elementModuleChecked = false;
		var elementSubModuleChecked = false;

		var elementPermiso = {};
		var arrayComponent = [];

		//Para los componentes
		$.each($('.component'), function(idObjComponent, objComponent) {
		
			var elementComponent = {};
			var arrayModule = [];

			elementComponentChecked = false;

			elementComponent.id = (idObjComponent + 1);
			elementComponent.code = $(objComponent).attr("component-code");
			elementComponent.path = $(objComponent).attr("component-path");
			elementComponent.title = $(objComponent).attr("component-title");

			//Para los módulos
			$.each($('.component .module-' + (idObjComponent+1)), function( idObjModule, objModule ) {

				var elementModule = {};
				var arraySubModule = [];

				elementModuleChecked = false;

				elementModule.id = (idObjModule + 1);
				elementModule.code = $(objModule).attr("module-code");
				elementModule.path = $(objModule).attr("module-path");
				elementModule.title = $(objModule).attr("module-title");

				//Para los submódulos
				$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1)), function( idObjSubModule, objSubModule ) {

					var elementSubModule = {};
					var arrayAction = [];

					elementSubModuleChecked = false;

					elementSubModule.id = (idObjSubModule + 1);
					elementSubModule.code = $(objSubModule).attr("submodule-code");
					elementSubModule.path = $(objSubModule).attr("submodule-path");
					elementSubModule.title = $(objSubModule).attr("submodule-title");

					//Para las funciones o acciones
					$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' .ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) ), function( idObjFuncionalidad, objFuncionalidad ) {

						var elementAction = {};

						elementAction.id = (idObjFuncionalidad + 1);
						elementAction.checked = $('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' #ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) + '-' + (idObjFuncionalidad+1))[0].checked;

						if(elementAction.checked){

							elementComponentChecked = true;
							elementModuleChecked = true;
							elementSubModuleChecked = true;

						}

						arrayAction.push(elementAction);

					});

					elementSubModule.checked = elementSubModuleChecked;
					elementSubModule.action = arrayAction;
					arraySubModule.push(elementSubModule);

				});

				elementModule.checked = elementModuleChecked;
				elementModule.subModule = arraySubModule;
				arrayModule.push(elementModule);
				

			});

			elementComponent.checked = elementComponentChecked;
			elementComponent.module = arrayModule;			
			arrayComponent.push(elementComponent);

		});

		elementPermiso.component = arrayComponent;

		$scope.elementPermiso = JSON.stringify(elementPermiso);

		//console.log($scope.elementPermiso);

    }	

}]);


app.controller('AsignarPermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';

	obtenerRPP($http, $scope);

	$scope.construirJsonPermisos = function(){
		construirJsonPermisos($scope);
    }	

}]);


app.controller('EditarPermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';
	$scope.RPPActual = '';

	obtenerRPP($http, $scope);
	obtenerRPPActual($http, $scope, 1);

	$scope.construirJsonPermisos = function(){
		construirJsonPermisos($scope);
    }	

}]);


function construirJsonPermisos($scope){


/*
		"code":1,
		"level":3,
		"type":"Funcionalidad",
		"title":"Nuevo",
		"path":"#" 
		*/							

		var elementComponentChecked = false;
		var elementModuleChecked = false;
		var elementSubModuleChecked = false;

		var elementPermiso = {};
		var arrayComponent = [];

		//Para los componentes
		$.each($('.component'), function(idObjComponent, objComponent) {
		
			var elementComponent = {};
			var arrayModule = [];

			elementComponentChecked = false;

			elementComponent.id = (idObjComponent + 1);
			elementComponent.code = $(objComponent).attr("component-code");
			elementComponent.path = $(objComponent).attr("component-path");
			elementComponent.title = $(objComponent).attr("component-title");

			//Para los módulos
			$.each($('.component .module-' + (idObjComponent+1)), function( idObjModule, objModule ) {

				var elementModule = {};
				var arraySubModule = [];

				elementModuleChecked = false;

				elementModule.id = (idObjModule + 1);
				elementModule.code = $(objModule).attr("module-code");
				elementModule.path = $(objModule).attr("module-path");
				elementModule.title = $(objModule).attr("module-title");

				//Para los submódulos
				$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1)), function( idObjSubModule, objSubModule ) {

					var elementSubModule = {};
					var arrayAction = [];

					elementSubModuleChecked = false;

					elementSubModule.id = (idObjSubModule + 1);
					elementSubModule.code = $(objSubModule).attr("submodule-code");
					elementSubModule.path = $(objSubModule).attr("submodule-path");
					elementSubModule.title = $(objSubModule).attr("submodule-title");

					//Para las funciones o acciones
					$.each($('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' .ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) ), function( idObjFuncionalidad, objFuncionalidad ) {

						var elementAction = {};

						elementAction.id = (idObjFuncionalidad + 1);
						elementAction.checked = $('.component .module-' + (idObjComponent+1) + ' .submodule-' + (idObjComponent+1) + '-' + (idObjModule+1) + ' #ckPermiso-' + (idObjComponent+1) + '-' + (idObjModule+1) + '-' + (idObjSubModule+1) + '-' + (idObjFuncionalidad+1))[0].checked;

						if(elementAction.checked){

							elementComponentChecked = true;
							elementModuleChecked = true;
							elementSubModuleChecked = true;

						}

						arrayAction.push(elementAction);

					});

					elementSubModule.checked = elementSubModuleChecked;
					elementSubModule.action = arrayAction;
					arraySubModule.push(elementSubModule);

				});

				elementModule.checked = elementModuleChecked;
				elementModule.subModule = arraySubModule;
				arrayModule.push(elementModule);
				

			});

			elementComponent.checked = elementComponentChecked;
			elementComponent.module = arrayModule;			
			arrayComponent.push(elementComponent);

		});

		elementPermiso.component = arrayComponent;

		$scope.elementPermiso = JSON.stringify(elementPermiso);

		console.log($scope.elementPermiso);

}

function obtenerRPP($http, $scope){

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

}

function obtenerRPPActual($http, $scope, idUsuario){

	$http.get($scope.rutaServidor + "/backend/permiso-rol/obtener/" + idUsuario)
	.success(function(data) {

		var array = data == null ? [] : (data instanceof Array ? data : [data]);

		$scope.RPPActual = array;

		console.log($scope.RPPActual);

	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    

}
