<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Capacitacion
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
     * @var string
     *
     * @ORM\Column(name="capacitador", type="string")
     */
    private $capacitador;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_publicacion", type="datetime")
     */
    private $fecha_publicacion;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $modalidad;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

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
     * Set capacitador
     *
     * @param string $capacitador
     *
     * @return Capacitacion
     */
    public function setCapacitador($capacitador)
    {
        $this->capacitador = $capacitador;

        return $this;
    }

    /**
     * Get capacitador
     *
     * @return string
     */
    public function getCapacitador()
    {
        return $this->capacitador;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Capacitacion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     *
     * @return Capacitacion
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fecha_publicacion = $fechaPublicacion;

        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime
     */
    public function getFechaPublicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Capacitacion
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
     * @return Capacitacion
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
     * Set tipo
     *
     * @param AppBundle\Entity\Listas $tipo
     *
     * @return Capacitacion
     */
    public function setTipo(\AppBundle\Entity\Listas $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return AppBundle\Entity\Listas
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set modalidad
     *
     * @param AppBundle\Entity\Listas $modalidad
     *
     * @return Capacitacion
     */
    public function setModalidad(\AppBundle\Entity\Listas $modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Get modalidad
     *
     * @return AppBundle\Entity\Listas
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return Capacitacion
     */
    public function setMunicipio(\AppBundle\Entity\Municipio $municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return AppBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Capacitacion
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
     * @return Capacitacion
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
     * @return Capacitacion
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
     * @return Capacitacion
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
     * @return Capacitacion
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

