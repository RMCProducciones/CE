app.controller('PertenenciaEtnicaCtrl', ['$scope', function($scope) {

	$scope.mostrarGrupoIndigena = false;
	
	$scope.grupoIndigena = function() { 
		$scope.mostrarGrupoIndigena = $(".pertenencia_etnica option[value='"+$('.pertenencia_etnica').val()+"']").text().toLowerCase() == "indígena";			
	};	

}]);

