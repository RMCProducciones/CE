<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ruta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RutaRepository")
 */
class Ruta
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TerritorioAprendizaje")
     */
    private $territorio_aprendizaje;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_ruta", type="string")
     */
    private $nombre_ruta;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string")
     */
    private $observaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobacion", type="boolean", nullable=true)
     */
    private $aprobacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fecha_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion", type="datetime", nullable=true)
     */
    private $fecha_finalizacion;
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_propuesta", type="datetime", nullable=true)
     */
    private $fecha_inicio_propuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion_propuesta", type="datetime", nullable=true)
     */
    private $fecha_finalizacion_propuesta;

    /**
     * @var integer
     *
     * @ORM\Column(name="aprobador", type="integer",nullable=true)
     */
    private $aprobador;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string",nullable=true)
     */
    private $observacion;

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
     * @ORM\Column(name="fecha_creacion", type="datetime",nullable=true )
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
     * Set territorioAprendizaje
     *
     * @param AppBundle\Entity\TerritorioAprendizaje $territorioAprendizaje
     *
     * @return Ruta
     */
    public function setTerritorioAprendizaje(\AppBundle\Entity\TerritorioAprendizaje $territorioAprendizaje)
    {
        $this->territorio_aprendizaje = $territorioAprendizaje;
    
        return $this;
    }

    public function setNullTerritorioAprendizaje()
    {
        $this->territorio_aprendizaje = null;
    }

    /**
     * Get territorioAprendizaje
     *
     * @return AppBundle\Entity\TerritorioAprendizaje
     */
    public function getTerritorioAprendizaje()
    {
        return $this->territorio_aprendizaje;
    }

    /**
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return Ruta
     */
    public function setGrupo(\AppBundle\Entity\Grupo $grupo)
    {
        $this->grupo = $grupo;
    
        return $this;
    }

    public function setNullGrupo()
    {
        $this->grupo = null;
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
     * Set nombreRuta
     *
     * @param string $nombreRuta
     *
     * @return Ruta
     */
    public function setNombreRuta($nombreRuta)
    {
        $this->nombre_ruta = $nombreRuta;
    
        return $this;
    }

    /**
     * Get nombreRuta
     *
     * @return string
     */
    public function getNombreRuta()
    {
        return $this->nombre_ruta;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Ruta
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
     * Set aprobacion
     *
     * @param boolean $aprobacion
     *
     * @return Concurso
     */
    public function setAprobacion($aprobacion)
    {
        $this->aprobacion = $aprobacion;

        return $this;
    }

    /**
     * Get aprobacion
     *
     * @return boolean
     */
    public function getAprobacion()
    {
        return $this->aprobacion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Concurso
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
     * @return Concurso
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
     * Set fechaInicioPropuesta
     *
     * @param \DateTime $fechaInicioPropuesta
     *
     * @return Concurso
     */
    public function setFechaInicioPropuesta($fechaInicioPropuesta)
    {
        $this->fecha_inicio_propuesta = $fechaInicioPropuesta;

        return $this;
    }

    /**
     * Get fechaInicioPropuesta
     *
     * @return \DateTime
     */
    public function getFechaInicioPropuesta()
    {
        return $this->fecha_inicio_propuesta;
    }

    /**
     * Set fechaFinalizacionPropuesta
     *
     * @param \DateTime $fechaFinalizacionPropuesta
     *
     * @return Concurso
     */
    public function setFechaFinalizacionPropuesta($fechaFinalizacionPropuesta)
    {
        $this->fecha_finalizacion_propuesta = $fechaFinalizacionPropuesta;

        return $this;
    }

    /**
     * Get fechaFinalizacionPropuesta
     *
     * @return \DateTime
     */
    public function getFechaFinalizacionPropuesta()
    {
        return $this->fecha_finalizacion_propuesta;
    }

    /**
     * Set aprobador
     *
     * @param integer $aprobador
     *
     * @return Concurso
     */
    public function setAprobador($aprobador)
    {
        $this->aprobador = $aprobador;

        return $this;
    }

    /**
     * Get aprobador
     *
     * @return integer
     */
    public function getAprobador()
    {
        return $this->aprobador;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return Ruta
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Ruta
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
     * @return Ruta
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
     * @return Ruta
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
     * @return Ruta
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
     * @return Ruta
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

