
app.controller('anularSoporteGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idGrupoSoporteActivo = 0;

	$scope.anularSoporteGrupo = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/grupos/" + $scope.idGrupo + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
	};	

}]);