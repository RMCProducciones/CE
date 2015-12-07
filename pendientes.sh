php app/console doctrine:generate:entity --entity="AppBundle:Evento" --fields="
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
usuario:integer
fecha_asignacion:datetime
estado:integer
observaciones:string
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"
