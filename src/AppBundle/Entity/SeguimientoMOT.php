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
     * @ORM\Column(name="fecha_finalizacion", type="datetime", nullable = true)
     */
    private $fecha_finalizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_recursos_tangibles", type="text", nullable = true)
     */
    private $indentificacion_recursos_tangibles;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_recursos_financieros", type="text", nullable = true)
     */
    private $indentificacion_recursos_financieros;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_recursos_intangibles", type="text", nullable = true)
     */
    private $indentificacion_recursos_intangibles;

    /**
     * @var string
     *
     * @ORM\Column(name="indentificacion_opciones_viables", type="text", nullable = true)
     */
    private $indentificacion_opciones_viables;

    /**
     * @var string
     *
     * @ORM\Column(name="viabilidad_negocio", type="text", nullable = true)
     */
    private $viabilidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable = true)
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
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable = true)
     */
    private $fecha_modificacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\usuario")
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
     * @return SeguimientoMOT
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
     * @param AppBundle\Entity\Usuario $usuarioModificacion
     *
     * @return SeguimientoMOT
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
     * @param AppBundle\Entity\Usuario $usuarioCreacion
     *
     * @return SeguimientoMOT
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

