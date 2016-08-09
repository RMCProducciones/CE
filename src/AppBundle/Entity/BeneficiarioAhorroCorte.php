<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BeneficiarioAhorroCorte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BeneficiarioAhorroCorteRepository")
 */
class BeneficiarioAhorroCorte
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ahorro")
     */
    private $ahorro;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Beneficiario")
     */
    private $beneficiario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_realizacion", type="datetime")
     */
    private $fecha_realizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string", nullable=true)
     */
    private $telefono_celular;

    /**
     * @var string
     *
     * @ORM\Column(name="ahorro_corte", type="decimal")
     */
    private $ahorro_corte;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_ahorro_corte", type="decimal", nullable=true)
     */
    private $meta_ahorro_corte;

    /**
     * @var string
     *
     * @ORM\Column(name="plan_ahorro_individual", type="decimal", nullable=true)
     */
    private $plan_ahorro_individual;
		
	/**
     * @var string
     *
     * @ORM\Column(name="cumplimiento_corte", type="decimal", nullable=true)
     */	 
    private $cumplimiento_corte;

    /**
     * @var string
     *
     * @ORM\Column(name="ahorro_real_corte", type="decimal", nullable=true)
     */  
    private $ahorro_real_corte;
    
    /**
     * @var string
     *
     * @ORM\Column(name="incentivo_corte", type="decimal", nullable=true)
     */  
    private $incentivo_corte;
		
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
     * Set ahorro
     *
     * @param AppBundle\Entity\Ahorro $ahorro
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setAhorro(\AppBundle\Entity\Ahorro $ahorro)
    {
        $this->ahorro = $ahorro;

        return $this;
    }

    /**
     * Get ahorro
     *
     * @return AppBundle\Entity\Ahorro
     */
    public function getAhorro()
    {
        return $this->ahorro;
    }

    /**
     * Set beneficiario
     *
     * @param AppBundle\Entity\Beneficiario $beneficiario
     *
     * @return BeneficiarioAhorroCorte
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
     * Set fechaRealizacion
     *
     * @param \DateTime $fechaRealizacion
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setFechaRealizacion($fechaRealizacion)
    {
        $this->fecha_realizacion = $fechaRealizacion;

        return $this;
    }

    /**
     * Get fechaRealizacion
     *
     * @return \DateTime
     */
    public function getFechaRealizacion()
    {
        return $this->fecha_realizacion;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefono_celular = $telefonoCelular;

        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string
     */
    public function getTelefonoCelular()
    {
        return $this->telefono_celular;
    }

    /**
     * Set ahorroCorte
     *
     * @param string $ahorroCorte
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setAhorroCorte($ahorroCorte)
    {
        $this->ahorro_corte = $ahorroCorte;

        return $this;
    }

    /**
     * Get ahorroCorte
     *
     * @return string
     */
    public function getAhorroCorte()
    {
        return $this->ahorro_corte;
    }

    /**
     * Set metaAhorroCorte
     *
     * @param string $metaAhorroCorte
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setMetaAhorroCorte($metaAhorroCorte)
    {
        $this->meta_ahorro_corte = $metaAhorroCorte;

        return $this;
    }

    /**
     * Get metaAhorroCorte
     *
     * @return string
     */
    public function getMetaAhorroCorte()
    {
        return $this->meta_ahorro_corte;
    }

    /**
     * Set planAhorroIndividual
     *
     * @param string $planAhorroIndividual
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setPlanAhorroIndividual($planAhorroIndividual)
    {
        $this->plan_ahorro_individual = $planAhorroIndividual;

        return $this;
    }
	

    /**
     * Get planAhorroIndividual
     *
     * @return string
     */
    public function getPlanAhorroIndividual()
    {
        return $this->plan_ahorro_individual;
    }
	
	/**
     * Set cumplimientoCorte
     *
     * @param string $cumplimientoCorte
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setCumplimientoCorte($cumplimientoCorte)
    {
        $this->cumplimiento_corte = $cumplimientoCorte;

        return $this;
    }

    /**
     * Get cumplimientoCorte
     *
     * @return string
     */
    public function getCumplimientoCorte()
    {
        return $this->cumplimiento_corte;
    }

    /**
     * Set ahorroRealCorte
     *
     * @param string $ahorroRealCorte
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setAhorroRealCorte($ahorroRealCorte)
    {
        $this->ahorro_real_corte = $ahorroRealCorte;

        return $this;
    }

    /**
     * Get ahorroRealCorte
     *
     * @return string
     */
    public function getAhorroRealCorte()
    {
        return $this->ahorro_real_corte;
    }

    /**
     * Set incentivoCorte
     *
     * @param string $incentivoCorte
     *
     * @return BeneficiarioAhorroCorte
     */
    public function setIncentivoCorte($incentivoCorte)
    {
        $this->incentivo_corte = $incentivoCorte;

        return $this;
    }

    /**
     * Get incentivoCorte
     *
     * @return string
     */
    public function getIncentivoCorte()
    {
        return $this->incentivo_corte;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return BeneficiarioAhorroCorte
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
     * @return BeneficiarioAhorroCorte
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
     * @return BeneficiarioAhorroCorte
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
     * @return BeneficiarioAhorroCorte
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
     * @return BeneficiarioAhorroCorte
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

