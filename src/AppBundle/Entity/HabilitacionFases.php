<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HabilitacionFases
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class HabilitacionFases
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mot_formal", type="boolean", nullable = true)
     */
    private $mot_formal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mot_no_formal", type="boolean", nullable = true)
     */
    private $mot_no_formal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iea", type="boolean", nullable = true)
     */
    private $iea;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pi", type="boolean", nullable = true)
     */
    private $pi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pn", type="boolean", nullable = true)
     */
    private $pn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="no_aprobado", type="boolean", nullable = true)
     */
    private $no_aprobado;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string")
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
     * @return HabilitacionFases
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
     * Set motFormal
     *
     * @param boolean $motFormal
     *
     * @return HabilitacionFases
     */
    public function setMotFormal($motFormal)
    {
        $this->mot_formal = $motFormal;

        return $this;
    }

    /**
     * Get motFormal
     *
     * @return boolean
     */
    public function getMotFormal()
    {
        return $this->mot_formal;
    }

    /**
     * Set motNoFormal
     *
     * @param boolean $motNoFormal
     *
     * @return HabilitacionFases
     */
    public function setMotNoFormal($motNoFormal)
    {
        $this->mot_no_formal = $motNoFormal;

        return $this;
    }

    /**
     * Get motNoFormal
     *
     * @return boolean
     */
    public function getMotNoFormal()
    {
        return $this->mot_no_formal;
    }

    /**
     * Set iea
     *
     * @param boolean $iea
     *
     * @return HabilitacionFases
     */
    public function setIea($iea)
    {
        $this->iea = $iea;

        return $this;
    }

    /**
     * Get iea
     *
     * @return boolean
     */
    public function getIea()
    {
        return $this->iea;
    }

    /**
     * Set pi
     *
     * @param boolean $pi
     *
     * @return HabilitacionFases
     */
    public function setPi($pi)
    {
        $this->pi = $pi;

        return $this;
    }

    /**
     * Get pi
     *
     * @return boolean
     */
    public function getPi()
    {
        return $this->pi;
    }

    /**
     * Set pn
     *
     * @param boolean $pn
     *
     * @return HabilitacionFases
     */
    public function setPn($pn)
    {
        $this->pn = $pn;

        return $this;
    }

    /**
     * Get pn
     *
     * @return boolean
     */
    public function getPn()
    {
        return $this->pn;
    }

    /**
     * Set no_aprobador
     *
     * @param boolean $no_aprobado
     *
     * @return HabilitacionFases
     */
    public function setNoAprobado($no_aprobado)
    {
        $this->no_aprobado = $no_aprobado;

        return $this;
    }

    /**
     * Get no_aprobado
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
     * @return HabilitacionFases
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
     * @return HabilitacionFases
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
     * @return HabilitacionFases
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
     * @return HabilitacionFases
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
     * @return HabilitacionFases
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
     * @return HabilitacionFases
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

