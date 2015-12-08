<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PolizaSoporte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PolizaSoporteRepository")
 */
class PolizaSoporte
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Poliza")
     */
    private $poliza;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $tipo_soporte;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="consecutivo", type="integer")
     */
    private $consecutivo;

    /**
     * @var string
     *
     * @ORM\Column(name="cofinanciacion", type="decimal")
     */
    private $cofinanciacion;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string")
     */
    private $path;

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
     * Set poliza
     *
     * @param AppBundle\Entity\Poliza $poliza
     *
     * @return PolizaSoporte
     */
    public function setPoliza(\AppBundle\Entity\Poliza $poliza)
    {
        $this->poliza = $poliza;

        return $this;
    }

    /**
     * Get poliza
     *
     * @return AppBundle\Entity\Poliza
     */
    public function getPoliza()
    {
        return $this->poliza;
    }

    /**
     * Set tipoSoporte
     *
     * @param AppBundle\Entity\Listas $tipoSoporte
     *
     * @return PolizaSoporte
     */
    public function setTipoSoporte(\AppBundle\Entity\Listas $tipoSoporte)
    {
        $this->tipo_soporte = $tipoSoporte;

        return $this;
    }

    /**
     * Get tipoSoporte
     *
     * @return AppBundle\Entity\Listas
     */
    public function getTipoSoporte()
    {
        return $this->tipo_soporte;
    }

    /**
     * Set estado
     *
     * @param AppBundle\Entity\Listas $estado
     *
     * @return PolizaSoporte
     */
    public function setEstado(\AppBundle\Entity\Listas $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return AppBundle\Entity\Listas
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set consecutivo
     *
     * @param integer $consecutivo
     *
     * @return PolizaSoporte
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;

        return $this;
    }

    /**
     * Get consecutivo
     *
     * @return integer
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }

    /**
     * Set cofinanciacion
     *
     * @param string $cofinanciacion
     *
     * @return PolizaSoporte
     */
    public function setCofinanciacion($cofinanciacion)
    {
        $this->cofinanciacion = $cofinanciacion;

        return $this;
    }

    /**
     * Get cofinanciacion
     *
     * @return string
     */
    public function getCofinanciacion()
    {
        return $this->cofinanciacion;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return PolizaSoporte
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return PolizaSoporte
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
     * @return PolizaSoporte
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
     * @return PolizaSoporte
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
     * @return PolizaSoporte
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
     * @return PolizaSoporte
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

