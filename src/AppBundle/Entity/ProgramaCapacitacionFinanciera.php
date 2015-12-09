<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProgramaCapacitacionFinanciera
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ProgramaCapacitacionFinanciera
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Talento")
     */
    private $talento_financiero;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string")
     */
    private $lugar;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
<<<<<<< HEAD
     * @var integer
     *
     * @ORM\Column(name="usuario_modificacion", type="integer", nullable=true)
=======
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
>>>>>>> 153ed3a80b20d6f05899480a329cdb202f3f2bc3
     */
    private $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    /**
<<<<<<< HEAD
     * @var integer
     *
     * @ORM\Column(name="usuario_creacion", type="integer", nullable=true)
=======
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
>>>>>>> 153ed3a80b20d6f05899480a329cdb202f3f2bc3
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
     * Set talentoFinanciero
     *
     * @param AppBundle\Entity\Talento $talentoFinanciero
     *
     * @return ProgramaCapacitacionFinanciera
     */
    public function setTalentoFinanciero(\AppBundle\Entity\Talento $talentoFinanciero)
    {
        $this->talento_financiero = $talentoFinanciero;

        return $this;
    }

    /**
     * Get talentoFinanciero
     *
     * @return AppBundle\Entity\Talento
     */
    public function getTalentoFinanciero()
    {
        return $this->talento_financiero;
    }

    /**
     * Set estado
     *
     * @param AppBundle\Entity\Listas $estado
     *
     * @return ProgramaCapacitacionFinanciera
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
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return ProgramaCapacitacionFinanciera
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
     * Set lugar
     *
     * @param string $lugar
     *
     * @return ProgramaCapacitacionFinanciera
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return ProgramaCapacitacionFinanciera
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
     * @return ProgramaCapacitacionFinanciera
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
     * @return ProgramaCapacitacionFinanciera
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
     * @return ProgramaCapacitacionFinanciera
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
     * @return ProgramaCapacitacionFinanciera
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

