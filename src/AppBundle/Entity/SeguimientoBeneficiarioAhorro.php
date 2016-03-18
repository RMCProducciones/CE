<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeguimientoBeneficiarioAhorro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SeguimientoBeneficiarioAhorroRepository")
 */
class SeguimientoBeneficiarioAhorro
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AsignacionBeneficiarioAhorro")
     */
    private $asignacionBeneficiarioAhorro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_apertura", type="datetime")
     */
    private $fecha_apertura;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo_apertura", type="decimal")
     */
    private $saldo_apertura;

    /**
     * @var string
     *
     * @ORM\Column(name="incentivo_apertura", type="decimal")
     */
    private $incentivo_apertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_corte_1", type="datetime")
     */
    private $fecha_corte_1;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo_corte_1", type="decimal")
     */
    private $saldo_corte_1;

    /**
     * @var string
     *
     * @ORM\Column(name="incentivo_corte_1", type="decimal")
     */
    private $incentivo_corte_1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_corte_2", type="datetime")
     */
    private $fecha_corte_2;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo_corte_2", type="decimal")
     */
    private $saldo_corte_2;

    /**
     * @var string
     *
     * @ORM\Column(name="incentivo_corte_2", type="decimal")
     */
    private $incentivo_corte_2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_corte_final", type="datetime")
     */
    private $fecha_corte_final;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo_corte_final", type="decimal")
     */
    private $saldo_corte_final;

    /**
     * @var string
     *
     * @ORM\Column(name="incentivo_corte_final", type="decimal")
     */
    private $incentivo_corte_final;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_incumplimiento", type="integer")
     */
    private $numero_incumplimiento;

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
     * Set asignacionBeneficiarioAhorro
     *
     * @param AppBundle\Entity\AsignacionBeneficiarioAhorro $asignacionBeneficiarioAhorro
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setBeneficiario(\AppBundle\Entity\AsignacionBeneficiarioAhorro $asignacionBeneficiarioAhorro)
    {
        $this->asignacion_beneficiario_ahorro = $asignacionBeneficiarioAhorro;

        return $this;
    }

    /**
     * Get asignacionBeneficiarioAhorro
     *
     * @return AppBundle\Entity\AsignacionBeneficiarioAhorro
     */
    public function getBeneficiario()
    {
        return $this->asignacion_beneficiario_ahorro;
    }

    /**
     * Set fechaApertura
     *
     * @param \DateTime $fechaApertura
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setFechaApertura($fechaApertura)
    {
        $this->fecha_apertura = $fechaApertura;

        return $this;
    }

    /**
     * Get fechaApertura
     *
     * @return \DateTime
     */
    public function getFechaApertura()
    {
        return $this->fecha_apertura;
    }

    /**
     * Set saldoApertura
     *
     * @param string $saldoApertura
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setSaldoApertura($saldoApertura)
    {
        $this->saldo_apertura = $saldoApertura;

        return $this;
    }

    /**
     * Get saldoApertura
     *
     * @return string
     */
    public function getSaldoApertura()
    {
        return $this->saldo_apertura;
    }

    /**
     * Set incentivoApertura
     *
     * @param string $incentivoApertura
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setIncentivoApertura($incentivoApertura)
    {
        $this->incentivo_apertura = $incentivoApertura;

        return $this;
    }

    /**
     * Get incentivoApertura
     *
     * @return string
     */
    public function getIncentivoApertura()
    {
        return $this->incentivo_apertura;
    }

    /**
     * Set fechaCorte1
     *
     * @param \DateTime $fechaCorte1
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setFechaCorte1($fechaCorte1)
    {
        $this->fecha_corte_1 = $fechaCorte1;

        return $this;
    }

    /**
     * Get fechaCorte1
     *
     * @return \DateTime
     */
    public function getFechaCorte1()
    {
        return $this->fecha_corte_1;
    }

    /**
     * Set saldoCorte1
     *
     * @param string $saldoCorte1
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setSaldoCorte1($saldoCorte1)
    {
        $this->saldo_corte_1 = $saldoCorte1;

        return $this;
    }

    /**
     * Get saldoCorte1
     *
     * @return string
     */
    public function getSaldoCorte1()
    {
        return $this->saldo_corte_1;
    }

    /**
     * Set incentivoCorte1
     *
     * @param string $incentivoCorte1
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setIncentivoCorte1($incentivoCorte1)
    {
        $this->incentivo_corte_1 = $incentivoCorte1;

        return $this;
    }

    /**
     * Get incentivoCorte1
     *
     * @return string
     */
    public function getIncentivoCorte1()
    {
        return $this->incentivo_corte_1;
    }

    /**
     * Set fechaCorte2
     *
     * @param \DateTime $fechaCorte2
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setFechaCorte2($fechaCorte2)
    {
        $this->fecha_corte_2 = $fechaCorte2;

        return $this;
    }

    /**
     * Get fechaCorte2
     *
     * @return \DateTime
     */
    public function getFechaCorte2()
    {
        return $this->fecha_corte_2;
    }

    /**
     * Set saldoCorte2
     *
     * @param string $saldoCorte2
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setSaldoCorte2($saldoCorte2)
    {
        $this->saldo_corte_2 = $saldoCorte2;

        return $this;
    }

    /**
     * Get saldoCorte2
     *
     * @return string
     */
    public function getSaldoCorte2()
    {
        return $this->saldo_corte_2;
    }

    /**
     * Set incentivoCorte2
     *
     * @param string $incentivoCorte2
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setIncentivoCorte2($incentivoCorte2)
    {
        $this->incentivo_corte_2 = $incentivoCorte2;

        return $this;
    }

    /**
     * Get incentivoCorte2
     *
     * @return string
     */
    public function getIncentivoCorte2()
    {
        return $this->incentivo_corte_2;
    }

    /**
     * Set fechaCorteFinal
     *
     * @param \DateTime $fechaCorteFinal
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setFechaCorteFinal($fechaCorteFinal)
    {
        $this->fecha_corte_final = $fechaCorteFinal;

        return $this;
    }

    /**
     * Get fechaCorteFinal
     *
     * @return \DateTime
     */
    public function getFechaCorteFinal()
    {
        return $this->fecha_corte_final;
    }

    /**
     * Set saldoCorteFinal
     *
     * @param string $saldoCorteFinal
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setSaldoCorteFinal($saldoCorteFinal)
    {
        $this->saldo_corte_final = $saldoCorteFinal;

        return $this;
    }

    /**
     * Get saldoCorteFinal
     *
     * @return string
     */
    public function getSaldoCorteFinal()
    {
        return $this->saldo_corte_final;
    }

    /**
     * Set incentivoCorteFinal
     *
     * @param string $incentivoCorteFinal
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setIncentivoCorteFinal($incentivoCorteFinal)
    {
        $this->incentivo_corte_final = $incentivoCorteFinal;

        return $this;
    }

    /**
     * Get incentivoCorteFinal
     *
     * @return string
     */
    public function getIncentivoCorteFinal()
    {
        return $this->incentivo_corte_final;
    }

    /**
     * Set numeroIncumplimiento
     *
     * @param integer $numeroIncumplimiento
     *
     * @return SeguimientoBeneficiarioAhorro
     */
    public function setNumeroIncumplimiento($numeroIncumplimiento)
    {
        $this->numero_incumplimiento = $numeroIncumplimiento;

        return $this;
    }

    /**
     * Get numeroIncumplimiento
     *
     * @return integer
     */
    public function getNumeroIncumplimiento()
    {
        return $this->numero_incumplimiento;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return SeguimientoBeneficiarioAhorro
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
     * @return SeguimientoBeneficiarioAhorro
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
     * @return SeguimientoBeneficiarioAhorro
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
     * @return SeguimientoBeneficiarioAhorro
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
     * @return SeguimientoBeneficiarioAhorro
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

