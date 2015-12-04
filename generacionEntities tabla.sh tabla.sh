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

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionIntegrantesCLEAR" --fields="
integrante:integer
clear:string
rol:integer
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionGruposCLEAR" --fields="
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
