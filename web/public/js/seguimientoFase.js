app.controller('CierreFaseCtrl', ['$scope', function($scope) {

	$scope.camposRequeridos = function(valorInicial) {

		console.log("ingreso: " + valorInicial);

		if(!valorInicial){
			$('#resultado_componente_organizacional').attr('required', 'required');
			$('#seguimientofase_resultado_componente_productivo').attr('required', 'required');
			$('#seguimientofase_resultado_componente_comercial').attr('required', 'required');
			$('#seguimientofase_resultado_componente_administrativo').attr('required', 'required');
			$('#seguimientofase_resultado_componente_financiero').attr('required', 'required');
			$('#seguimientofase_observaciones').attr('required', 'required');
			$('#seguimientofase_logros').attr('required', 'required');
			$('#seguimientofase_fecha_finalizacion').attr('required', 'required');
		}


	}		
	
}]);

app.controller('CierreMotCtrl', ['$scope', function($scope) {

	$scope.camposRequeridosMot = function(valorInicial) {

		console.log("ingreso: " + valorInicial);

		if(!valorInicial){
			$('#seguimientomot_indentificacion_recursos_tangibles').attr('required', 'required');
			$('#seguimientomot_indentificacion_recursos_financieros').attr('required', 'required');
			$('#seguimientomot_indentificacion_recursos_intangibles').attr('required', 'required');
			$('#seguimientomot_indentificacion_opciones_viables').attr('required', 'required');
			$('#seguimientomot_viabilidad_negocio').attr('required', 'required');
			$('#seguimientomot_observaciones').attr('required', 'required');
			$('#seguimientomot_fecha_finalizacion').attr('required', 'required');
		}


	}		
	
}]);