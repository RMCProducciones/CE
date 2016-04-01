<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluacionFases
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EvaluacionFases
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
     * @ORM\Column(name="fase", type="integer",nullable=true)
     */
    private $fase;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacion", type="decimal")
     */
    private $calificacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobado", type="boolean")
     */
    private $aprobado;

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
     * @ORM\Column(name="fecha_modificacion", type="datetime",nullable=true)
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
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return EvaluacionFases
     */
    public function setGrupo(\AppBundle\Entity\Usuario $grupo)
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
     * @return EvaluacionFases
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
     * Set calificacion
     *
     * @param string $calificacion
     *
     * @return EvaluacionFases
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
     * Set aprobado
     *
     * @param boolean $aprobado
     *
     * @return EvaluacionFases
     */
    public function setAprobado($aprobado)
    {
        $this->aprobado = $aprobado;

        return $this;
    }

    /**
     * Get aprobado
     *
     * @return boolean
     */
    public function getAprobado()
    {
        return $this->aprobado;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return EvaluacionFases
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
     * @return EvaluacionFases
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
     * @return EvaluacionFases
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
     * @return EvaluacionFases
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
     * @return EvaluacionFases
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

