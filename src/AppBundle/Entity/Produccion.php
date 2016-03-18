<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produccion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Produccion
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
     * @ORM\Column(name="periodicidad", type="integer",nullable=true)
     */
    private $periodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="producto", type="string")
     */
    private $producto;

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
     * @return Produccion
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
     * Set periodicidad
     *
     * @param integer $periodicidad
     *
     * @return Produccion
     */
    public function setPeriodicidad($periodicidad)
    {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    /**
     * Get periodicidad
     *
     * @return integer
     */
    public function getPeriodicidad()
    {
        return $this->periodicidad;
    }

    /**
     * Set producto
     *
     * @param string $producto
     *
     * @return Produccion
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return string
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set unidadMedida
     *
     * @param integer $unidadMedida
     *
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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
     * @return Produccion
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

