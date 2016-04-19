app.controller('CampoCambioPresupuestoCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_cambios_presupuesto_asignado').prop('checked')==false){
		
		$scope.swCambiosPresupuestoAsignado = false;	
		$('#swCambiosPresupuestoAsignado').removeClass('checked');
		
		$('#visita_observaciones_presupuesto_asignado').removeAttr('required');
		$('#visita_cambios_razones_presupuesto_asignado').removeAttr('required');		
	}
	else
	{
		$scope.swCambiosPresupuestoAsignado = true;	
		$('#swCambiosPresupuestoAsignado').addClass('checked');		

		$('#visita_observaciones_presupuesto_asignado').attr('required', 'required');
		$('#visita_cambios_razones_presupuesto_asignado').attr('required', 'required');
			
	}

	$scope.$watch('swCambiosPresupuestoAsignado', function() {

		$('#visita_cambios_presupuesto_asignado').prop('checked', $scope.swCambiosPresupuestoAsignado);
		
	});	

}]);

app.controller('CampoCambioIntegranteCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_cambios_integrantes_grupo').prop('checked')==false){
		
		$scope.swCambiosIntegrantesGrupo = false;	
		$('#swCambiosIntegrantesGrupo').removeClass('checked');

		$('#visita_cambios_razones_integrantes_grupo').removeAttr('required');
	}
	else
	{
		$scope.swCambiosIntegrantesGrupo = true;	
		$('#swCambiosIntegrantesGrupo').addClass('checked');

		$('#visita_cambios_razones_integrantes_grupo').attr('required', 'required');		
	}

	$scope.$watch('swCambiosIntegrantesGrupo', function() {

		$('#visita_cambios_integrantes_grupo').prop('checked', $scope.swCambiosIntegrantesGrupo);
		
	});
}]);

app.controller('CampoInterventoriaCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_interventoria').prop('checked')==false){
		
		$scope.swInterventoria = false;	
		$('#swInterventoria').removeClass('checked');

		$('#visita_razones_interventoria').removeAttr('required');
	}
	else
	{
		$scope.swInterventoria = true;	
		$('#swInterventoria').addClass('checked');

		$('#visita_razones_interventoria').attr('required', 'required');		
	}

	$scope.$watch('swInterventoria', function() {

		$('#visita_interventoria').prop('checked', $scope.swInterventoria);
		
	});
}]);

app.controller('gestionBeneficiariosVisitaCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioVisita = function(ruta){		
		window.location.replace(ruta);

	};	
}]);
