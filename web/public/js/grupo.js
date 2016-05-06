app.controller('CamposDireccionGrupoCtrl', ['$scope', '$http', function($scope, $http) {
	
		
	if($('#grupo_rural').prop('checked')==false){		
		$scope.swRural = false;	
		$('#swRural').removeClass('checked');
	}
	else
	{
		$scope.swRural = true;	
		$('#swRural').addClass('checked');		
	}

	
	$scope.$watch('swRural', function() {

		$('#grupo_rural').prop('checked', $scope.swRural);
		
	});
}]);

app.controller('gestionDocumentoSoporteGrupoCtrl', ['$scope', '$location', function($scope, $location) {

	$scope.idGrupo = 0;
	$scope.idGrupoSoporteActivo = 0;

	$scope.anularSoporteGrupo = function() { 
	
		window.location.replace($scope.rutaServidor  + "gestion-empresarial/desarrollo-empresarial/grupo/" + $scope.idGrupo + "/documentos-soporte/" + $scope.idGrupoSoporteActivo + "/borrar");
		
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

			//console.log($(data).filter("title").html());

			$scope.mostrarMensaje("warning", true, $(data).filter("title").html());

			//if($(data).filter("title").html())



			/*<title>    An exception occurred while executing &#039;DELETE FROM grupo WHERE id = ?&#039; with params [1]:

SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ce`.`grupo_soporte`, CONSTRAINT `FK_5D2EB4619C833003` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`)) (500 Internal Server Error)
</title>*/
		});

		
	};	

}]);

app.controller('gestionComiteVamosBienCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioComiteVamosBien = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionComiteComprasCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioComiteCompras = function(ruta){		
		window.location.replace(ruta);

	};	
}]);

app.controller('gestionEstructuraOrganizacionalCtrl', ['$scope', '$http', function($scope, $http) {
	
	$scope.eliminarBeneficiarioEstructuraOrganizacional = function(ruta){		
		window.location.replace(ruta);

	};	
}]);


app.controller('FormalCtrl', ['$scope', function($scope) {

	$scope.mostrarFormal = false;	

	$scope.infoFormal = function() { 
		$scope.mostrarFormal = $(".tipo option[value='"+$('.tipo').val()+"']").text().toLowerCase() == "formal con negocio" ||$(".tipo option[value='"+$('.tipo').val()+"']").text().toLowerCase() == "formal sin negocio";			
	};	

}]);

app.controller('FiltrosGrupoCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasGrupo = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaGrupo = function(){
       
		$("#selDepartamento").val("");
		$("#selZona").val("");
		$("#selMunicipio").val("");
		$("#grupoFilter_tipo").val("");
		$("#grupoFilter_codigo").val("");
		$("#grupoFilter_nombre").val("");
		$("#grupoFilter_numero_identificacion_tributaria").val("");
		$("#grupoFilter_figura_legal_constitucion").val("");

       
    }
      
		
}]);

app.controller('FiltrosCVBCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasCVB = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaCVB = function(){
       
		$("#comiteVamosBienFilter_numero_documento").val("");
		$("#comiteVamosBienFilter_primer_apellido").val("");
		$("#comiteVamosBienFilter_primer_nombre").val("");			
       
    }
      
		
}]);

app.controller('FiltrosOrganizacionalCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasOrganizacional = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaOrganizacional = function(){

       
		$("#estructuraOrganizacionalFilter_numero_documento").val("");
		$("#estructuraOrganizacionalFilter_primer_apellido").val("");
		$("#estructuraOrganizacionalFilter_primer_nombre").val("");			
       
    }
      
		
}]);

app.controller('FiltrosCCCtrl', ['$scope', '$http', 'styleBuscarHerramientas', function($scope, $http, styleBuscarHerramientas) {

	$scope.CountBuscarHerramientas = -1;
	$scope.styleBuscarHerramientas = styleBuscarHerramientas.dropdown;
	
	$scope.buttonBuscarHerramientasCC = function(CountBuscarHerramientas){
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
	
    $scope.limpiarCamposFiltroBusquedaCC = function(){

       
		$("#comiteComprasFilter_numero_documento").val("");
		$("#comiteComprasFilter_primer_apellido").val("");
		$("#comiteComprasFilter_primer_nombre").val("");			
       
    }
      
		
}]);
