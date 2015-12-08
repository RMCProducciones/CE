<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionBeneficiarioAhorro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionBeneficiarioAhorroRepository")
 */
class AsignacionBeneficiarioAhorro
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
     * @var boolean
     *
     * @ORM\Column(name="beneficiario_ahorro_otro_programa", type="boolean")
     */
    private $beneficiario_ahorro_otro_programa;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string")
     */
    private $telefono_celular;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_ahorro_activacion", type="decimal")
     */
    private $meta_ahorro_activacion;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_ahorro_mensual", type="decimal")
     */
    private $meta_ahorro_mensual;

    /**
     * @var string
     *
     * @ORM\Column(name="plan_ahorro_individual", type="decimal")
     */
    private $plan_ahorro_individual;
	
	
	/**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string")
     */	 
    private $observacion;
	
	
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
     * Set ahorro
     *
     * @param AppBundle\Entity\Ahorro $ahorro
     *
     * @return AsignacionBeneficiarioAhorro
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
     * @return AsignacionBeneficiarioAhorro
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
     * Set beneficiarioAhorroOtroPrograma
     *
     * @param boolean $beneficiarioAhorroOtroPrograma
     *
     * @return AsignacionBeneficiarioAhorro
     */
    public function setBeneficiarioAhorroOtroPrograma($beneficiarioAhorroOtroPrograma)
    {
        $this->beneficiario_ahorro_otro_programa = $beneficiarioAhorroOtroPrograma;

        return $this;
    }

    /**
     * Get beneficiarioAhorroOtroPrograma
     *
     * @return boolean
     */
    public function getBeneficiarioAhorroOtroPrograma()
    {
        return $this->beneficiario_ahorro_otro_programa;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     *
     * @return AsignacionBeneficiarioAhorro
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
     * Set metaAhorroActivacion
     *
     * @param string $metaAhorroActivacion
     *
     * @return AsignacionBeneficiarioAhorro
     */
    public function setMetaAhorroActivacion($metaAhorroActivacion)
    {
        $this->meta_ahorro_activacion = $metaAhorroActivacion;

        return $this;
    }

    /**
     * Get metaAhorroActivacion
     *
     * @return string
     */
    public function getMetaAhorroActivacion()
    {
        return $this->meta_ahorro_activacion;
    }

    /**
     * Set metaAhorroMensual
     *
     * @param string $metaAhorroMensual
     *
     * @return AsignacionBeneficiarioAhorro
     */
    public function setMetaAhorroMensual($metaAhorroMensual)
    {
        $this->meta_ahorro_mensual = $metaAhorroMensual;

        return $this;
    }

    /**
     * Get metaAhorroMensual
     *
     * @return string
     */
    public function getMetaAhorroMensual()
    {
        return $this->meta_ahorro_mensual;
    }

    /**
     * Set planAhorroIndividual
     *
     * @param string $planAhorroIndividual
     *
     * @return AsignacionBeneficiarioAhorro
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
     * Set observacion
     *
     * @param string $observacion
     *
     * @return AsignacionBeneficiarioAhorro
     */
public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionBeneficiarioAhorro
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
     * @return AsignacionBeneficiarioAhorro
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
     * @return AsignacionBeneficiarioAhorro
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
     * @return AsignacionBeneficiarioAhorro
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
     * @return AsignacionBeneficiarioAhorro
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

