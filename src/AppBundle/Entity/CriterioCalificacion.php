<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CriterioCalificacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CriterioCalificacion
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
     * @ORM\Column(name="concurso", type="integer")
     */
    private $concurso;

    /**
     * @var string
     *
     * @ORM\Column(name="criterio", type="string")
     */
    private $criterio;

    /**
     * @var integer
     *
     * @ORM\Column(name="maximo_puntaje", type="integer")
     */
    private $maximo_puntaje;

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
     * Set concurso
     *
     * @param integer $concurso
     *
     * @return CriterioCalificacion
     */
    public function setConcurso($concurso)
    {
        $this->concurso = $concurso;

        return $this;
    }

    /**
     * Get concurso
     *
     * @return integer
     */
    public function getConcurso()
    {
        return $this->concurso;
    }

    /**
     * Set criterio
     *
     * @param string $criterio
     *
     * @return CriterioCalificacion
     */
    public function setCriterio($criterio)
    {
        $this->criterio = $criterio;

        return $this;
    }

    /**
     * Get criterio
     *
     * @return string
     */
    public function getCriterio()
    {
        return $this->criterio;
    }

    /**
     * Set maximoPuntaje
     *
     * @param integer $maximoPuntaje
     *
     * @return CriterioCalificacion
     */
    public function setMaximoPuntaje($maximoPuntaje)
    {
        $this->maximo_puntaje = $maximoPuntaje;

        return $this;
    }

    /**
     * Get maximoPuntaje
     *
     * @return integer
     */
    public function getMaximoPuntaje()
    {
        return $this->maximo_puntaje;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return CriterioCalificacion
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
     * @return CriterioCalificacion
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
     * @return CriterioCalificacion
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
     * @return CriterioCalificacion
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
     * @return CriterioCalificacion
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

