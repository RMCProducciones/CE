<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionBeneficiarioComiteVamosBien
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionBeneficiarioComiteVamosBienRepository")
 */
class AsignacionBeneficiarioComiteVamosBien
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Beneficiario")
     */
    private $beneficiario;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habilitacion", type="boolean", nullable = true)
     */
    private $habilitacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="asignacion", type="boolean", nullable = true)
     */
    private $asignacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contraloria_social", type="boolean", nullable = true)
     */
    private $contraloria_social;

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
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable = true)
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
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return AsignacionBeneficiarioComiteVamosBien
     */
    public function setGrupo(\AppBundle\Entity\Grupo $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return AppBundle\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set beneficiario
     *
     * @param AppBundle\Entity\Beneficiario $beneficiario
     *
     * @return AsignacionBeneficiarioComiteVamosBien
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
     * Set habilitacion
     *
     * @param boolean $habilitacion
     *
     * @return AsignacionBeneficiarioComiteVamosBien
     */
    public function setHabilitacion($habilitacion)
    {
        $this->habilitacion = $habilitacion;

        return $this;
    }

    /**
     * Get habilitacion
     *
     * @return boolean
     */
    public function getHabilitacion()
    {
        return $this->habilitacion;
    }

    /**
     * Set asignacion
     *
     * @param boolean $asignacion
     *
     * @return AsignacionBeneficiarioComiteVamosBien
     */
    public function setAsignacion($asignacion)
    {
        $this->asignacion = $asignacion;

        return $this;
    }

    /**
     * Get asignacion
     *
     * @return boolean
     */
    public function getAsignacion()
    {
        return $this->asignacion;
    }

    /**
     * Set contraloriaSocial
     *
     * @param boolean $contraloriaSocial
     *
     * @return AsignacionBeneficiarioComiteVamosBien
     */
    public function setContraloriaSocial($contraloriaSocial)
    {
        $this->contraloria_social = $contraloriaSocial;

        return $this;
    }

    /**
     * Get contraloriaSocial
     *
     * @return boolean
     */
    public function getContraloriaSocial()
    {
        return $this->contraloria_social;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionBeneficiarioComiteVamosBien
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
     * @return AsignacionBeneficiarioComiteVamosBien
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
     * @return AsignacionBeneficiarioComiteVamosBien
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
     * @return AsignacionBeneficiarioComiteVamosBien
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
     * @return AsignacionBeneficiarioComiteVamosBien
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

