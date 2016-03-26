<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionBeneficiarioPoliza
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AsignacionBeneficiarioPoliza
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poliza")
     */
    private $poliza;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Beneficiario")
     */
    private $beneficiario;

    /**
     * @var boolean
     *
     * @ORM\Column(name="beneficiario_poliza_otro_programa", type="boolean")
     */
    private $beneficiario_poliza_otro_programa;

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
     * Set poliza
     *
     * @param AppBundle\Entity\Poliza $poliza
     *
     * @return AsignacionBeneficiarioPoliza
     */
    public function setPoliza(\AppBundle\Entity\Poliza $poliza)
    {
        $this->poliza = $poliza;

        return $this;
    }

    /**
     * Get poliza
     *
     * @return AppBundle\Entity\Poliza
     */
    public function getPoliza()
    {
        return $this->poliza;
    }

    /**
     * Set beneficiario
     *
     * @param AppBundle\Entity\Beneficiario $beneficiario
     *
     * @return AsignacionBeneficiarioPoliza
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
     * Set beneficiarioPolizaOtroPrograma
     *
     * @param boolean $beneficiarioPolizaOtroPrograma
     *
     * @return AsignacionBeneficiarioPoliza
     */
    public function setBeneficiarioPolizaOtroPrograma($beneficiarioPolizaOtroPrograma)
    {
        $this->beneficiario_poliza_otro_programa = $beneficiarioPolizaOtroPrograma;

        return $this;
    }

    /**
     * Get beneficiarioPolizaOtroPrograma
     *
     * @return boolean
     */
    public function getBeneficiarioPolizaOtroPrograma()
    {
        return $this->beneficiario_poliza_otro_programa;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return AsignacionBeneficiarioPoliza
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
     * @return AsignacionBeneficiarioPoliza
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
     * @return AsignacionBeneficiarioPoliza
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
     * @return AsignacionBeneficiarioPoliza
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
     * @return AsignacionBeneficiarioPoliza
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
     * @return AsignacionBeneficiarioPoliza
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

