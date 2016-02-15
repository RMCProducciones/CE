<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoMOT
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SeguimientoMOT
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
     * @ORM\Column(name="indentificacion_recursos_tangibles", type="text")
     */
    private $indentificacion_recursos_tangibles;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_recursos_financieros", type="text")
     */
    private $indentificacion_recursos_financieros;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_recursos_intangibles", type="text")
     */
    private $indentificacion_recursos_intangibles;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_opciones_viables", type="text")
     */
    private $indentificacion_opciones_viables;

    /**
     * @var string
     *
     * @ORM\Column(name="viabilidad_negocio", type="text")
     */
    private $viabilidad_negocio;

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
     * @return SeguimientoMOT
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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
     * Set indentificacionRecursosTangibles
     *
     * @param string $indentificacionRecursosTangibles
     *
     * @return SeguimientoMOT
     */
    public function setIndentificacionRecursosTangibles($indentificacionRecursosTangibles)
    {
        $this->indentificacion_recursos_tangibles = $indentificacionRecursosTangibles;

        return $this;
    }

    /**
     * Get indentificacionRecursosTangibles
     *
     * @return string
     */
    public function getIndentificacionRecursosTangibles()
    {
        return $this->indentificacion_recursos_tangibles;
    }

    /**
     * Set indentificacionRecursosFinancieros
     *
     * @param string $indentificacionRecursosFinancieros
     *
     * @return SeguimientoMOT
     */
    public function setIndentificacionRecursosFinancieros($indentificacionRecursosFinancieros)
    {
        $this->indentificacion_recursos_financieros = $indentificacionRecursosFinancieros;

        return $this;
    }

    /**
     * Get indentificacionRecursosFinancieros
     *
     * @return string
     */
    public function getIndentificacionRecursosFinancieros()
    {
        return $this->indentificacion_recursos_financieros;
    }

    /**
     * Set indentificacionRecursosIntangibles
     *
     * @param string $indentificacionRecursosIntangibles
     *
     * @return SeguimientoMOT
     */
    public function setIndentificacionRecursosIntangibles($indentificacionRecursosIntangibles)
    {
        $this->indentificacion_recursos_intangibles = $indentificacionRecursosIntangibles;

        return $this;
    }

    /**
     * Get indentificacionRecursosIntangibles
     *
     * @return string
     */
    public function getIndentificacionRecursosIntangibles()
    {
        return $this->indentificacion_recursos_intangibles;
    }

    /**
     * Set indentificacionOpcionesViables
     *
     * @param string $indentificacionOpcionesViables
     *
     * @return SeguimientoMOT
     */
    public function setIndentificacionOpcionesViables($indentificacionOpcionesViables)
    {
        $this->indentificacion_opciones_viables = $indentificacionOpcionesViables;

        return $this;
    }

    /**
     * Get indentificacionOpcionesViables
     *
     * @return string
     */
    public function getIndentificacionOpcionesViables()
    {
        return $this->indentificacion_opciones_viables;
    }

    /**
     * Set viabilidadNegocio
     *
     * @param string $viabilidadNegocio
     *
     * @return SeguimientoMOT
     */
    public function setViabilidadNegocio($viabilidadNegocio)
    {
        $this->viabilidad_negocio = $viabilidadNegocio;

        return $this;
    }

    /**
     * Get viabilidadNegocio
     *
     * @return string
     */
    public function getViabilidadNegocio()
    {
        return $this->viabilidad_negocio;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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
     * @return SeguimientoMOT
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

