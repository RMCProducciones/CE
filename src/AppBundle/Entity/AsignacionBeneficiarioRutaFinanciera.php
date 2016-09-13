<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionBeneficiarioRutaFinanciera
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AsignacionBeneficiarioRutaFinanciera
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Beneficiario")
     */
    private $beneficiario;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Participante")
     */
    private $participante;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracion_inicial", type="integer", nullable=true)
     */
    private $valoracion_inicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracion_final", type="integer", nullable=true)
     */
    private $valoracion_final;

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
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * Set beneficiario
     *
     * @param AppBundle\Entity\Beneficiario $beneficiario
     *
     * @return AsignacionBeneficiarioRutaFinanciera
     */
    public function setBeneficiario(\AppBundle\Entity\Beneficiario $beneficiario)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return AppBundle\Entity\Beneficiario
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * Set participante
     *
     * @param AppBundle\Entity\Participante $participante
     *
     * @return AsignacionBeneficiarioRutaFinanciera
     */
    public function setParticipante(\AppBundle\Entity\Participante$participante)
    {
        $this->participante = $participante;

        return $this;
    }

    /**
     * Get participante
     *
     * @return AppBundle\Entity\Participante
     */
    public function getParticipante()
    {
        return $this->participante;
    }

    /**
     * Set valoracionInicial
     *
     * @param integer $valoracionInicial
     *
     * @return AsignacionBeneficiarioRutaFinanciera
     */
    public function setValoracionInicial($valoracionInicial)
    {
        $this->valoracion_inicial = $valoracionInicial;

        return $this;
    }

    /**
     * Get valoracionInicial
     *
     * @return integer
     */
    public function getValoracionInicial()
    {
        return $this->valoracion_inicial;
    }

    /**
     * Set valoracionFinal
     *
     * @param integer $valoracionFinal
     *
     * @return AsignacionBeneficiarioRutaFinanciera
     */
    public function setValoracionFinal($valoracionFinal)
    {
        $this->valoracion_final = $valoracionFinal;

        return $this;
    }

    /**
     * Get valoracionFinal
     *
     * @return integer
     */
    public function getValoracionFinal()
    {
        return $this->valoracion_final;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * @return AsignacionBeneficiarioRutaFinanciera
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
     * @return AsignacionBeneficiarioRutaFinanciera
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

