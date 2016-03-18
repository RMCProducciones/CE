<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poliza
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Poliza
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="consecutivo", type="integer")
     */
    private $consecutivo;

    /**
     * @var string
     *
     * @ORM\Column(name="cofinanciacion", type="decimal")
     */
    private $cofinanciacion;

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
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return Poliza
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
     * Set estado
     *
     * @param AppBundle\Entity\Listas $estado
     *
     * @return Poliza
     */
    public function setEstado(\AppBundle\Entity\Listas $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return AppBundle\Entity\Listas
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set consecutivo
     *
     * @param integer $consecutivo
     *
     * @return Poliza
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;

        return $this;
    }

    /**
     * Get consecutivo
     *
     * @return integer
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }

    /**
     * Set cofinanciacion
     *
     * @param string $cofinanciacion
     *
     * @return Poliza
     */
    public function setCofinanciacion($cofinanciacion)
    {
        $this->cofinanciacion = $cofinanciacion;

        return $this;
    }

    /**
     * Get cofinanciacion
     *
     * @return string
     */
    public function getCofinanciacion()
    {
        return $this->cofinanciacion;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Poliza
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
     * @return Poliza
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
     * @return Poliza
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
     * @return Poliza
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
     * @return Poliza
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

