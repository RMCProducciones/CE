app.controller('CamposDireccionGrupoCtrl', ['$scope', '$http', function($scope, $http) {

	if($('#grupo_rural').prop('checked')==false){
		
		$scope.swRural = false;	

		$('#swRural').removeClass('checked');

		$('#grupo_barrio').attr('required', 'required');
		$('#grupo_corregimiento').removeAttr('required');
		$('#grupo_vereda').removeAttr('required');
		$('#grupo_cacerio').removeAttr('required');
	}
	else
	{
		$scope.swRural = true;	

		$('#swRural').addClass('checked');

		$('#grupo_barrio').removeAttr('required');
		$('#grupo_corregimiento').attr('required', 'required');
		$('#grupo_vereda').attr('required', 'required');
		$('#grupo_cacerio').attr('required', 'required');
	}

	$scope.$watch('swRural', function() {

		$('#grupo_rural').prop('checked', $scope.swRural);
		
		if($scope.swRural == false)
		{
			$('#grupo_barrio').attr('required', 'required');
			$('#grupo_corregimiento').removeAttr('required');
			$('#grupo_vereda').removeAttr('required');
			$('#grupo_cacerio').removeAttr('required');
		}
		else
		{
			$('#grupo_barrio').removeAttr('required');
			$('#grupo_corregimiento').attr('required', 'required');
			$('#grupo_vereda').attr('required', 'required');
			$('#grupo_cacerio').attr('required', 'required');
		}		
	});


	
}]);

app.controller('gestionDocumentoSoporteGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idGrupoSoporteActivo = 0;

	$scope.anularSoporteGrupo = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/grupos/" + $scope.idGrupo + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
	};	



}]);

app.controller('datosEmpresaGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.numeroIdentificacion = 0;
	$scope.digitoVerificacion = 0;

	$scope.iniciarNIT = function(numeroIdentificacion, digitoVerificacion) { 

		$scope.numeroIdentificacion = numeroIdentificacion;
		$scope.digitoVerificacion = digitoVerificacion;

	};	

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

app.controller('gestionGrupoCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idGrupo = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarGrupo = function(idGrupo, consecutivo){

		$scope.idGrupo = idGrupo;
		$scope.consecutivoGrupo = consecutivo;

		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/grupo/" + $scope.idGrupo + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaGrupo" + $scope.consecutivoGrupo).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);

