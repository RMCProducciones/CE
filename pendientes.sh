#1. seleccionar grupo
#2. Accion Diligenciar Compromisos Integrantes
#3. Generador Acta de compromisos grupal
#4. Gestor de carga de saldos
#5. Evaluador de incentivos

php app/console doctrine:generate:entity --entity="AppBundle:Ahorro" --fields="grupo:integer fecha_registro:datetime fecha_inicio:datetime estado:integer incentivo_ahorro_colectivo:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:AsignacionBeneficiarioAhorro" --fields="ahorro:integer beneficiario:integer beneficiario_ahorro_otro_programa:boolean telefono_celular:string meta_ahorro_activacion:decimal meta_ahorro_mensual:decimal plan_ahorro_individual:decimal active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"

php app/console doctrine:generate:entity --entity="AppBundle:SeguimientoBeneficiarioAhorro" --fields="beneficiario:integer fecha_apertura:datetime saldo_apertura:decimal incentivo_apertura:decimal fecha_corte_1:datetime saldo_corte_1:decimal incentivo_corte_1:decimal fecha_corte_2:datetime saldo_corte_2:decimal incentivo_corte_2:decimal fecha_corte_final:datetime saldo_corte_final:decimal incentivo_corte_final:decimal numero_incumplimiento:integer active:boolean usuario_modificacion:integer fecha_modificacion:datetime usuario_creacion:integer fecha_creacion:datetime"