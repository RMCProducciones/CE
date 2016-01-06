app.controller('GrupoIndigenaCtrl', ['$scope', function($scope) {

	$scope.mostrarPertenenciaEtnica = false;
	var valorPertenenciaEtnica = "";
	$scope.pertenenciaEtnica = function() { 
		$scope.mostrarPertenenciaEtnica = $(".grupo_indigena option[value='"+$('.grupo_indigena').val()+"']").text().toLowerCase() == "indígena";			
	};	

}]);

