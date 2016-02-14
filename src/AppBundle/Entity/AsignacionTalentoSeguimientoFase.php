<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionTalentoSeguimientoFase
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AsignacionTalentoSeguimientoFase
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SeguimientoFase")
     */
    private $seguimientoFase;

    /**
     * @var integer
     *
     * @ORM\Column(name="seguimientoFase", type="integer")
     */
    private $seguimientoMOT;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Talento")
     */
    private $talento;

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
     * Set seguimientoFase
     *
     * @param AppBundle\Entity\SeguimientoFase $seguimientoFase
     *
     * @return AsignacionTalentoSeguimientoFase
     */
    public function setSeguimientoFase(\AppBundle\Entity\SeguimientoFase $seguimientoFase)
    {
        $this->seguimientoFase = $seguimientoFase;

        return $this;
    }

    /**
     * Get seguimientoFase
     *
     * @return AppBundle\Entity\SeguimientoFase
     */
    public function getSeguimientoFase()
    {
        return $this->seguimientoFase;
    }

    /**
     * Set seguimientoMOT
     *
     * @param integer $seguimientoMOT
     *
     * @return AsignacionTalentoSeguimientoFase
     */
    public function setSeguimientoMOT($seguimientoMOT)
    {
        $this->seguimientoMOT = $seguimientoMOT;

        return $this;
    }

    /**
     * Get seguimientoMOT
     *
     * @return integer
     */
    public function getSeguimientoMOT()
    {
        return $this->seguimientoMOT;
    }

    /**
     * Set talento
     *
     * @param AppBundle\Entity\Talento $talento
     *
     * @return AsignacionTalentoSeguimientoFase
     */
    public function setTalento(\AppBundle\Entity\Talento $talento)
    {
        $this->talento = $talento;

        return $this;
    }

    /**
     * Get talento
     *
     * @return AppBundle\Entity\Talento
     */
    public function getTalento()
    {
        return $this->talento;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return AsignacionTalentoSeguimientoFase
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
     * @return AsignacionTalentoSeguimientoFase
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
     * @return AsignacionTalentoSeguimientoFase
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
     * @return AsignacionTalentoSeguimientoFase
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
     * @return AsignacionTalentoSeguimientoFase
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

