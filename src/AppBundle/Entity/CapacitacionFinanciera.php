<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CapacitacionFinanciera
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CapacitacionFinanciera
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProgramaCapacitacionFinanciera")
     */
    private $programaCapacitacionFinanciera;

    /**
     * @var integer
     *
     * @ORM\Column(name="modulo", type="integer")
     */
    private $modulo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

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
     * Set programaCapacitacionFinanciera
     *
     * @param AppBundle\Entity\ProgramaCapacitacionFinanciera $programaCapacitacionFinanciera
     *
     * @return CapacitacionFinanciera
     */
    public function setProgramaCapacitacionFinanciera(\AppBundle\Entity\ProgramaCapacitacionFinanciera$programaCapacitacionFinanciera)
    {
        $this->programaCapacitacionFinanciera = $programaCapacitacionFinanciera;

        return $this;
    }

    /**
     * Get programaCapacitacionFinanciera
     *
     * @return AppBundle\Entity\ProgramaCapacitacionFinanciera
     */
    public function getProgramaCapacitacionFinanciera()
    {
        return $this->programaCapacitacionFinanciera;
    }

    /**
     * Set modulo
     *
     * @param integer $modulo
     *
     * @return CapacitacionFinanciera
     */
    public function setModulo($modulo)
    {
        $this->modulo = $modulo;

        return $this;
    }

    /**
     * Get modulo
     *
     * @return integer
     */
    public function getModulo()
    {
        return $this->modulo;
    }

    /**
     * Set estado
     *
     * @param AppBundle\Entity\Listas $estado
     *
     * @return CapacitacionFinanciera
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return CapacitacionFinanciera
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return CapacitacionFinanciera
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
     * @return CapacitacionFinanciera
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
     * @return CapacitacionFinanciera
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
     * @return CapacitacionFinanciera
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
     * @return CapacitacionFinanciera
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

