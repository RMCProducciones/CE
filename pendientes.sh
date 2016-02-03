php app/console doctrine:generate:entity --entity="AppBundle:Feria" --fields="tipo:integer fecha_propuesta:datetime municipio:integer lugar:string nombre:string entidades:text presentacion:text objetivo:text objetivos_especificos:text fecha_aprobacion:datetime fecha_aprobada:datetime aprobacion:boolean coordinador:integer numero_proyectos_produccion_agropecuaria:integer numero_proyectos_agroindustria:integer numero_proyectos_turismo_rural:integer numero_proyectos_artesanias:integer numero_proyectos_otros_servicios:integer valor_ventas_produccion_agropecuaria:decimal valor_ventas_agroindustria:decimal valor_ventas_turismo_rural:decimal valor_ventas_artesanias:decimal valor_ventas_otros_servicios:decimal personas_atendidas:integer representantes_instituciones:integer comentarios:text active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:PatrocinadorFeria" --fields="feria:integer nombre:string valor_aportado:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"