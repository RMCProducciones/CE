app.controller('BeneficiarioAhorroOtroProgramaCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#asignacionBeneficiarioAhorro_beneficiario_ahorro_otro_programa').prop('checked')==false){		
		$scope.swBeneficiarioAhorro = false;	
		$('#swBeneficiarioAhorro').removeClass('checked');
	}
	else
	{
		$scope.swBeneficiarioAhorro = true;	
		$('#swBeneficiarioAhorro').addClass('checked');		
	}

	
	$scope.$watch('swBeneficiarioAhorro', function() {

		$('#asignacionBeneficiarioAhorro_beneficiario_ahorro_otro_programa').prop('checked', $scope.swBeneficiarioAhorro);
		
	});
}]);