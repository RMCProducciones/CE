<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalificacionCriterioGrupoConcurso
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CalificacionCriterioGrupoConcurso
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
     * @ORM\Column(name="criterioCalificacion", type="integer")
     */
    private $criterioCalificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="asignacionGrupoConcurso", type="integer")
     */
    private $asignacionGrupoConcurso;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje", type="integer")
     */
    private $puntaje;

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
     * Set criterioCalificacion
     *
     * @param integer $criterioCalificacion
     *
     * @return CalificacionCriterioGrupoConcurso
     */
    public function setCriterioCalificacion($criterioCalificacion)
    {
        $this->criterioCalificacion = $criterioCalificacion;

        return $this;
    }

    /**
     * Get criterioCalificacion
     *
     * @return integer
     */
    public function getCriterioCalificacion()
    {
        return $this->criterioCalificacion;
    }

    /**
     * Set asignacionGrupoConcurso
     *
     * @param integer $asignacionGrupoConcurso
     *
     * @return CalificacionCriterioGrupoConcurso
     */
    public function setAsignacionGrupoConcurso($asignacionGrupoConcurso)
    {
        $this->asignacionGrupoConcurso = $asignacionGrupoConcurso;

        return $this;
    }

    /**
     * Get asignacionGrupoConcurso
     *
     * @return integer
     */
    public function getAsignacionGrupoConcurso()
    {
        return $this->asignacionGrupoConcurso;
    }

    /**
     * Set puntaje
     *
     * @param integer $puntaje
     *
     * @return CalificacionCriterioGrupoConcurso
     */
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    /**
     * Get puntaje
     *
     * @return integer
     */
    public function getPuntaje()
    {
        return $this->puntaje;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return CalificacionCriterioGrupoConcurso
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
     * @return CalificacionCriterioGrupoConcurso
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
     * @return CalificacionCriterioGrupoConcurso
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
     * @return CalificacionCriterioGrupoConcurso
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
     * @return CalificacionCriterioGrupoConcurso
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

