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
     * @var string
     *
     * @ORM\Column(name="calificacion_iea", type="decimal", nullable = true)
     */
    private $calificacion_iea;

    /**
     * @var boolean
     *
     * @ORM\Column(name="apto_iea", type="boolean", nullable = true)
     */
    private $apto_iea;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacion_pi", type="decimal", nullable = true)
     */
    private $calificacion_pi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="apto_pi", type="boolean", nullable = true)
     */
    private $apto_pi;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacion_pn", type="decimal", nullable = true)
     */
    private $calificacion_pn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="apto_pn", type="boolean", nullable = true)
     */
    private $apto_pn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="no_aprobado", type="boolean", nullable = true)
     */
    private $no_aprobado;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", nullable = true)
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
     * Set calificacion_iea
     *
     * @param string $calificacion_iea
     *
     * @return EvaluacionFases
     */
    public function setCalificacionIea($calificacion_iea)
    {
        $this->calificacion_iea = $calificacion_iea;

        return $this;
    }

    /**
     * Get calificacion_iea
     *
     * @return string
     */
    public function getCalificacionIea()
    {
        return $this->calificacion_iea;
    }

    /**
     * Set apto_iea
     *
     * @param boolean $apto_iea
     *
     * @return EvaluacionFases
     */
    public function setAptoIea($apto_iea)
    {
        $this->apto_iea = $apto_iea;

        return $this;
    }

    /**
     * Get apto_iea
     *
     * @return boolean
     */
    public function getAptoIea()
    {
        return $this->apto_iea;
    }

    /**
     * Set calificacion_pi
     *
     * @param string $calificacion_pi
     *
     * @return EvaluacionFases
     */
    public function setCalificacionPi($calificacion_pi)
    {
        $this->calificacion_pi = $calificacion_pi;

        return $this;
    }

    /**
     * Get calificacion_pi
     *
     * @return string
     */
    public function getCalificacionPi()
    {
        return $this->calificacion_pi;
    }

    /**
     * Set apto_pi
     *
     * @param boolean $apto_pi
     *
     * @return EvaluacionFases
     */
    public function setAptoPi($apto_pi)
    {
        $this->apto_pi = $apto_pi;

        return $this;
    }

    /**
     * Get apto_pi
     *
     * @return boolean
     */
    public function getAptoPi()
    {
        return $this->apto_pi;
    }

    /**
     * Set calificacion_pn
     *
     * @param string $calificacion_pn
     *
     * @return EvaluacionFases
     */
    public function setCalificacionPn($calificacion_pn)
    {
        $this->calificacion_pn = $calificacion_pn;

        return $this;
    }

    /**
     * Get calificacion_pn
     *
     * @return string
     */
    public function getCalificacionPn()
    {
        return $this->calificacion_pn;
    }

    /**
     * Set apto_pn
     *
     * @param boolean $apto_pn
     *
     * @return EvaluacionFases
     */
    public function setAptoPn($apto_pn)
    {
        $this->apto_pn = $apto_pn;

        return $this;
    }

    /**
     * Get apto_pn
     *
     * @return boolean
     */
    public function getAptoPn()
    {
        return $this->apto_pn;
    }

    /**
     * Set noAprobado
     *
     * @param boolean $noAprobado
     *
     * @return EvaluacionFases
     */
    public function setNoAprobado($noAprobado)
    {
        $this->no_aprobado = $noAprobado;

        return $this;
    }

    /**
     * Get noAprobado
     *
     * @return boolean
     */
    public function getNoAprobado()
    {
        return $this->no_aprobado;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return EvaluacionFases
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

