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
			$('#seguimientofase_fecha_finalizacion').attr('required', 'required');
		}


	}		
	
}]);