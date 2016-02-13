php app/console doctrine:generate:entity --entity="AppBundle:POA" --fields="anio:integer presupuesto:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Convocatoria" --fields="poa:integer fecha_inicio:datetime fecha_cierre:datetime mot:boolean iea:boolean pi:boolean pn:boolean active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Grupo" --fields="
convocatoria:integer 
municipio:integer
tipo:integer
fecha_inscripcion:datetime
codigo:string
nombre:string
direccion:string
figura_legal_constitucion:integer
numero_identificacion_tributaria:string
fecha_constitucion_legal:datetime
telefono_fijo:string
telefono_celular:string
correo_electronico:string
entidad_financiera_cuenta:integer
tipo_cuenta:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Beneficiario" --fields="
grupo:integer 
tipo_documento:integer
numero_documento:string
primer_apellido:string
segundo_apellido:string
primer_nombre:string
segundo_nombre:string
genero:integer
fecha_nacimiento:datetime
edad_inscripcion:integer
joven_rural:boolean
corte_sisben:decimal
puntaje_sisben:decimal
pertenencia_etnica:integer
grupo_indigena:integer
desplazado:boolean
red_unidos:boolean
estado_civil:integer
rol_grupo_familiar:integer
hijos_menores_5:integer
miembros_nucleo_familiar:integer
sabe_leer:boolean
sabe_escribir:boolean
nivel_estudios:integer
ocupacion:integer
tipo_vivienda:integer
telefono_fijo:string
telefono_celular:string
correo_electronico:string
tipo_documento_conyugue:integer
numero_documento_conyugue:string
primer_apellido_conyugue:string
segundo_apellido_conyugue:string
primer_nombre_conyugue:string
segundo_nombre_conyugue:string
genero:integer
telefono_fijo_conyugue:string
telefono_celular_conyugue:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:CLEAR" --fields="
CLEAR:integer 
tipo_CLEAR:integer
fecha_inicio:datetime
fecha_finalizacion:datetime
zona:integer
departamento:integer
municipio:integer
lugar_realizacion_CLEAR:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:integrantesCLEAR" --fields="
integrantesCLEAR:integer 
tipo_documento:integer
numero_documento:string
primer_apellido:string
segundo_apellido:string
primer_nombre:string
segundo_nombre:string
genero:integer
fecha_nacimiento:datetime
pertenencia_etnica:integer
nivel_estudios:integer
grupo_indigena:integer
entidad_representa:string
cargo_entidad:string
telefono_fijo:string
telefono_celular:string
correo_electronico:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:Usuario" --fields="usuario:string(255) password:string(80) salt:string(255) nombres:string(255) apellidos:string(255) 

usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:IntegranteCLEAR" --fields="
tipo_documento:integer
numero_documento:string
primer_apellido:string
segundo_apellido:string
primer_nombre:string
segundo_nombre:string
genero:integer
fecha_nacimiento:datetime
entidad:string
cargo:string
municipio:integer
direccion:string
telefono_fijo:string
telefono_celular:string
telefono_celular2:string
correo_electronico:string
nivel_estudios:integer
pertenencia_etnica:integer
foto:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionIntegranteCLEAR" --fields="
integrante:integer
clear:string
rol:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionGrupoCLEAR" --fields="
grupo:integer
clear:string
habilitacion:boolean
asignacion:boolean
contraloria_social:boolean
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Concurso" --fields="
tipo:integer
fecha_bases:string
modalidad:integer
tematica:string
ambito:string
problematica:string
actividades:string
resultados:string
valor:string
distribucion:string
criterios:string
aprobacion:boolean
fecha_inicio:datetime
fecha_finalizacion:datetime
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:ActividadConcurso" --fields="
concurso:integer
actividad:string
mejoras:string
recursos:string
duracion:integer
semana_inicio:integer
semana_finalizacion:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:ExperienciaExitosa" --fields="
grupo:integer
fecha_registro:datetime
numero_empleos:integer
ventas_mes:integer
produccion_mensual:string
fuentes_financiacion:string
valor_recursos_financiacion:decimal
tipo_poblacion:string
proceso_productivo:string
testimonio_poblacion:string
acciones_minimizacion_impacto_ambiental:string
impacto_comunidad:string
innovacion:string
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:CalificacionExperienciaExitosa" --fields="
experienciaExitosa:integer
categoria:integer
calificacion:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Talento" --fields="
tipo:integer 
tipo_documento:integer
numero_documento:string
primer_apellido:string
segundo_apellido:string
primer_nombre:string
segundo_nombre:string
genero:integer
fecha_nacimiento:datetime
edad_inscripcion:integer
joven_rural:boolean
pertenencia_etnica:integer
grupo_indigena:integer
rol_grupo_familiar:integer
municipio:integer
direccion:string
rural:boolean
barrio:string
corregimiento:string
vereda:string
cacerio:string
telefono_fijo:string
telefono_celular:string
correo_electronico:string
estado_civil:integer
organizacion:string
fecha_inicio_talento:datetime
talento_madr:boolean
talento_otros_lugares:boolean
actividad_participado:string
nivel_estudios:integer
area_desempeno_principal:string
area_desempeno_secundario:string
area_desempeno_terciario:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Beca" --fields="
entidad:string
nombre:string
fecha_publicacion:datetime
fecha_inicio:datetime
fecha_finalizacion:datetime
tipo:integer
modalidad:integer
municipio:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionUsuarioBeca" --fields="
beca:integer 
usuario:integer
fecha_asignacion:datetime
estado:integer
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



php app/console doctrine:generate:entity --entity="AppBundle:Evento" --fields="
organizador:string
nombre:string
descripcion:string
fecha_publicacion:datetime
fecha_inicio:datetime
fecha_finalizacion:datetime
tipo:integer
municipio:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionUsuarioEvento" --fields="
evento:integer
usuario:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



php app/console doctrine:generate:entity --entity="AppBundle:Ahorro" --fields="
grupo:integer
fecha_registro:datetime
fecha_inicio:datetime
estado:integer
incentivo_ahorro_colectivo:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioAhorro" --fields="
ahorro:integer
beneficiario:integer
beneficiario_ahorro_otro_programa:boolean
telefono_celular:string
meta_ahorro_activacion:decimal
meta_ahorro_mensual:decimal
plan_ahorro_individual:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:SeguimientoBeneficiarioAhorro" --fields="
asignacionBeneficiarioAhorro:integer
fecha_apertura:datetime
saldo_apertura:decimal
incentivo_apertura:decimal
fecha_corte_1:datetime
saldo_corte_1:decimal
incentivo_corte_1:decimal
fecha_corte_2:datetime
saldo_corte_2:decimal
incentivo_corte_2:decimal
fecha_corte_final:datetime
saldo_corte_final:decimal
incentivo_corte_final:decimal
numero_incumplimiento:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



php app/console doctrine:generate:entity --entity="AppBundle:Poliza" --fields="
grupo:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:PolizaSoporte" --fields="
poliza:integer
tipo_soporte:integer
estado:integer
consecutivo:integer
cofinanciacion:decimal
path:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioPoliza" --fields="
poliza:integer
beneficiario:integer
beneficiario_poliza_otro_programa:boolean
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"





php app/console doctrine:generate:entity --entity="AppBundle:ProgramaCapacitacionFinanciera" --fields="
talento_financiero:integer
estado:integer
municipio:integer
lugar:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:CapacitacionFinanciera" --fields="
programaCapacitacionFinanciera:integer
modulo:integer
estado:integer
fecha:datetime
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioProgramaCapacitacionFinanciera" --fields="
programaCapacitacionFinanciera:integer
beneficiario:integer
participante:integer
valoracion_inicial:integer
valoracion_final:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Participante" --fields="
beneficiario:integer
relacion:integer
tipo_documento:integer
numero_documento:string
primer_apellido:string
segundo_apellido:string
primer_nombre:string
segundo_nombre:string
genero:integer
fecha_nacimiento:datetime
edad_inscripcion:integer
joven_rural:boolean
pertenencia_etnica:integer
grupo_indigena:integer
desplazado:boolean
discapacidad:string
estado_civil:integer
rol_grupo_familiar:integer
hijos_menores_5:integer
sabe_leer:boolean
sabe_escribir:boolean
nivel_estudios:integer
ocupacion:integer
tipo_vivienda:integer
telefono_fijo:string
telefono_celular:string
correo_electronico:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Organizacion" --fields="
nombre_organizacion:string 
linea_productiva:string
tipo_producto:string
fecha_inscripcion:datetime
codigo:string
nombre:string
direccion:string
rural:boolean
barrio:string
corregimiento:string
vereda:string
cacerio:string
municipio:integer
tipo_documentoo_contacto:integer
numero_documento_contacto:string
primer_apellidoo_contacto:string
segundo_apellidoo_contacto:string
primer_nombreo_contacto:string
segundo_nombreo_contacto:string
telefono_fijoo_contacto:string
telefono_celularo_contacto:string
correo_electronicoo_contacto:string
ruta:boolean
pasantia:boolean
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:TerritorioAprendizaje" --fields="
nombre_territorio:string 
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:OrganizacionTerritorioAprendizaje" --fields="
territorio_aprendizaje:string 
organizacion:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Ruta" --fields="
territorio_aprendizaje:string 
grupo:string
nombre_ruta:string
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:OrganizacionRuta" --fields="
ruta:string 
organizacion:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:BeneficiarioRuta" --fields="
ruta:string 
beneficiario:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Pasantia" --fields="
territorio_aprendizaje:string 
organizacion:string
grupo:string
nombre_pasantia:string
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:BeneficiarioPasantia" --fields="
pasantia:string 
beneficiario:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:DiagnosticoOrganizacional" --fields="
grupo:integer
fecha_visita:datetime
promotor:integer
productiva-a:smallint
productiva-b:smallint
productiva-c:smallint
productiva-d:smallint
productiva-e:smallint
productiva-f:smallint
comercial-a:smallint
comercial-b:smallint
comercial-c:smallint
comercial-d:smallint
comercial-e:smallint
financiera-a:smallint
financiera-b:smallint
financiera-c:smallint
financiera-d:smallint
financiera-e:smallint
financiera-f:smallint
administrativa-a:smallint
administrativa-b:smallint
administrativa-c:smallint
administrativa-d:smallint
administrativa-e:smallint
organizacional-a:smallint
organizacional-b:smallint
organizacional-c:smallint
organizacional-d:smallint
organizacional-e:smallint
organizacional-f:smallint
totalProductiva:smallint
totalComercial:smallint
totalFinanciera:smallint
totalAdministrativa:smallint
totalOrganizacional:smallint
total:smallint
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:Feria" --fields="
tipo:integer
fecha_propuesta:datetime
municipio:integer
lugar:string
nombre:string
entidades:text
presentacion:text
objetivo:text
objetivos_especificos:text
fecha_aprobacion:datetime
fecha_aprobada:datetime
aprobacion:boolean
coordinador:integer
numero_proyectos_produccion_agropecuaria:integer
numero_proyectos_agroindustria:integer
numero_proyectos_turismo_rural:integer
numero_proyectos_artesanias:integer
numero_proyectos_otros_servicios:integer
valor_ventas_produccion_agropecuaria:decimal
valor_ventas_agroindustria:decimal
valor_ventas_turismo_rural:decimal
valor_ventas_artesanias:decimal
valor_ventas_otros_servicios:decimal
personas_atendidas:integer
representantes_instituciones:integer
comentarios:text
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:PatrocinadorFeria" --fields="
feria:integer
nombre:string
valor_aportado:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



SEGUIMIENTO FASE

php app/console doctrine:generate:entity --entity="AppBundle:EstructuraOrganizacional" --fields="
tipo:integer
cargo:integer
beneficiario:integer
fecha_inicio
fecha_finalizacion
estado:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:SeguimientoFase" --fields="
grupo:integer 
fase:integer

fecha_inicio:datetime
fecha_finalizacion:datetime
actividad_productiva:string
descripcion_actividad_productiva:text
logros:text
resultado_area_organizacional:text
resultado_area_productivo:text
resultado_area_comercial:text
resultado_area_administrativo:text
resultado_area_financiero:text
observaciones:text
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:Activos" --fields="
seguimientoFase:integer
rubro:integer
descripcion:string
unidad_medida:integer
cantidad_inicial:decimal
valor_inicial:decimal
cantidad_final:decimal
valor_final:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Produccion" --fields="
seguimientoFase:integer
periodicidad:integer
producto:string
unidad_medida:integer
cantidad_inicial:decimal
valor_inicial:decimal
cantidad_final:decimal
valor_final:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Ventas" --fields="
seguimientoFase:integer
periodicidad:integer
producto:string
unidad_medida:integer
valor_unitario_inicial:decimal
cantidad_vendida_inicial:decimal
valor_ventas_inicial:decimal
cantidad_consumo_inicial:decimal
valor_unitario_final:decimal
cantidad_vendida_final:decimal
valor_ventas_final:decimal
cantidad_consumo_final:decimal
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Empleado" --fields="
seguimientoFase:integer
periodicidad:integer
nombre:string
socio_organizacion:boolean
fecha_ingreso:datetime
fecha_nacimiento:datetime
edad_al_ingreso:decimal
sexo:integer
remuneracion__bruta_anual:decimal
periodo_pago
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionTalentoSeguimientoFase" --fields="
seguimientoFase:integer
talento:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



php app/console doctrine:generate:entity --entity="AppBundle:Visita" --fields="
seguimientoFase:integer
fecha:datetime
objetivo:text
agenda:text
lugar:text
asistentes:integer
comite_compras:boolean
funcionamiento_comite_compras:integer
comite_vamos_bien:boolean
funcionamiento_comite_vamos_bien:integer
logros_compras:text
logros_vamos_bien:text
contador:boolean
desempeno_contador:integer
observaciones_contador:text
observaciones_presupuesto_asignado:text
cambios_presupuesto_asignado:boolean
cambios_razones_presupuesto_asignado:text
desempeno_organizacional:text
desempeno_productivo:text
desempeno_comercial:text
desempeno_administrativo:text
desempeno_financiero:text
cambios_integrantes_grupo:boolean
cambios_razones_integrantes_grupo:text
observaciones:text
compromisos:text
interventoria:boolean
razones_interventoria:text
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioVisita" --fields="
visita:integer
beneficiario:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:PlanInversion" --fields="
seguimientoFase:integer
area:integer
actividad:string
unidad_medida:integer
cantidad:decimal
valor_unitario:decimal
valor_total:decimal
tiempo_ejecucion:integer
cantidad_visita1:decimal
valor_unitario_visita1:decimal
valor_total_visita1:decimal
tiempo_ejecucion_visita1:integer
cantidad_visita2:decimal
valor_unitario_visita2:decimal
valor_total_visita2:decimal
tiempo_ejecucion_visita2:integer
cantidad_visita3:decimal
valor_unitario_visita3:decimal
valor_total_visita3:decimal
tiempo_ejecucion_visita3:integer
cumplio:boolean
observaciones:text
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"




php app/console doctrine:generate:entity --entity="AppBundle:Nodo" --fields="
nombre:string
fase:integer
formal:boolean
negocio:boolean
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


php app/console doctrine:generate:entity --entity="AppBundle:Camino" --fields="
grupo:integer
nodo:integer
estado:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"





PENDIENTE POR DEFINIR

php app/console doctrine:generate:entity --entity="AppBundle:Configuracion" --fields="
porcentaje_generacion_ingresos:integer
porcentaje_mejoramiento_productivo:integer
porcentaje_generacion_empleo:integer
porcentaje_conservacion_ambiental:integer
porcentaje_manejo_organizacional:integer
porcentaje_manejo_financiero:integer
porcentaje_ahorro_colectivo:integer
porcentaje_enfoque_diferencial:integer
niveles:string
rubricas_generacion_ingresos:string
rubricas_mejoramiento_productivo:string
rubricas_generacion_empleo:string
rubricas_conservacion_ambiental:string
rubricas_manejo_organizacional:string
rubricas_manejo_financiero:string
rubricas_ahorro_colectivo:string
rubricas_enfoque_diferencial:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"




