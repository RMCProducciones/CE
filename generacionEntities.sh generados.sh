php app/console doctrine:generate:entity --entity="AppBundle:Usuario" --fields="usuario:string(255) password:string(80) salt:string(255) nombres:string(255) apellidos:string(255) telefono_fijo:string telefono_celular:string correo_electronico:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Listas" --fields="dominio:string descripcion:string abreviatura:string orden:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:POA" --fields="anio:integer presupuesto:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Convocatoria" --fields="poa:integer fecha_inicio:datetime fecha_cierre:datetime mot:boolean iea:boolean pi:boolean pn:boolean active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Grupo" --fields="convocatoria:integer zona:integer municipio:integer tipo:integer fecha_inscripcion:datetime codigo:string nombre:string direccion:string figura_legal_constitucion:integer numero_identificacion_tributaria:string fecha_constitucion_legal:datetime telefono_fijo:string telefono_celular:string correo_electronico:string entidad_financiera_cuenta:integer tipo_cuenta:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Beneficiario" --fields="grupo:integer tipo_documento:integer numero_documento:string primer_apellido:string segundo_apellido:string primer_nombre:string segundo_nombre:string genero:integer fecha_nacimiento:datetime edad_inscripcion:integer joven_rural:boolean corte_sisben:decimal puntaje_sisben:decimal pertenencia_etnica:integer grupo_indigena:integer desplazado:boolean red_unidos:boolean estado_civil:integer rol_grupo_familiar:integer hijos_menores_5:integer miembros_nucleo_familiar:integer sabe_leer:boolean sabe_escribir:boolean nivel_estudios:integer ocupacion:integer tipo_vivienda:integer telefono_fijo:string telefono_celular:string correo_electronico:string tipo_documento_conyugue:integer numero_documento_conyugue:string primer_apellido_conyugue:string segundo_apellido_conyugue:string primer_nombre_conyugue:string segundo_nombre_conyugue:string genero:integer telefono_fijo_conyugue:string telefono_celular_conyugue:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Zona" --fields="nombre:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"
php app/console doctrine:generate:entity --entity="AppBundle:Departamento" --fields="nombre:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"
php app/console doctrine:generate:entity --entity="AppBundle:Municipio" --fields="departamento:integer zona:integer nombre:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:CLEAR" --fields="tipo_CLEAR:integer fecha_inicio:datetime fecha_finalizacion:datetime municipio:integer lugar_realizacion_CLEAR:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"
php app/console doctrine:generate:entity --entity="AppBundle:IntegrantesCLEAR" --fields="clear:integer tipo_documento:integer numero_documento:string primer_apellido:string segundo_apellido:string primer_nombre:string segundo_nombre:string genero:integer fecha_nacimiento:datetime pertenencia_etnica:integer nivel_estudios:integer grupo_indigena:integer entidad_representa:string cargo_entidad:string telefono_fijo:string telefono_celular:string correo_electronico:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:IntegranteCLEAR" --fields=" tipo_documento:integer numero_documento:string primer_apellido:string segundo_apellido:string primer_nombre:string segundo_nombre:string genero:integer fecha_nacimiento:datetime entidad:string cargo:string municipio:integer direccion:string telefono_fijo:string telefono_celular:string telefono_celular2:string correo_electronico:string nivel_estudios:integer pertenencia_etnica:integer foto:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionIntegranteCLEAR" --fields="integrante:integer clear:string rol:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionGrupoCLEAR" --fields=" grupo:integer clear:string habilitacion:boolean asignacion:boolean contraloria_social:boolean active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Concurso" --fields="tipo:integer fecha_bases:string modalidad:integer tematica:string ambito:string problematica:string actividades:string resultados:string valor:string distribucion:string criterios:string aprobacion:boolean fecha_inicio:datetime fecha_finalizacion:datetime active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:ActividadConcurso" --fields="concurso:integer actividad:string mejoras:string recursos:string duracion:integer semana_inicio:integer semana_finalizacion:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:ExperienciaExitosa" --fields="grupo:integer fecha_registro:datetime numero_empleos:integer ventas_mes:integer produccion_mensual:string fuentes_financiacion:string valor_recursos_financiacion:decimal tipo_poblacion:string proceso_productivo:string testimonio_poblacion:string acciones_minimizacion_impacto_ambiental:string impacto_comunidad:string innovacion:string observaciones:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:CalificacionExperienciaExitosa" --fields="experienciaExitosa:integer categoria:integer calificacion:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Talento" --fields="tipo:integer tipo_documento:integer numero_documento:string primer_apellido:string segundo_apellido:string primer_nombre:string segundo_nombre:string genero:integer fecha_nacimiento:datetime edad_inscripcion:integer joven_rural:boolean pertenencia_etnica:integer grupo_indigena:integer rol_grupo_familiar:integer municipio:integer direccion:string rural:boolean barrio:string corregimiento:string vereda:string cacerio:string telefono_fijo:string telefono_celular:string correo_electronico:string estado_civil:integer organizacion:string fecha_inicio_talento:datetime talento_madr:boolean talento_otros_lugares:boolean actividad_participado:string nivel_estudios:integer area_desempeno_principal:string area_desempeno_secundario:string area_desempeno_terciario:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Beca" --fields="entidad:string nombre:string fecha_publicacion:datetime fecha_inicio:datetime fecha_finalizacion:datetime tipo:integer modalidad:integer municipio:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionUsuarioBeca" --fields="beca:integer usuario:integer fecha_asignacion:datetime estado:integer observaciones:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Capacitacion" --fields="capacitador:string nombre:string fecha_publicacion:datetime fecha_inicio:datetime fecha_finalizacion:datetime tipo:integer modalidad:integer municipio:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionUsuarioCapacitacion" --fields="capacitacion:integer usuario:integer fecha_asignacion:datetime estado:integer observaciones:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:Evento" --fields="organizador:string nombre:string descripcion:string fecha_publicacion:datetime fecha_inicio:datetime fecha_finalizacion:datetime tipo:integer municipio:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionUsuarioEvento" --fields="evento:integer usuario:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"


#1. seleccionar grupo
#2. Accion Diligenciar Compromisos Integrantes
#3. Generador Acta de compromisos grupal
#4. Gestor de carga de saldos
#5. Evaluador de incentivos

php app/console doctrine:generate:entity --entity="AppBundle:Ahorro" --fields="grupo:integer fecha_registro:datetime fecha_inicio:datetime estado:integer incentivo_ahorro_colectivo:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioAhorro" --fields="ahorro:integer beneficiario:integer beneficiario_ahorro_otro_programa:boolean telefono_celular:string meta_ahorro_activacion:decimal meta_ahorro_mensual:decimal plan_ahorro_individual:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:SeguimientoBeneficiarioAhorro" --fields="beneficiario:integer fecha_apertura:datetime saldo_apertura:decimal incentivo_apertura:decimal fecha_corte_1:datetime saldo_corte_1:decimal incentivo_corte_1:decimal fecha_corte_2:datetime saldo_corte_2:decimal incentivo_corte_2:decimal fecha_corte_final:datetime saldo_corte_final:decimal incentivo_corte_final:decimal numero_incumplimiento:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"



php app/console doctrine:generate:entity --entity="AppBundle:Poliza" --fields="grupo:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:PolizaSoporte" --fields="poliza:integer tipo_soporte:integer estado:integer consecutivo:integer cofinanciacion:decimal path:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioPoliza" --fields="poliza:integer beneficiario:integer beneficiario_poliza_otro_programa:boolean observaciones:string active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"