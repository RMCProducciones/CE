app.controller('PertenenciaEtnicaCtrl', ['$scope', function($scope) {

<<<<<<< HEAD
	$scope.mostrarPertenenciaEtnica = false;

	$scope.pertenenciaEtnica = function() { 
		$scope.mostrarPertenenciaEtnica = $(".grupo_indigena option[value='"+$('.grupo_indigena').val()+"']").text().toLowerCase() == "dujo";			
=======
	$scope.mostrarGrupoIndigena = false;
	
	$scope.grupoIndigena = function() { 
		$scope.mostrarGrupoIndigena = $(".pertenencia_etnica option[value='"+$('.pertenencia_etnica').val()+"']").text().toLowerCase() == "indígena";			
>>>>>>> f24c10d45c4c0905687bbf62c95584285efb757d
	};	

}]);

