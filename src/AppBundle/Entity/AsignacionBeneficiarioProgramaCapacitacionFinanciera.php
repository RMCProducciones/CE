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
     * @var integer
     *
     * @ORM\Column(name="programaCapacitacionFinanciera", type="integer")
     */
    private $programaCapacitacionFinanciera;

    /**
     * @var integer
     *
     * @ORM\Column(name="beneficiario", type="integer")
     */
    private $beneficiario;

    /**
     * @var integer
     *
     * @ORM\Column(name="participante", type="integer")
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
     * Set programaCapacitacionFinanciera
     *
     * @param integer $programaCapacitacionFinanciera
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
     */
    public function setProgramaCapacitacionFinanciera($programaCapacitacionFinanciera)
    {
        $this->programaCapacitacionFinanciera = $programaCapacitacionFinanciera;

        return $this;
    }

    /**
     * Get programaCapacitacionFinanciera
     *
     * @return integer
     */
    public function getProgramaCapacitacionFinanciera()
    {
        return $this->programaCapacitacionFinanciera;
    }

    /**
     * Set beneficiario
     *
     * @param integer $beneficiario
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return integer
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set participante
     *
     * @param integer $participante
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
     */
    public function setParticipante($participante)
    {
        $this->participante = $participante;

        return $this;
    }

    /**
     * Get participante
     *
     * @return integer
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
     * @param integer $usuarioModificacion
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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
     * @param integer $usuarioCreacion
     *
     * @return AsignacionBeneficiarioProgramaCapacitacionFinanciera
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

