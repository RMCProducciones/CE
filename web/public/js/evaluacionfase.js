app.controller('gestionDocumentoSoporteEvaluacionFaseCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idEvaluacionFase = 0;
	$scope.idEvaluacionFaseSoporteActivo = 0;

	$scope.anularSoporteEvaluacionFase = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/evaluacionfase/" + $scope.idEvaluacionFase + "/documentos-soporte/" + $scope.idEvaluacionFaseSoporteActivo + "/borrar");
		
	};


}]);



app.controller('CamposEvaluacionFaseCtrl', ['$scope', '$http', function($scope, $http) {	
	

	if($('#evaluacionfase_aprobado').prop('checked')==false){
		
		$scope.swCalificacion = false;	
		$('#swCalificacion').removeClass('checked');
	}
	else
	{
		$scope.swCalificacion = true;	
		$('#swCalificacion').addClass('checked');		
	}

	$scope.$watch('swCalificacion', function() {

		$('#evaluacionfase_aprobado').prop('checked', $scope.swCalificacion);
		
	});
	}]);