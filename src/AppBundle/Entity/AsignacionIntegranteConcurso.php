<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionIntegranteConcurso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AsignacionIntegranteConcursoRepository")
 */
class AsignacionIntegranteConcurso
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concurso")
     */
    private $concurso;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Integrante")
     */
    private $integrante;

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
     * Set concurso
     *
     * @param AppBundle\Entity\Concurso $Concurso
     *
     * @return AsignacionIntegranteConcurso
     */
    public function setConcurso(\AppBundle\Entity\Concurso $concurso)
    {
        $this->concurso = $concurso;

        return $this;
    }

    /**
     * Get clear
     *
     * @return AppBundle\Entity\Concurso
     */
    public function getConcurso()
    {
        return $this->concurso;
    }

    /**
     * Set integrante
     *
     * @param AppBundle\Entity\Integrante $integrante
     *
     * @return AsignacionIntegranteConcurso
     */
    public function setIntegrante(\AppBundle\Entity\Integrante $integrante)
    {
        $this->integrante = $integrante;

        return $this;
    }

    /**
     * Get integrante
     *
     * @return AppBundle\Entity\Integrante
     */
    public function getIntegrante()
    {
        return $this->integrante;
    } 

    /**
     * Set rol
     *
     * @param AppBundle\Entity\Listas $rol
     *
     * @return AsignacionIntegranteConcurso
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
     * @return AsignacionIntegranteConcurso
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
     * @return AsignacionIntegranteConcurso
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
     * @return AsignacionIntegranteConcurso
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
     * @return AsignacionIntegranteConcurso
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
     * @return AsignacionIntegranteConcurso
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
