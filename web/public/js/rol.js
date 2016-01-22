
app.controller('FiltrosRolCtrl', ['$scope', '$http', function($scope, $http) {

}]);


app.controller('gestionRolCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idRol = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarRol = function(idRol, consecutivo){

		$scope.idRol = idRol;
		$scope.consecutivoGrupo = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/grupo/" + $scope.idGrupo + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaRol" + $scope.consecutivoGrupo).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

		});

		
	};	

}]);

app.controller('AsignarPermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';
	$scope.AsignarPermiso = true;

	$scope.initRol = function(idRol){
	    $scope.idRol = idRol;
		obtenerRPP($http, $scope, $scope.idRol);
	};

	$scope.construirJsonPermisos = function(){
		construirJsonPermisos($scope);
    }	

}]);

app.controller('EditarPermisoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.RPP = '';
	$scope.RPPActual = '';

	$scope.AsignarPermiso = false;

	$scope.initRol = function(idRol){
	    $scope.idRol = idRol;
		obtenerRPP($http, $scope, $scope.idRol);
	};

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

		$('#rol_permiso').val($scope.elementPermiso);

}

function obtenerRPP($http, $scope, idRol){

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

		construirJsonPermisos($scope);

		if ($scope.AsignarPermiso == false){
			cargarRPPActual($http, $scope, idRol) //Debe pasarse el idUsuario
		}

	}).error(function(data, status, headers, config) {
		console.log("Problemas al cargar la estructura del mapa de navegación de los usuarios");
	});

}

function cargarRPPActual($http, $scope, idRol){

	$http.get($scope.rutaServidor + "backend/rol/obtener/" + idRol)
	.success(function(data) {

		var array = data == null ? [] : (data instanceof Array ? data : [data]);

		$scope.RPPActual = array;

		//Para los componentes
		$.each( $scope.RPPActual, function( idObjComponent, objComponent ) {
  			
  			//Para los módulos
  			$.each( objComponent.component[idObjComponent].module, function( idObjModule, objModule ) {

  				//Para los submódulos
	  			$.each( objModule.subModule, function( idObjSubModule, objSubModule ) {
	
	  				//Para las acciones
		  			$.each( objSubModule.action, function( idObjAction, objAction ) {
		  				//console.log(objAction);

		  				if ( $('#ckPermiso-'+objComponent.component[idObjComponent].id+'-'+objModule.id+'-'+objSubModule.id+'-'+objAction.id+'').length ) {
  							
  							if(objAction.checked == true){
  								$('#ckPermiso-'+objComponent.component[idObjComponent].id+'-'+objModule.id+'-'+objSubModule.id+'-'+objAction.id+'').prop('checked', true);
  							}
  							
						}

		  			});

	  			});

  			});

		});

		construirJsonPermisos($scope);

	})
	.error(function(data) {
		console.log('Error: ' + data);
	});    

}
