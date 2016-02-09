
var app = angular.module('aplicationCE', ['ngRoute', 'ngResource', 'mwl.confirm', 'uiSwitch'])
.config(
	function($interpolateProvider){
    	$interpolateProvider.startSymbol('[[').endSymbol(']]');
    },
	function($locationProvider){
    	$locationProvider.html5Mode(true).hashPrefix('!');
    }
);


app.controller('DiagnosticoOrganizacionCtrl', ['$scope', function($scope) {

	$scope.seleccionarProductivaA = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaA').val(valorRespuesta);
	};	

	$scope.seleccionarProductivaB = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaB').val(valorRespuesta);
	};	


	$scope.seleccionarProductivaC = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaC').val(valorRespuesta);
	};	
	$scope.seleccionarProductivaD = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaD').val(valorRespuesta);
	};
	$scope.seleccionarProductivaE = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaE').val(valorRespuesta);
	};
	$scope.seleccionarProductivaF = function(valorRespuesta) { 
		$('#diagramaorganizacional_productivaF').val(valorRespuesta);
	};


	$scope.seleccionarComercialA = function(valorRespuesta) { 
		$('#diagramaorganizacional_comercialA').val(valorRespuesta);
	};	

	$scope.seleccionarComercialB = function(valorRespuesta) { 
		$('#diagramaorganizacional_comercialB').val(valorRespuesta);
	};	
	$scope.seleccionarComercialC = function(valorRespuesta) { 
		$('#diagramaorganizacional_comercialC').val(valorRespuesta);
	};	
	$scope.seleccionarComercialD = function(valorRespuesta) { 
		$('#diagramaorganizacional_comercialD').val(valorRespuesta);
	};
	$scope.seleccionarComercialE = function(valorRespuesta) { 
		$('#diagramaorganizacional_comercialE').val(valorRespuesta);
	};


	$scope.seleccionarFinancieraA = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraA').val(valorRespuesta);
	};	

	$scope.seleccionarFinancieraB = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraB').val(valorRespuesta);
	};	
	$scope.seleccionarFinancieraC = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraC').val(valorRespuesta);
	};	
	$scope.seleccionarFinancieraD = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraD').val(valorRespuesta);
	};
	$scope.seleccionarFinancieraE = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraE').val(valorRespuesta);
	};
	$scope.seleccionarFinancieraF = function(valorRespuesta) { 
		$('#diagramaorganizacional_financieraF').val(valorRespuesta);
	};


$scope.seleccionarAdministrativaA = function(valorRespuesta) { 
		$('#diagramaorganizacional_administrativaA').val(valorRespuesta);
	};	

	$scope.seleccionarAdministrativaB = function(valorRespuesta) { 
		$('#diagramaorganizacional_administrativaB').val(valorRespuesta);
	};	
	$scope.seleccionarAdministrativaC = function(valorRespuesta) { 
		$('#diagramaorganizacional_administrativaC').val(valorRespuesta);
	};	
	$scope.seleccionarAdministrativaD = function(valorRespuesta) { 
		$('#diagramaorganizacional_administrativaD').val(valorRespuesta);
	};
	$scope.seleccionarAdministrativaE = function(valorRespuesta) { 
		$('#diagramaorganizacional_administrativaE').val(valorRespuesta);
	};


$scope.seleccionarOrganizacionalA = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalA').val(valorRespuesta);
	};	

	$scope.seleccionarOrganizacionalB = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalB').val(valorRespuesta);
	};	
	$scope.seleccionarOrganizacionalC = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalC').val(valorRespuesta);
	};	
	$scope.seleccionarOrganizacionalD = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalD').val(valorRespuesta);
	};
	$scope.seleccionarOrganizacionalE = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalE').val(valorRespuesta);
	};
	$scope.seleccionarOrganizacionalF = function(valorRespuesta) { 
		$('#diagramaorganizacional_organizacionalF').val(valorRespuesta);
	};





}]);
