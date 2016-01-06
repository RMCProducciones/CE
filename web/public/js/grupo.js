
app.controller('anularSoporteGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idGrupoSoporteActivo = 0;

	$scope.anularSoporteGrupo = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/grupos/" + $scope.idGrupo + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
	};	

}]);

app.controller('datosEmpresaGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.numeroIdentificacion = 0;
	$scope.digitoVerificacion = 0;

	$scope.calcularDigitoVerificacion = function() { 
	
		var arregloPA = [71, 67, 59, 53, 47, 43, 41, 37, 29, 23, 19, 17 , 13, 7, 3];
		var vpr, x, y, z, i, nit, dv;
		
		nit= $scope.numeroIdentificacion;
		
		vpr = new Array(16); 

		vpr[1]=3;
		vpr[2]=7;
		vpr[3]=13; 
		vpr[4]=17;
		vpr[5]=19;
		vpr[6]=23;
		vpr[7]=29;
		vpr[8]=37;
		vpr[9]=41;
		vpr[10]=43;
		vpr[11]=47;  
		vpr[12]=53;  
		vpr[13]=59; 
		vpr[14]=67; 
		vpr[15]=71;

		x=0 ; y=0 ; z=nit.length ;

		for(i=0 ; i<z ; i++)
		{ 
			y=(nit.substr(i,1));
			x+=(y*vpr[z-i]);
		} 
		
		y=x%11
		
		if (y > 1)
		{
			dv=11-y;
		} 
		else 
		{
			dv=y;
		}
		
		$scope.digitoVerificacion=dv;
		
	};	

}]);

/*app.controller('GrupoCtrl', ['$scope', function($scope) {

	$scope.idGrupo = 0;	

	$scope.traerGrupoXID = function(idGrupo){
		$scope.idGrupo = idGrupo;
		alert($scope.idGrupo);
		
	};	

}]);*/

