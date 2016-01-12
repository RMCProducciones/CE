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

