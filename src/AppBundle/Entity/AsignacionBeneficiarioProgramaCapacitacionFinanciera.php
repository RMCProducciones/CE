<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionBeneficiarioProgramaCapacitacionFinanciera
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Participante")
     */
    private $participante;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracion_inicial", type="integer")
     */
    private $valoracion_inicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracion_final", type="integer")
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
     * @ORM\Column(name="fecha_modificacion", type="datetime")
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * Set participante
     *
     * @param AppBundle\Entity\Participante $participante
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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

