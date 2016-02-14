<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoFase
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SeguimientoFase
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
     * @var integer
     *
     * @ORM\Column(name="fase", type="integer", nullable=true)
     */
    private $fase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fecha_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion", type="datetime", nullable=true)
     */
    private $fecha_finalizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad_productiva", type="string")
     */
    private $actividad_productiva;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_actividad_productiva", type="text")
     */
    private $descripcion_actividad_productiva;

    /**
     * @var string
     *
     * @ORM\Column(name="logros", type="text")
     */
    private $logros;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_organizacional", type="text", nullable=true)
     */
    private $resultado_componente_organizacional;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_productivo", type="text", nullable=true)
     */
    private $resultado_componente_productivo;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_comercial", type="text", nullable=true)
     */
    private $resultado_componente_comercial;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_administrativo", type="text", nullable=true)
     */
    private $resultado_componente_administrativo;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_financiero", type="text", nullable=true)
     */
    private $resultado_componente_financiero;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

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
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true)
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
     * @return SeguimientoFase
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
     * Set fase
     *
     * @param integer $fase
     *
     * @return SeguimientoFase
     */
    public function setFase($fase)
    {
        $this->fase = $fase;

        return $this;
    }

    /**
     * Get fase
     *
     * @return integer
     */
    public function getFase()
    {
        return $this->fase;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return SeguimientoFase
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fechaFinalizacion
     *
     * @param \DateTime $fechaFinalizacion
     *
     * @return SeguimientoFase
     */
    public function setFechaFinalizacion($fechaFinalizacion)
    {
        $this->fecha_finalizacion = $fechaFinalizacion;

        return $this;
    }

    /**
     * Get fechaFinalizacion
     *
     * @return \DateTime
     */
    public function getFechaFinalizacion()
    {
        return $this->fecha_finalizacion;
    }

    /**
     * Set actividadProductiva
     *
     * @param string $actividadProductiva
     *
     * @return SeguimientoFase
     */
    public function setActividadProductiva($actividadProductiva)
    {
        $this->actividad_productiva = $actividadProductiva;

        return $this;
    }

    /**
     * Get actividadProductiva
     *
     * @return string
     */
    public function getActividadProductiva()
    {
        return $this->actividad_productiva;
    }

    /**
     * Set descripcionActividadProductiva
     *
     * @param string $descripcionActividadProductiva
     *
     * @return SeguimientoFase
     */
    public function setDescripcionActividadProductiva($descripcionActividadProductiva)
    {
        $this->descripcion_actividad_productiva = $descripcionActividadProductiva;

        return $this;
    }

    /**
     * Get descripcionActividadProductiva
     *
     * @return string
     */
    public function getDescripcionActividadProductiva()
    {
        return $this->descripcion_actividad_productiva;
    }

    /**
     * Set logros
     *
     * @param string $logros
     *
     * @return SeguimientoFase
     */
    public function setLogros($logros)
    {
        $this->logros = $logros;

        return $this;
    }

    /**
     * Get logros
     *
     * @return string
     */
    public function getLogros()
    {
        return $this->logros;
    }

    /**
     * Set resultadoComponenteOrganizacional
     *
     * @param string $resultadoComponenteOrganizacional
     *
     * @return SeguimientoFase
     */
    public function setResultadoComponenteOrganizacional($resultadoComponenteOrganizacional)
    {
        $this->resultado_componente_organizacional = $resultadoComponenteOrganizacional;

        return $this;
    }

    /**
     * Get resultadoComponenteOrganizacional
     *
     * @return string
     */
    public function getResultadoComponenteOrganizacional()
    {
        return $this->resultado_componente_organizacional;
    }

    /**
     * Set resultadoComponenteProductivo
     *
     * @param string $resultadoComponenteProductivo
     *
     * @return SeguimientoFase
     */
    public function setResultadoComponenteProductivo($resultadoComponenteProductivo)
    {
        $this->resultado_componente_productivo = $resultadoComponenteProductivo;

        return $this;
    }

    /**
     * Get resultadoComponenteProductivo
     *
     * @return string
     */
    public function getResultadoComponenteProductivo()
    {
        return $this->resultado_componente_productivo;
    }

    /**
     * Set resultadoComponenteComercial
     *
     * @param string $resultadoComponenteComercial
     *
     * @return SeguimientoFase
     */
    public function setResultadoComponenteComercial($resultadoComponenteComercial)
    {
        $this->resultado_componente_comercial = $resultadoComponenteComercial;

        return $this;
    }

    /**
     * Get resultadoComponenteComercial
     *
     * @return string
     */
    public function getResultadoComponenteComercial()
    {
        return $this->resultado_componente_comercial;
    }

    /**
     * Set resultadoComponenteAdministrativo
     *
     * @param string $resultadoComponenteAdministrativo
     *
     * @return SeguimientoFase
     */
    public function setResultadoComponenteAdministrativo($resultadoComponenteAdministrativo)
    {
        $this->resultado_componente_administrativo = $resultadoComponenteAdministrativo;

        return $this;
    }

    /**
     * Get resultadoComponenteAdministrativo
     *
     * @return string
     */
    public function getResultadoComponenteAdministrativo()
    {
        return $this->resultado_componente_administrativo;
    }

    /**
     * Set resultadoComponenteFinanciero
     *
     * @param string $resultadoComponenteFinanciero
     *
     * @return SeguimientoFase
     */
    public function setResultadoComponenteFinanciero($resultadoComponenteFinanciero)
    {
        $this->resultado_componente_financiero = $resultadoComponenteFinanciero;

        return $this;
    }

    /**
     * Get resultadoComponenteFinanciero
     *
     * @return string
     */
    public function getResultadoComponenteFinanciero()
    {
        return $this->resultado_componente_financiero;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return SeguimientoFase
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
     * Set active
     *
     * @param boolean $active
     *
     * @return SeguimientoFase
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
     * @return SeguimientoFase
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
     * @return SeguimientoFase
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
     * @return SeguimientoFase
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
     * @return SeguimientoFase
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

