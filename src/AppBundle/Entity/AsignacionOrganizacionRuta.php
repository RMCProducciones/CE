<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionOrganizacionRuta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionOrganizacionRutaRepository")
 */
class AsignacionOrganizacionRuta
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Organizacion")
     */
    private $organizacion;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ruta")
     */
    private $ruta;

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
     * Set organizacion
     *
     * @param AppBundle\Entity\Grupo $organizacion
     *
     * @return AsignacionOrganizacionRuta
     */
    public function setOrganizacion(\AppBundle\Entity\Organizacion $organizacion)
    {
        $this->organizacion = $organizacion;

        return $this;
    }

    /**
     * Get organizacion
     *
     * @return AppBundle\Entity\Organizacion
     */
    public function getOrganizacion()
    {
        return $this->organizacion;
    }

    /**
     * Set ruta
     *
     * @param AppBundle\Entity\Ruta $ruta
     *
     * @return AsignacionOrganizacionRuta
     */
    public function setRuta(\AppBundle\Entity\Ruta $ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return AppBundle\Entity\Ruta
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set habilitacion
     *
     * @param boolean $habilitacion
     *
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
     * @return AsignacionOrganizacionRuta
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
