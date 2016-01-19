<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionIntegranteComite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionIntegranteComiteRepository")
 */
class AsignacionIntegranteComite
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\IntegranteComite")
     */
    private $integrante;

    /**
     * @var string
     *
     * @ORM\Column(name="comite", type="string")
     */
    private $comite;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $rol;

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
     * Set integrante
     *
     * @param AppBundle\Entity\IntegranteComite $integrante
     *
     * @return AsignacionIntegranteComite
     */
    public function setIntegrante(\AppBundle\Entity\IntegranteComite $integrante)
    {
        $this->integrante = $integrante;

        return $this;
    }

    /**
     * Get integrante
     *
     * @return AppBundle\Entity\IntegranteComite
     */
    public function getIntegrante()
    {
        return $this->integrante;
    }

    /**
     * Set comite
     *
     * @param string $comite
     *
     * @return AsignacionIntegranteComite
     */
    public function setComite($comite)
    {
        $this->comite = $comite;

        return $this;
    }

    /**
     * Get comite
     *
     * @return string
     */
    public function getComite()
    {
        return $this->comite;
    }

    /**
     * Set rol
     *
     * @param AppBundle\Entity\Listas $rol
     *
     * @return AsignacionIntegranteComite
     */
    public function setRol(\AppBundle\Entity\Listas $rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return AppBundle\Entity\Listas
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionIntegranteComite
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
     * @return AsignacionIntegranteComite
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
     * @return AsignacionIntegranteComite
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
     * @return AsignacionIntegranteComite
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
     * @return AsignacionIntegranteComite
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

