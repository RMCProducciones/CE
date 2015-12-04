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

php app/console doctrine:generate:entity --entity="AppBundle:PlanTrabajoConcurso" --fields="
concurso:integer
actividad:string
mejoras:string
recursos:string
duracion:integer

fecha_finalizacion:datetime
active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"