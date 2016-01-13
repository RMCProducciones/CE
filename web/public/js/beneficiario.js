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

