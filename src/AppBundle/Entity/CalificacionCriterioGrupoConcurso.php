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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CriterioCalificacion")
     */
    private $criterioCalificacion;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;


    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje", type="integer")
     */
    private $puntaje;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concurso")
     */
    private $concurso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_modificacion", type="integer", nullable = true)
     */
    private $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable = true)
     */
    private $fecha_modificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_creacion", type="integer", nullable = true)
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable = true)
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
     * @param AppBundle\Entity\CriterioCalificacion $criterioCalificacion
     *
     * @return CalificacionCriterioGrupoConcurso
     */
    public function setCriterioCalificacion(\AppBundle\Entity\CriterioCalificacion $criterioCalificacion)
    {
        $this->criterioCalificacion = $criterioCalificacion;

        return $this;
    }

    /**
     * Get criterioCalificacion
     *
     * @return AppBundle\Entity\CriterioCalificacion
     */
    public function getCriterioCalificacion()
    {
        return $this->criterioCalificacion;
    }

    /**
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return CalificacionCriterioGrupoConcurso
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
     * Set concurso
     *
     * @param AppBundle\Entity\Concurso $concurso
     *
     * @return CalificacionCriterioGrupoConcurso
     */
    public function setConcurso(\AppBundle\Entity\Concurso $concurso)
    {
        $this->concurso = $concurso;

        return $this;
    }

    /**
     * Get concurso
     *
     * @return AppBundle\Entity\Concurso
     */
    public function getConcurso()
    {
        return $this->concurso;
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

