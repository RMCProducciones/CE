<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionGrupoComite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionGrupoComiteRepository")
 */
class AsignacionGrupoComite
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comite")
     */
    private $comite;

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
     * @return AsignacionGrupoComite
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
     * Set comite
     *
     * @param AppBundle\Entity\Comite $comite
     *
     * @return AsignacionGrupoComite
     */
    public function setComite(\AppBundle\Entity\Comite $comite)
    {
        $this->comite = $comite;

        return $this;
    }

    /**
     * Get comite
     *
     * @return AppBundle\Entity\Comite
     */
    public function getComite()
    {
        return $this->comite;
    }

    /**
     * Set habilitacion
     *
     * @param boolean $habilitacion
     *
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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
     * @return AsignacionGrupoComite
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

