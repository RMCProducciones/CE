app.controller('gestionDocumentoSoporteBeneficiarioCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idBeneficiario = 0;
	$scope.idBeneficiarioSoporteActivo = 0;

	$scope.anularSoporteBeneficiario = function() { 

		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/beneficiarios/" + $scope.idBeneficiario + "/documentos-soporte/" + $scope.idBeneficiarioSoporteActivo + "/borrar");
		
	};


}]);



app.controller('PertenenciaEtnicaCtrl', ['$scope', function($scope) {

	$scope.mostrarGrupoIndigena = false;	
	$scope.grupoIndigena = function() { 
		$scope.mostrarGrupoIndigena = $(".pertenencia_etnica option[value='"+$('.pertenencia_etnica').val()+"']").text().toLowerCase() == "indígena";			
	};	

}]);



app.controller('EstadoCivilCtrl', ['$scope', function($scope) {

	$scope.mostrarConyuge = false;

	if($('#estado_civil').prop('checked')==false){

		$('#mostrarConyuge').removeClass('checked');

		$('#tipo_documento_conyugue').attr('required', 'required');
		$('#numero_documento_conyugue').removeAttr('required');
		$('#primer_apellido_conyugue').removeAttr('required');
		$('#segundo_apellido_conyugue').removeAttr('required');
		$('#primer_nombre_conyugue').removeAttr('required');
		$('#segundo_nombre_conyugue').removeAttr('required');
		$('#telefono_fijo_conyugue').removeAttr('required');
		$('#telefono_celular_conyugue').removeAttr('required');
	}
	else
	{
		$scope.mostrarConyuge = false;

		$('#mostrarConyuge').addClass('checked');
	    $('#tipo_documento_conyugue').attr('required', 'required');
		$('#numero_documento_conyugue').removeAttr('required');
		$('#primer_apellido_conyugue').removeAttr('required');
		$('#segundo_apellido_conyugue').removeAttr('required');
		$('#primer_nombre_conyugue').removeAttr('required');
		$('#segundo_nombre_conyugue').removeAttr('required');
		$('#telefono_fijo_conyugue').removeAttr('required');
		$('#telefono_celular_conyugue').removeAttr('required');
	}

	
	$scope.datosConyuge = function() { 
		$scope.mostrarConyuge = $(".estado_civil option[value='"+$('.estado_civil').val()+"']").text().toLowerCase() == "casado"||$(".estado_civil option[value='"+$('.estado_civil').val()+"']").text().toLowerCase() =="unión libre";			
	};	

}]);

app.controller('gestionBeneficiariosCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idBeneficiario = 0;	
	$scope.idGrupo = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarBeneficiario = function(idBeneficiario,idGrupo,consecutivo){

		$scope.idBeneficiario = idBeneficiario;
		$scope.idGrupo = idGrupo;		
		$scope.consecutivoBeneficiario = consecutivo;
		console.log($scope.idGrupo);
		$http.get($scope.rutaServidor + "gestion-empresarial/desarrollo-empresarial/grupos/" + $scope.idGrupo + "/" + $scope.idBeneficiario + "/beneficiarios/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaBeneficiario" + $scope.consecutivoBeneficiario).fadeOut("slow");
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

app.controller('CamposDireccionBeneficiarioCtrl', ['$scope', '$http', function($scope, $http) {

	if($('#beneficiario_rural').prop('checked')==false){
		
		$scope.swRural = false;	

		$('#swRural').removeClass('checked');

		$('#beneficiario_barrio').attr('required', 'required');
		$('#beneficiario_corregimiento').removeAttr('required');
		$('#beneficiario_vereda').removeAttr('required');
		$('#beneficiario_cacerio').removeAttr('required');
	}
	else
	{
		$scope.swRural = true;	

		$('#swRural').addClass('checked');

		$('#beneficiario_barrio').removeAttr('required');
		$('#beneficiario_corregimiento').attr('required', 'required');
		$('#beneficiario_vereda').attr('required', 'required');
		$('#beneficiario_cacerio').attr('required', 'required');
	}

	$scope.$watch('swRural', function() {

		$('#beneficiario_rural').prop('checked', $scope.swRural);
		
		if($scope.swRural == false)
		{
			$('#beneficiario_barrio').attr('required', 'required');
			$('#beneficiario_corregimiento').removeAttr('required');
			$('#beneficiario_vereda').removeAttr('required');
			$('#beneficiario_cacerio').removeAttr('required');
		}
		else
		{
			$('#beneficiario_barrio').removeAttr('required');
			$('#beneficiario_corregimiento').attr('required', 'required');
			$('#beneficiario_vereda').attr('required', 'required');
			$('#beneficiario_cacerio').attr('required', 'required');
		}		
	});

}]);

app.controller('CamposDesplazadoBeneficiarioCtrl', ['$scope', '$http', function($scope, $http) {	
	

	if($('#beneficiario_desplazado').prop('checked')==false){
		
		$scope.swDesplazado = false;	
		$('#swDesplazado').removeClass('checked');
	}
	else
	{
		$scope.swDesplazado = true;	
		$('#swDesplazado').addClass('checked');		
	}

	$scope.$watch('swDesplazado', function() {

		$('#beneficiario_desplazado').prop('checked', $scope.swDesplazado);
		
	});
}]);

app.controller('CamposBeneficiarioCtrl', ['$scope', '$http', function($scope, $http) {	
	

	if($('#beneficiario_red_unidos').prop('checked')==false){
		
		$scope.swRedUnidos = false;	
		$('#swRedUnidos').removeClass('checked');
	}
	else
	{
		$scope.swRedUnidos = true;	
		$('#swRedUnidos').addClass('checked');		
	}

	$scope.$watch('swRedUnidos', function() {

		$('#beneficiario_red_unidos').prop('checked', $scope.swRedUnidos);
		
	});

	if($('#beneficiario_sabe_leer').prop('checked')==false){
		
		$scope.swSabeLeer = false;	
		$('#swSabeLeer').removeClass('checked');
	}
	else
	{
		$scope.swSabeLeer = true;	
		$('#swSabeLeer').addClass('checked');		
	}

	$scope.$watch('swSabeLeer', function() {

		$('#beneficiario_sabe_leer').prop('checked', $scope.swSabeLeer);
		
	});

	if($('#beneficiario_sabe_escribir').prop('checked')==false){
		
		$scope.swSabeEscribir = false;	
		$('#swSabeEscribir').removeClass('checked');
	}
	else
	{
		$scope.swSabeEscribir = true;	
		$('#swSabeEscribir').addClass('checked');		
	}

	$scope.$watch('swSabeEscribir', function() {

		$('#beneficiario_sabe_escribir').prop('checked', $scope.swSabeEscribir);
		
	});
}]);