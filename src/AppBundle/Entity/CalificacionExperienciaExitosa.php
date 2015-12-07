<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalificacionExperienciaExitosa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CalificacionExperienciaExitosaRepository")
 */
class CalificacionExperienciaExitosa
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
     * @ORM\Column(name="experienciaExitosa", type="integer")
     */
    private $experienciaExitosa;

    /**
     * @var integer
     *
     * @ORM\Column(name="categoria", type="integer")
     */
    private $categoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion", type="integer")
     */
    private $calificacion;

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
     * Set experienciaExitosa
     *
     * @param integer $experienciaExitosa
     *
     * @return CalificacionExperienciaExitosa
     */
    public function setExperienciaExitosa($experienciaExitosa)
    {
        $this->experienciaExitosa = $experienciaExitosa;

        return $this;
    }

    /**
     * Get experienciaExitosa
     *
     * @return integer
     */
    public function getExperienciaExitosa()
    {
        return $this->experienciaExitosa;
    }

    /**
     * Set categoria
     *
     * @param integer $categoria
     *
     * @return CalificacionExperienciaExitosa
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set calificacion
     *
     * @param integer $calificacion
     *
     * @return CalificacionExperienciaExitosa
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    /**
     * Get calificacion
     *
     * @return integer
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return CalificacionExperienciaExitosa
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
     * @return CalificacionExperienciaExitosa
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
     * @return CalificacionExperienciaExitosa
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
     * @return CalificacionExperienciaExitosa
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
     * @return CalificacionExperienciaExitosa
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

