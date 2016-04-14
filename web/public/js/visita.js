app.controller('CampoCambioPresupuestoCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_cambios_presupuesto_asignado').prop('checked')==false){
		
		$scope.swCambiosPresupuestoAsignado = false;	
		$('#swCambiosPresupuestoAsignado').removeClass('checked');
	}
	else
	{
		$scope.swCambiosPresupuestoAsignado = true;	
		$('#swCambiosPresupuestoAsignado').addClass('checked');		
	}

	$scope.$watch('swCambiosPresupuestoAsignado', function() {

		$('#visita_cambios_presupuesto_asignado').prop('checked', $scope.swCambiosPresupuestoAsignado);
		
	});
}]);

app.controller('CampoCambioIntegranteCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_cambios_integrantes_grupo').prop('checked')==false){
		
		$scope.swCambiosIntegrantesGrupo = false;	
		$('#swCambiosIntegrantesGrupo').removeClass('checked');
	}
	else
	{
		$scope.swCambiosIntegrantesGrupo = true;	
		$('#swCambiosIntegrantesGrupo').addClass('checked');		
	}

	$scope.$watch('swCambiosIntegrantesGrupo', function() {

		$('#visita_cambios_integrantes_grupo').prop('checked', $scope.swCambiosIntegrantesGrupo);
		
	});
}]);

app.controller('CampoInterventoriaCtrl', ['$scope', '$http', function($scope, $http) {		


	if($('#visita_interventoria').prop('checked')==false){
		
		$scope.swInterventoria = false;	
		$('#swInterventoria').removeClass('checked');
	}
	else
	{
		$scope.swInterventoria = true;	
		$('#swInterventoria').addClass('checked');		
	}

	$scope.$watch('swInterventoria', function() {

		$('#visita_interventoria').prop('checked', $scope.swInterventoria);
		
	});
}]);