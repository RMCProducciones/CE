<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IEA
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class IEA
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
     * @var integer
     *
     * @ORM\Column(name="grupo", type="integer")
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacion", type="decimal")
     */
    private $calificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fecha_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion", type="datetime")
     */
    private $fecha_finalizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="linea_productiva", type="string")
     */
    private $linea_productiva;

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
     * @ORM\Column(name="resultado_componente_organizacional", type="text")
     */
    private $resultado_componente_organizacional;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_productivo", type="text")
     */
    private $resultado_componente_productivo;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_comercial", type="text")
     */
    private $resultado_componente_comercial;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_administrativo", type="text")
     */
    private $resultado_componente_administrativo;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_componente_financiero", type="text")
     */
    private $resultado_componente_financiero;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_modificacion", type="integer")
     */
    private $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime")
     */
    private $fecha_modificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_creacion", type="integer")
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
     * @param integer $grupo
     *
     * @return IEA
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return integer
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set calificacion
     *
     * @param string $calificacion
     *
     * @return IEA
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * Get calificacion
     *
     * @return string
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return IEA
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
     * @return IEA
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
     * Set lineaProductiva
     *
     * @param string $lineaProductiva
     *
     * @return IEA
     */
    public function setLineaProductiva($lineaProductiva)
    {
        $this->linea_productiva = $lineaProductiva;

        return $this;
    }

    /**
     * Get lineaProductiva
     *
     * @return string
     */
    public function getLineaProductiva()
    {
        return $this->linea_productiva;
    }

    /**
     * Set actividadProductiva
     *
     * @param string $actividadProductiva
     *
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @return IEA
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
     * @param integer $usuarioModificacion
     *
     * @return IEA
     */
    public function setUsuarioModificacion($usuarioModificacion)
    {
        $this->usuario_modificacion = $usuarioModificacion;

        return $this;
    }

    /**
     * Get usuarioModificacion
     *
     * @return integer
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
     * @return IEA
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
     * @param integer $usuarioCreacion
     *
     * @return IEA
     */
    public function setUsuarioCreacion($usuarioCreacion)
    {
        $this->usuario_creacion = $usuarioCreacion;

        return $this;
    }

    /**
     * Get usuarioCreacion
     *
     * @return integer
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
     * @return IEA
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

