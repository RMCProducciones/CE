<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ventas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ventas
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
     * @ORM\Column(name="valor_unitario_inicial", type="decimal")
     */
    private $valor_unitario_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_vendida_inicial", type="decimal")
     */
    private $cantidad_vendida_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_inicial", type="decimal")
     */
    private $valor_ventas_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_consumo_inicial", type="decimal")
     */
    private $cantidad_consumo_inicial;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_unitario_final", type="decimal")
     */
    private $valor_unitario_final;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_vendida_final", type="decimal")
     */
    private $cantidad_vendida_final;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_final", type="decimal")
     */
    private $valor_ventas_final;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_consumo_final", type="decimal")
     */
    private $cantidad_consumo_final;

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
     * @return Ventas
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
     * @return Ventas
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
     * @return Ventas
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
     * @return Ventas
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
     * Set valorUnitarioInicial
     *
     * @param string $valorUnitarioInicial
     *
     * @return Ventas
     */
    public function setValorUnitarioInicial($valorUnitarioInicial)
    {
        $this->valor_unitario_inicial = $valorUnitarioInicial;

        return $this;
    }

    /**
     * Get valorUnitarioInicial
     *
     * @return string
     */
    public function getValorUnitarioInicial()
    {
        return $this->valor_unitario_inicial;
    }

    /**
     * Set cantidadVendidaInicial
     *
     * @param string $cantidadVendidaInicial
     *
     * @return Ventas
     */
    public function setCantidadVendidaInicial($cantidadVendidaInicial)
    {
        $this->cantidad_vendida_inicial = $cantidadVendidaInicial;

        return $this;
    }

    /**
     * Get cantidadVendidaInicial
     *
     * @return string
     */
    public function getCantidadVendidaInicial()
    {
        return $this->cantidad_vendida_inicial;
    }

    /**
     * Set valorVentasInicial
     *
     * @param string $valorVentasInicial
     *
     * @return Ventas
     */
    public function setValorVentasInicial($valorVentasInicial)
    {
        $this->valor_ventas_inicial = $valorVentasInicial;

        return $this;
    }

    /**
     * Get valorVentasInicial
     *
     * @return string
     */
    public function getValorVentasInicial()
    {
        return $this->valor_ventas_inicial;
    }

    /**
     * Set cantidadConsumoInicial
     *
     * @param string $cantidadConsumoInicial
     *
     * @return Ventas
     */
    public function setCantidadConsumoInicial($cantidadConsumoInicial)
    {
        $this->cantidad_consumo_inicial = $cantidadConsumoInicial;

        return $this;
    }

    /**
     * Get cantidadConsumoInicial
     *
     * @return string
     */
    public function getCantidadConsumoInicial()
    {
        return $this->cantidad_consumo_inicial;
    }

    /**
     * Set valorUnitarioFinal
     *
     * @param string $valorUnitarioFinal
     *
     * @return Ventas
     */
    public function setValorUnitarioFinal($valorUnitarioFinal)
    {
        $this->valor_unitario_final = $valorUnitarioFinal;

        return $this;
    }

    /**
     * Get valorUnitarioFinal
     *
     * @return string
     */
    public function getValorUnitarioFinal()
    {
        return $this->valor_unitario_final;
    }

    /**
     * Set cantidadVendidaFinal
     *
     * @param string $cantidadVendidaFinal
     *
     * @return Ventas
     */
    public function setCantidadVendidaFinal($cantidadVendidaFinal)
    {
        $this->cantidad_vendida_final = $cantidadVendidaFinal;

        return $this;
    }

    /**
     * Get cantidadVendidaFinal
     *
     * @return string
     */
    public function getCantidadVendidaFinal()
    {
        return $this->cantidad_vendida_final;
    }

    /**
     * Set valorVentasFinal
     *
     * @param string $valorVentasFinal
     *
     * @return Ventas
     */
    public function setValorVentasFinal($valorVentasFinal)
    {
        $this->valor_ventas_final = $valorVentasFinal;

        return $this;
    }

    /**
     * Get valorVentasFinal
     *
     * @return string
     */
    public function getValorVentasFinal()
    {
        return $this->valor_ventas_final;
    }

    /**
     * Set cantidadConsumoFinal
     *
     * @param string $cantidadConsumoFinal
     *
     * @return Ventas
     */
    public function setCantidadConsumoFinal($cantidadConsumoFinal)
    {
        $this->cantidad_consumo_final = $cantidadConsumoFinal;

        return $this;
    }

    /**
     * Get cantidadConsumoFinal
     *
     * @return string
     */
    public function getCantidadConsumoFinal()
    {
        return $this->cantidad_consumo_final;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Ventas
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
     * @return Ventas
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
     * @return Ventas
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
     * @return Ventas
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
     * @return Ventas
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

