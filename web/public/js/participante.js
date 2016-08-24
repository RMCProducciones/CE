app.controller('FiltrosParticipanteCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	console.log("lkñsdjfñlkajsdfñkljsdañlkfjasdñ");
	
	$scope.buttonBuscarHerramientasParticipante = function(CountBuscarHerramientas){
		$scope.CountBuscarHerramientas = CountBuscarHerramientas * (-1);
		if($scope.CountBuscarHerramientas== -1)
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
		}
		else
		{
			$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropup;
		}
		
    }	
	
    $scope.limpiarCamposFiltroBusquedaParticipante = function(){
       
		$("#participanteFilter_numero_documento").val("");
		$("#participanteFilter_primer_nombre").val("");
		$("#participanteFilter_primer_apellido").val("");

		
       
    }
      
		
}]);

app.controller('gestionParticipanteCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.idParticipante = 0;	

	console.log($scope.estadoMensaje);

	$scope.eliminarParticipante = function(idParticipante, consecutivo){

		$scope.idParticipante = idParticipante;
		$scope.consecutivoGrupo = consecutivo;

		$http.get($scope.rutaServidor + "gestion-financiera/participante/" + $scope.idParticipante + "/eliminar")
		.success(function(data, status, headers, config) {

  			$("#filaParticipante" + $scope.consecutivoGrupo).fadeOut("slow");
			$scope.mostrarMensaje("success", true, "Registro Eliminado");

		
		}).error(function(data, status, headers, config) {

			//console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);


app.controller('CampoDesplazadoParticipanteCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#Participante_desplazado').prop('checked')==false){		
		$scope.swSabeLeer = false;	
		$('#swDesplazado').removeClass('checked');
	}
	else
	{
		$scope.swSabeLeer = true;	
		$('#swDesplazado').addClass('checked');		
	}

	
	$scope.$watch('swDesplazado', function() {

		$('#Participante_desplazado').prop('checked', $scope.swDesplazado);
		
	});
}]);

app.controller('informacionParticipanteCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#Participante_sabe_leer').prop('checked')==false){		
		$scope.swSabeLeer = false;	
		$('#swSabeLeer').removeClass('checked');
	}
	else
	{
		$scope.swSabeLeer = true;	
		$('#swSabeLeer').addClass('checked');		
	}

	
	$scope.$watch('swSabeLeer', function() {

		$('#Participante_sabe_leer').prop('checked', $scope.swSabeLeer);
		
	});

	if($('#Participante_sabe_escribir').prop('checked')==false){		
		$scope.swSabeEscribir = false;	
		$('#swSabeEscribir').removeClass('checked');
	}
	else
	{
		$scope.swSabeEscribir = true;	
		$('#swSabeEscribir').addClass('checked');		
	}

	
	$scope.$watch('swSabeEscribir', function() {

		$('#Participante_sabe_escribir').prop('checked', $scope.swSabeEscribir);
		
	});

}]);

app.controller('EdadParticipanteCtrl', ['$scope', function($scope) {

	$scope.calcularEdad = function() { 		
		$scope.fecha = new Date().toJSON().slice(0,10);
		$scope.añoIngresado = $('.fecha_nacimiento').val()[0]*1000 + $('.fecha_nacimiento').val()[1]*100 + $('.fecha_nacimiento').val()[2]*10 + $('.fecha_nacimiento').val()[3] * 1;
		$scope.añoSistema = $scope.fecha[0]*1000 + $scope.fecha[1]*100 + $scope.fecha[2]*10 +$scope.fecha[3] * 1;		
		$scope.mesIngresado = $('.fecha_nacimiento').val()[5]*10 + $('.fecha_nacimiento').val()[6]*1;
		$scope.mesSistema = $scope.fecha[5]*10 + $scope.fecha[6]*1;		
		$scope.diaIngresado = $('.fecha_nacimiento').val()[8]*10 + $('.fecha_nacimiento').val()[9]*1;
		$scope.diaSistema = $scope.fecha[8]*10 + $scope.fecha[9]*1;		
		console.log("si entra ?");
		if($scope.añoIngresado < $scope.añoSistema){			
			if($scope.mesIngresado > $scope.mesSistema){				
				$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado - 1);
			}else if($scope.mesIngresado == $scope.mesSistema){
				if($scope.diaIngresado > $scope.diaSistema){
					$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado - 1);		
				}else{
					$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado);
				}
			}else{
				$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado);
			}			
		}else{
			$("#Participante_edad_inscripcion").val('Edad no permitida');
		}		

	};	

}]);

app.controller('EdadParticipanteEditarCtrl', ['$scope', function($scope) {	

	$scope.añoSistema = 0;
	$scope.mesSistema = 0;
	$scope.diaSistema = 0;
	$scope.cargarFechaCreacion = function(añoCreacion, mesCreacion, diaCreacion, edadInscripcion) { 					
		$scope.añoSistema = añoCreacion;
		$scope.mesSistema = mesCreacion;
		$scope.diaSistema = diaCreacion;				
	}

	$scope.cargarFechaNacimiento = function(añoNacimiento, mesNacimiento, diaNacimiento) { 			
		$scope.fechaNacimientoEditar = new Date(añoNacimiento, mesNacimiento - 1, diaNacimiento);
	}

	$scope.calcularEdadEditar = function() { 		
		console.log($scope.añoSistema);
		console.log($scope.mesSistema);
		console.log($scope.diaSistema);						
		$scope.añoIngresado = $('.fecha_nacimiento').val()[0]*1000 + $('.fecha_nacimiento').val()[1]*100 + $('.fecha_nacimiento').val()[2]*10 + $('.fecha_nacimiento').val()[3] * 1;		
		$scope.mesIngresado = $('.fecha_nacimiento').val()[5]*10 + $('.fecha_nacimiento').val()[6]*1;		
		$scope.diaIngresado = $('.fecha_nacimiento').val()[8]*10 + $('.fecha_nacimiento').val()[9]*1;
		console.log($scope.añoIngresado);
		console.log($scope.mesIngresado);
		console.log($scope.diaIngresado);
		if($scope.añoIngresado < $scope.añoSistema){			
			if($scope.mesIngresado > $scope.mesSistema){				
				$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado - 1);
				console.log($("#Participante_edad_inscripcion").val());
			}else if($scope.mesIngresado == $scope.mesSistema){
				if($scope.diaIngresado > $scope.diaSistema){
					$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado - 1);		
					console.log($("#Participante_edad_inscripcion").val());
				}else{
					$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado);
					console.log($("#Participante_edad_inscripcion").val());
				}
			}else{
				$("#Participante_edad_inscripcion").val($scope.añoSistema - $scope.añoIngresado);
				console.log($("#Participante_edad_inscripcion").val());
			}			
		}else{
			$("#Participante_edad_inscripcion").val('Edad no permitida');
			console.log($("#Participante_edad_inscripcion").val());
		}		

	};

}]);