<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visita
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Visita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SeguimientoFase")
     */
    private $seguimientoFase;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Nodo")
     */
    private $nodo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable = true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="text", nullable = true)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="agenda", type="text", nullable = true)
     */
    private $agenda;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="text", nullable = true)
     */
    private $lugar;

    /**
     * @var integer
     *
     * @ORM\Column(name="asistentes", type="integer", nullable = true)
     */
    private $asistentes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="comite_compras", type="boolean", nullable = true)
     */
    private $comite_compras;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcionamiento_comite_compras", type="integer", nullable = true)
     */
    private $funcionamiento_comite_compras;

    /**
     * @var boolean
     *
     * @ORM\Column(name="comite_vamos_bien", type="boolean", nullable = true)
     */
    private $comite_vamos_bien;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcionamiento_comite_vamos_bien", type="integer", nullable = true)
     */
    private $funcionamiento_comite_vamos_bien;

    /**
     * @var string
     *
     * @ORM\Column(name="logros_compras", type="text", nullable = true)
     */
    private $logros_compras;

    /**
     * @var string
     *
     * @ORM\Column(name="logros_vamos_bien", type="text", nullable = true, nullable = true)
     */
    private $logros_vamos_bien;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contador", type="boolean", nullable = true)
     */
    private $contador;

    /**
     * @var integer
     *
     * @ORM\Column(name="desempeno_contador", type="integer", nullable = true, nullable = true)
     */
    private $desempeno_contador;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones_contador", type="text", nullable = true)
     */
    private $observaciones_contador;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones_presupuesto_asignado", type="text", nullable = true)
     */
    private $observaciones_presupuesto_asignado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cambios_presupuesto_asignado", type="boolean", nullable = true)
     */
    private $cambios_presupuesto_asignado;

    /**
     * @var string
     *
     * @ORM\Column(name="cambios_razones_presupuesto_asignado", type="text", nullable = true)
     */
    private $cambios_razones_presupuesto_asignado;

    /**
     * @var string
     *
     * @ORM\Column(name="desempeno_organizacional", type="text", nullable = true)
     */
    private $desempeno_organizacional;

    /**
     * @var string
     *
     * @ORM\Column(name="desempeno_productivo", type="text", nullable = true)
     */
    private $desempeno_productivo;

    /**
     * @var string
     *
     * @ORM\Column(name="desempeno_comercial", type="text", nullable = true)
     */
    private $desempeno_comercial;

    /**
     * @var string
     *
     * @ORM\Column(name="desempeno_administrativo", type="text", nullable = true)
     */
    private $desempeno_administrativo;

    /**
     * @var string
     *
     * @ORM\Column(name="desempeno_financiero", type="text", nullable = true)
     */
    private $desempeno_financiero;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cambios_integrantes_grupo", type="boolean", nullable = true)
     */
    private $cambios_integrantes_grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="cambios_razones_integrantes_grupo", type="text", nullable = true)
     */
    private $cambios_razones_integrantes_grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable = true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="compromisos", type="text", nullable = true)
     */
    private $compromisos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="interventoria", type="boolean", nullable = true)
     */
    private $interventoria;

    /**
     * @var string
     *
     * @ORM\Column(name="razones_interventoria", type="text", nullable = true)
     */
    private $razones_interventoria;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    private $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable = true)
     */
    private $fecha_modificacion;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fecha_creacion;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return Visita
     */
    public function setGrupo(\AppBundle\Entity\Grupo $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return AppBundle\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set seguimientoFase
     *
     * @param AppBundle\Entity\SeguimientoFase $seguimientoFase
     *
     * @return Visita
     */
    public function setSeguimientoFase(\AppBundle\Entity\SeguimientoFase $seguimientoFase)
    {
        $this->seguimientoFase = $seguimientoFase;

        return $this;
    }

    /**
     * Get seguimientoFase
     *
     * @return AppBundle\Entity\SeguimientoFase
     */
    public function getSeguimientoFase()
    {
        return $this->seguimientoFase;
    }

    /**
     * Set nodo
     *
     * @param AppBundle\Entity\Nodo $nodo
     *
     * @return Visita
     */
    public function setNodo(\AppBundle\Entity\Nodo $nodo)
    {
        $this->nodo = $nodo;

        return $this;
    }

    /**
     * Get nodo
     *
     * @return AppBundle\Entity\Nodo
     */
    public function getNodo()
    {
        return $this->nodo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Visita
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Visita
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set agenda
     *
     * @param string $agenda
     *
     * @return Visita
     */
    public function setAgenda($agenda)
    {
        $this->agenda = $agenda;

        return $this;
    }

    /**
     * Get agenda
     *
     * @return string
     */
    public function getAgenda()
    {
        return $this->agenda;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     *
     * @return Visita
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set asistentes
     *
     * @param integer $asistentes
     *
     * @return Visita
     */
    public function setAsistentes($asistentes)
    {
        $this->asistentes = $asistentes;

        return $this;
    }

    /**
     * Get asistentes
     *
     * @return integer
     */
    public function getAsistentes()
    {
        return $this->asistentes;
    }

    /**
     * Set comiteCompras
     *
     * @param boolean $comiteCompras
     *
     * @return Visita
     */
    public function setComiteCompras($comiteCompras)
    {
        $this->comite_compras = $comiteCompras;

        return $this;
    }

    /**
     * Get comiteCompras
     *
     * @return boolean
     */
    public function getComiteCompras()
    {
        return $this->comite_compras;
    }

    /**
     * Set funcionamientoComiteCompras
     *
     * @param integer $funcionamientoComiteCompras
     *
     * @return Visita
     */
    public function setFuncionamientoComiteCompras($funcionamientoComiteCompras)
    {
        $this->funcionamiento_comite_compras = $funcionamientoComiteCompras;

        return $this;
    }

    /**
     * Get funcionamientoComiteCompras
     *
     * @return integer
     */
    public function getFuncionamientoComiteCompras()
    {
        return $this->funcionamiento_comite_compras;
    }

    /**
     * Set comiteVamosBien
     *
     * @param boolean $comiteVamosBien
     *
     * @return Visita
     */
    public function setComiteVamosBien($comiteVamosBien)
    {
        $this->comite_vamos_bien = $comiteVamosBien;

        return $this;
    }

    /**
     * Get comiteVamosBien
     *
     * @return boolean
     */
    public function getComiteVamosBien()
    {
        return $this->comite_vamos_bien;
    }

    /**
     * Set funcionamientoComiteVamosBien
     *
     * @param integer $funcionamientoComiteVamosBien
     *
     * @return Visita
     */
    public function setFuncionamientoComiteVamosBien($funcionamientoComiteVamosBien)
    {
        $this->funcionamiento_comite_vamos_bien = $funcionamientoComiteVamosBien;

        return $this;
    }

    /**
     * Get funcionamientoComiteVamosBien
     *
     * @return integer
     */
    public function getFuncionamientoComiteVamosBien()
    {
        return $this->funcionamiento_comite_vamos_bien;
    }

    /**
     * Set logrosCompras
     *
     * @param string $logrosCompras
     *
     * @return Visita
     */
    public function setLogrosCompras($logrosCompras)
    {
        $this->logros_compras = $logrosCompras;

        return $this;
    }

    /**
     * Get logrosCompras
     *
     * @return string
     */
    public function getLogrosCompras()
    {
        return $this->logros_compras;
    }

    /**
     * Set logrosVamosBien
     *
     * @param string $logrosVamosBien
     *
     * @return Visita
     */
    public function setLogrosVamosBien($logrosVamosBien)
    {
        $this->logros_vamos_bien = $logrosVamosBien;

        return $this;
    }

    /**
     * Get logrosVamosBien
     *
     * @return string
     */
    public function getLogrosVamosBien()
    {
        return $this->logros_vamos_bien;
    }

    /**
     * Set contador
     *
     * @param boolean $contador
     *
     * @return Visita
     */
    public function setContador($contador)
    {
        $this->contador = $contador;

        return $this;
    }

    /**
     * Get contador
     *
     * @return boolean
     */
    public function getContador()
    {
        return $this->contador;
    }

    /**
     * Set desempenoContador
     *
     * @param integer $desempenoContador
     *
     * @return Visita
     */
    public function setDesempenoContador($desempenoContador)
    {
        $this->desempeno_contador = $desempenoContador;

        return $this;
    }

    /**
     * Get desempenoContador
     *
     * @return integer
     */
    public function getDesempenoContador()
    {
        return $this->desempeno_contador;
    }

    /**
     * Set observacionesContador
     *
     * @param string $observacionesContador
     *
     * @return Visita
     */
    public function setObservacionesContador($observacionesContador)
    {
        $this->observaciones_contador = $observacionesContador;

        return $this;
    }

    /**
     * Get observacionesContador
     *
     * @return string
     */
    public function getObservacionesContador()
    {
        return $this->observaciones_contador;
    }

    /**
     * Set observacionesPresupuestoAsignado
     *
     * @param string $observacionesPresupuestoAsignado
     *
     * @return Visita
     */
    public function setObservacionesPresupuestoAsignado($observacionesPresupuestoAsignado)
    {
        $this->observaciones_presupuesto_asignado = $observacionesPresupuestoAsignado;

        return $this;
    }

    /**
     * Get observacionesPresupuestoAsignado
     *
     * @return string
     */
    public function getObservacionesPresupuestoAsignado()
    {
        return $this->observaciones_presupuesto_asignado;
    }

    /**
     * Set cambiosPresupuestoAsignado
     *
     * @param boolean $cambiosPresupuestoAsignado
     *
     * @return Visita
     */
    public function setCambiosPresupuestoAsignado($cambiosPresupuestoAsignado)
    {
        $this->cambios_presupuesto_asignado = $cambiosPresupuestoAsignado;

        return $this;
    }

    /**
     * Get cambiosPresupuestoAsignado
     *
     * @return boolean
     */
    public function getCambiosPresupuestoAsignado()
    {
        return $this->cambios_presupuesto_asignado;
    }

    /**
     * Set cambiosRazonesPresupuestoAsignado
     *
     * @param string $cambiosRazonesPresupuestoAsignado
     *
     * @return Visita
     */
    public function setCambiosRazonesPresupuestoAsignado($cambiosRazonesPresupuestoAsignado)
    {
        $this->cambios_razones_presupuesto_asignado = $cambiosRazonesPresupuestoAsignado;

        return $this;
    }

    /**
     * Get cambiosRazonesPresupuestoAsignado
     *
     * @return string
     */
    public function getCambiosRazonesPresupuestoAsignado()
    {
        return $this->cambios_razones_presupuesto_asignado;
    }

    /**
     * Set desempenoOrganizacional
     *
     * @param string $desempenoOrganizacional
     *
     * @return Visita
     */
    public function setDesempenoOrganizacional($desempenoOrganizacional)
    {
        $this->desempeno_organizacional = $desempenoOrganizacional;

        return $this;
    }

    /**
     * Get desempenoOrganizacional
     *
     * @return string
     */
    public function getDesempenoOrganizacional()
    {
        return $this->desempeno_organizacional;
    }

    /**
     * Set desempenoProductivo
     *
     * @param string $desempenoProductivo
     *
     * @return Visita
     */
    public function setDesempenoProductivo($desempenoProductivo)
    {
        $this->desempeno_productivo = $desempenoProductivo;

        return $this;
    }

    /**
     * Get desempenoProductivo
     *
     * @return string
     */
    public function getDesempenoProductivo()
    {
        return $this->desempeno_productivo;
    }

    /**
     * Set desempenoComercial
     *
     * @param string $desempenoComercial
     *
     * @return Visita
     */
    public function setDesempenoComercial($desempenoComercial)
    {
        $this->desempeno_comercial = $desempenoComercial;

        return $this;
    }

    /**
     * Get desempenoComercial
     *
     * @return string
     */
    public function getDesempenoComercial()
    {
        return $this->desempeno_comercial;
    }

    /**
     * Set desempenoAdministrativo
     *
     * @param string $desempenoAdministrativo
     *
     * @return Visita
     */
    public function setDesempenoAdministrativo($desempenoAdministrativo)
    {
        $this->desempeno_administrativo = $desempenoAdministrativo;

        return $this;
    }

    /**
     * Get desempenoAdministrativo
     *
     * @return string
     */
    public function getDesempenoAdministrativo()
    {
        return $this->desempeno_administrativo;
    }

    /**
     * Set desempenoFinanciero
     *
     * @param string $desempenoFinanciero
     *
     * @return Visita
     */
    public function setDesempenoFinanciero($desempenoFinanciero)
    {
        $this->desempeno_financiero = $desempenoFinanciero;

        return $this;
    }

    /**
     * Get desempenoFinanciero
     *
     * @return string
     */
    public function getDesempenoFinanciero()
    {
        return $this->desempeno_financiero;
    }

    /**
     * Set cambiosIntegrantesGrupo
     *
     * @param boolean $cambiosIntegrantesGrupo
     *
     * @return Visita
     */
    public function setCambiosIntegrantesGrupo($cambiosIntegrantesGrupo)
    {
        $this->cambios_integrantes_grupo = $cambiosIntegrantesGrupo;

        return $this;
    }

    /**
     * Get cambiosIntegrantesGrupo
     *
     * @return boolean
     */
    public function getCambiosIntegrantesGrupo()
    {
        return $this->cambios_integrantes_grupo;
    }

    /**
     * Set cambiosRazonesIntegrantesGrupo
     *
     * @param string $cambiosRazonesIntegrantesGrupo
     *
     * @return Visita
     */
    public function setCambiosRazonesIntegrantesGrupo($cambiosRazonesIntegrantesGrupo)
    {
        $this->cambios_razones_integrantes_grupo = $cambiosRazonesIntegrantesGrupo;

        return $this;
    }

    /**
     * Get cambiosRazonesIntegrantesGrupo
     *
     * @return string
     */
    public function getCambiosRazonesIntegrantesGrupo()
    {
        return $this->cambios_razones_integrantes_grupo;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Visita
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set compromisos
     *
     * @param string $compromisos
     *
     * @return Visita
     */
    public function setCompromisos($compromisos)
    {
        $this->compromisos = $compromisos;

        return $this;
    }

    /**
     * Get compromisos
     *
     * @return string
     */
    public function getCompromisos()
    {
        return $this->compromisos;
    }

    /**
     * Set interventoria
     *
     * @param boolean $interventoria
     *
     * @return Visita
     */
    public function setInterventoria($interventoria)
    {
        $this->interventoria = $interventoria;

        return $this;
    }

    /**
     * Get interventoria
     *
     * @return boolean
     */
    public function getInterventoria()
    {
        return $this->interventoria;
    }

    /**
     * Set razonesInterventoria
     *
     * @param string $razonesInterventoria
     *
     * @return Visita
     */
    public function setRazonesInterventoria($razonesInterventoria)
    {
        $this->razones_interventoria = $razonesInterventoria;

        return $this;
    }

    /**
     * Get razonesInterventoria
     *
     * @return string
     */
    public function getRazonesInterventoria()
    {
        return $this->razones_interventoria;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Visita
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set usuarioModificacion
     *
     * @param AppBundle\Entity\Usuario $usuarioModificacion
     *
     * @return Visita
     */
    public function setUsuarioModificacion(\AppBundle\Entity\Usuario $usuarioModificacion)
    {
        $this->usuario_modificacion = $usuarioModificacion;

        return $this;
    }

    /**
     * Get usuarioModificacion
     *
     * @return AppBundle\Entity\Usuario
     */
    public function getUsuarioModificacion()
    {
        return $this->usuario_modificacion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return Visita
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fecha_modificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }

    /**
     * Set usuarioCreacion
     *
     * @param AppBundle\Entity\Usuario $usuarioCreacion
     *
     * @return Visita
     */
    public function setUsuarioCreacion(\AppBundle\Entity\Usuario $usuarioCreacion)
    {
        $this->usuario_creacion = $usuarioCreacion;

        return $this;
    }

    /**
     * Get usuarioCreacion
     *
     * @return AppBundle\Entity\Usuario
     */
    public function getUsuarioCreacion()
    {
        return $this->usuario_creacion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Visita
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fecha_creacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }
}

