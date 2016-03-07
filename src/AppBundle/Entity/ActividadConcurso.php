<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActividadConcurso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ActividadConcursoRepository")
 */
class ActividadConcurso
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concurso")
     */
    private $concurso;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad", type="string")
     */
    private $actividad;

    /**
     * @var string
     *
     * @ORM\Column(name="mejoras", type="string")
     */
    private $mejoras;

    /**
     * @var string
     *
     * @ORM\Column(name="recursos", type="string")
     */
    private $recursos;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="integer")
     */
    private $duracion;

    /**
     * @var integer
     *
     * @ORM\Column(name="semana_inicio", type="integer")
     */
    private $semana_inicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="semana_finalizacion", type="integer")
     */
    private $semana_finalizacion;

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
     * Set concurso
     *
     * @param AppBundle\Entity\Concurso $concurso
     *
     * @return ActividadConcurso
     */
    public function setConcurso(\AppBundle\Entity\Concurso $concurso)
    {
        $this->concurso = $concurso;

        return $this;
    }

    /**
     * Get concurso
     *
     * @return AppBundle\Entity\concurso
     */
    public function getConcurso()
    {
        return $this->concurso;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     *
     * @return ActividadConcurso
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set mejoras
     *
     * @param string $mejoras
     *
     * @return ActividadConcurso
     */
    public function setMejoras($mejoras)
    {
        $this->mejoras = $mejoras;

        return $this;
    }

    /**
     * Get mejoras
     *
     * @return string
     */
    public function getMejoras()
    {
        return $this->mejoras;
    }

    /**
     * Set recursos
     *
     * @param string $recursos
     *
     * @return ActividadConcurso
     */
    public function setRecursos($recursos)
    {
        $this->recursos = $recursos;

        return $this;
    }

    /**
     * Get recursos
     *
     * @return string
     */
    public function getRecursos()
    {
        return $this->recursos;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     *
     * @return ActividadConcurso
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set semanaInicio
     *
     * @param integer $semanaInicio
     *
     * @return ActividadConcurso
     */
    public function setSemanaInicio($semanaInicio)
    {
        $this->semana_inicio = $semanaInicio;

        return $this;
    }

    /**
     * Get semanaInicio
     *
     * @return integer
     */
    public function getSemanaInicio()
    {
        return $this->semana_inicio;
    }

    /**
     * Set semanaFinalizacion
     *
     * @param integer $semanaFinalizacion
     *
     * @return ActividadConcurso
     */
    public function setSemanaFinalizacion($semanaFinalizacion)
    {
        $this->semana_finalizacion = $semanaFinalizacion;

        return $this;
    }

    /**
     * Get semanaFinalizacion
     *
     * @return integer
     */
    public function getSemanaFinalizacion()
    {
        return $this->semana_finalizacion;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return ActividadConcurso
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
     * @return ActividadConcurso
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
     * @return ActividadConcurso
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
     * @return ActividadConcurso
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
     * @return ActividadConcurso
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

