<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionMunicipioMunicipio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AsignacionMunicipioMunicipio
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipioSeleccionado;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipioAsignado;

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
     * Set programaCapacitacionFinanciera
     *
     * @param AppBundle\Entity\ProgramaCapacitacionFinanciera $programaCapacitacionFinanciera
     *
     * @return AsignacionMunicipioMunicipio
     */
    public function setProgramaCapacitacionFinanciera(\AppBundle\Entity\ProgramaCapacitacionFinanciera $programaCapacitacionFinanciera)
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
     * Set municipioSeleccionado
     *
     * @param AppBundle\Entity\Municipio $municipioSeleccionado
     *
     * @return AsignacionMunicipioMunicipio
     */
    public function setMunicipioSeleccionado(\AppBundle\Entity\Municipio $municipioSeleccionado)
    {
        $this->municipioSeleccionado = $municipioSeleccionado;

        return $this;
    }

    /**
     * Get municipioSeleccionado
     *
     * @return AppBundle\Entity\Municipio
     */
    public function getmunicipioSeleccionado()
    {
        return $this->municipioSeleccionado;
    }

    /**
     * Set municipioAsignado
     *
     * @param AppBundle\Entity\Municipio $municipioAsignado
     *
     * @return AsignacionMunicipioMunicipio
     */
    public function setMunicipioAsignado(\AppBundle\Entity\Municipio $municipioAsignado)
    {
        $this->municipioAsignado = $municipioAsignado;

        return $this;
    }

    /**
     * Get municipioAsignado
     *
     * @return AppBundle\Entity\Municipio
     */
    public function getMunicipioAsignado()
    {
        return $this->municipioAsignado;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionMunicipioMunicipio
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
     * @return AsignacionMunicipioMunicipio
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
     * @return AsignacionMunicipioMunicipio
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
     * @return AsignacionMunicipioMunicipio
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
     * @return AsignacionMunicipioMunicipio
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

