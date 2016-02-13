<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Activos
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
     * @ORM\Column(name="rubro", type="integer",nullable=true)
     */
    private $rubro;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string")
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidad_medida", type="integer")
     */
    private $unidad_medida;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_inicial", type="decimal")
     */
    private $cantidad_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_inicial", type="decimal")
     */
    private $valor_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_final", type="decimal")
     */
    private $cantidad_final;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_final", type="decimal")
     */
    private $valor_final;

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
     * @ORM\Column(name="fecha_modificacion", type="datetime",nullable=true)
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
     * Set seguimientoFase
     *
     * @param AppBundle\Entity\SeguimientoFase $seguimientoFase
     *
     * @return Activos
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
     * Set rubro
     *
     * @param integer $rubro
     *
     * @return Activos
     */
    public function setRubro($rubro)
    {
        $this->rubro = $rubro;

        return $this;
    }

    /**
     * Get rubro
     *
     * @return integer
     */
    public function getRubro()
    {
        return $this->rubro;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Activos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set unidadMedida
     *
     * @param integer $unidadMedida
     *
     * @return Activos
     */
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidad_medida = $unidadMedida;

        return $this;
    }

    /**
     * Get unidadMedida
     *
     * @return integer
     */
    public function getUnidadMedida()
    {
        return $this->unidad_medida;
    }

    /**
     * Set cantidadInicial
     *
     * @param string $cantidadInicial
     *
     * @return Activos
     */
    public function setCantidadInicial($cantidadInicial)
    {
        $this->cantidad_inicial = $cantidadInicial;

        return $this;
    }

    /**
     * Get cantidadInicial
     *
     * @return string
     */
    public function getCantidadInicial()
    {
        return $this->cantidad_inicial;
    }

    /**
     * Set valorInicial
     *
     * @param string $valorInicial
     *
     * @return Activos
     */
    public function setValorInicial($valorInicial)
    {
        $this->valor_inicial = $valorInicial;

        return $this;
    }

    /**
     * Get valorInicial
     *
     * @return string
     */
    public function getValorInicial()
    {
        return $this->valor_inicial;
    }

    /**
     * Set cantidadFinal
     *
     * @param string $cantidadFinal
     *
     * @return Activos
     */
    public function setCantidadFinal($cantidadFinal)
    {
        $this->cantidad_final = $cantidadFinal;

        return $this;
    }

    /**
     * Get cantidadFinal
     *
     * @return string
     */
    public function getCantidadFinal()
    {
        return $this->cantidad_final;
    }

    /**
     * Set valorFinal
     *
     * @param string $valorFinal
     *
     * @return Activos
     */
    public function setValorFinal($valorFinal)
    {
        $this->valor_final = $valorFinal;

        return $this;
    }

    /**
     * Get valorFinal
     *
     * @return string
     */
    public function getValorFinal()
    {
        return $this->valor_final;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Activos
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
     * @return Activos
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
     * @return Activos
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
     * @return Activos
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
     * @return Activos
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

