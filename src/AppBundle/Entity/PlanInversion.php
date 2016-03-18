<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanInversion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PlanInversion
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
     * @ORM\Column(name="seguimientoFase", type="integer")
     */
    private $seguimientoFase;

    /**
     * @var integer
     *
     * @ORM\Column(name="area", type="integer")
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad", type="string")
     */
    private $actividad;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidad_medida", type="integer")
     */
    private $unidad_medida;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_unitario", type="decimal")
     */
    private $valor_unitario;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_total", type="decimal")
     */
    private $valor_total;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_ejecucion", type="integer")
     */
    private $tiempo_ejecucion;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_visita1", type="decimal")
     */
    private $cantidad_visita1;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_unitario_visita1", type="decimal")
     */
    private $valor_unitario_visita1;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_total_visita1", type="decimal")
     */
    private $valor_total_visita1;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_ejecucion_visita1", type="integer")
     */
    private $tiempo_ejecucion_visita1;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_visita2", type="decimal")
     */
    private $cantidad_visita2;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_unitario_visita2", type="decimal")
     */
    private $valor_unitario_visita2;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_total_visita2", type="decimal")
     */
    private $valor_total_visita2;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_ejecucion_visita2", type="integer")
     */
    private $tiempo_ejecucion_visita2;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_visita3", type="decimal")
     */
    private $cantidad_visita3;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_unitario_visita3", type="decimal")
     */
    private $valor_unitario_visita3;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_total_visita3", type="decimal")
     */
    private $valor_total_visita3;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo_ejecucion_visita3", type="integer")
     */
    private $tiempo_ejecucion_visita3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cumplio", type="boolean")
     */
    private $cumplio;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

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
     * @param integer $seguimientoFase
     *
     * @return PlanInversion
     */
    public function setSeguimientoFase($seguimientoFase)
    {
        $this->seguimientoFase = $seguimientoFase;

        return $this;
    }

    /**
     * Get seguimientoFase
     *
     * @return integer
     */
    public function getSeguimientoFase()
    {
        return $this->seguimientoFase;
    }

    /**
     * Set area
     *
     * @param integer $area
     *
     * @return PlanInversion
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return integer
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     *
     * @return PlanInversion
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set unidadMedida
     *
     * @param integer $unidadMedida
     *
     * @return PlanInversion
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
     * Set cantidad
     *
     * @param string $cantidad
     *
     * @return PlanInversion
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set valorUnitario
     *
     * @param string $valorUnitario
     *
     * @return PlanInversion
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valor_unitario = $valorUnitario;

        return $this;
    }

    /**
     * Get valorUnitario
     *
     * @return string
     */
    public function getValorUnitario()
    {
        return $this->valor_unitario;
    }

    /**
     * Set valorTotal
     *
     * @param string $valorTotal
     *
     * @return PlanInversion
     */
    public function setValorTotal($valorTotal)
    {
        $this->valor_total = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return string
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * Set tiempoEjecucion
     *
     * @param integer $tiempoEjecucion
     *
     * @return PlanInversion
     */
    public function setTiempoEjecucion($tiempoEjecucion)
    {
        $this->tiempo_ejecucion = $tiempoEjecucion;

        return $this;
    }

    /**
     * Get tiempoEjecucion
     *
     * @return integer
     */
    public function getTiempoEjecucion()
    {
        return $this->tiempo_ejecucion;
    }

    /**
     * Set cantidadVisita1
     *
     * @param string $cantidadVisita1
     *
     * @return PlanInversion
     */
    public function setCantidadVisita1($cantidadVisita1)
    {
        $this->cantidad_visita1 = $cantidadVisita1;

        return $this;
    }

    /**
     * Get cantidadVisita1
     *
     * @return string
     */
    public function getCantidadVisita1()
    {
        return $this->cantidad_visita1;
    }

    /**
     * Set valorUnitarioVisita1
     *
     * @param string $valorUnitarioVisita1
     *
     * @return PlanInversion
     */
    public function setValorUnitarioVisita1($valorUnitarioVisita1)
    {
        $this->valor_unitario_visita1 = $valorUnitarioVisita1;

        return $this;
    }

    /**
     * Get valorUnitarioVisita1
     *
     * @return string
     */
    public function getValorUnitarioVisita1()
    {
        return $this->valor_unitario_visita1;
    }

    /**
     * Set valorTotalVisita1
     *
     * @param string $valorTotalVisita1
     *
     * @return PlanInversion
     */
    public function setValorTotalVisita1($valorTotalVisita1)
    {
        $this->valor_total_visita1 = $valorTotalVisita1;

        return $this;
    }

    /**
     * Get valorTotalVisita1
     *
     * @return string
     */
    public function getValorTotalVisita1()
    {
        return $this->valor_total_visita1;
    }

    /**
     * Set tiempoEjecucionVisita1
     *
     * @param integer $tiempoEjecucionVisita1
     *
     * @return PlanInversion
     */
    public function setTiempoEjecucionVisita1($tiempoEjecucionVisita1)
    {
        $this->tiempo_ejecucion_visita1 = $tiempoEjecucionVisita1;

        return $this;
    }

    /**
     * Get tiempoEjecucionVisita1
     *
     * @return integer
     */
    public function getTiempoEjecucionVisita1()
    {
        return $this->tiempo_ejecucion_visita1;
    }

    /**
     * Set cantidadVisita2
     *
     * @param string $cantidadVisita2
     *
     * @return PlanInversion
     */
    public function setCantidadVisita2($cantidadVisita2)
    {
        $this->cantidad_visita2 = $cantidadVisita2;

        return $this;
    }

    /**
     * Get cantidadVisita2
     *
     * @return string
     */
    public function getCantidadVisita2()
    {
        return $this->cantidad_visita2;
    }

    /**
     * Set valorUnitarioVisita2
     *
     * @param string $valorUnitarioVisita2
     *
     * @return PlanInversion
     */
    public function setValorUnitarioVisita2($valorUnitarioVisita2)
    {
        $this->valor_unitario_visita2 = $valorUnitarioVisita2;

        return $this;
    }

    /**
     * Get valorUnitarioVisita2
     *
     * @return string
     */
    public function getValorUnitarioVisita2()
    {
        return $this->valor_unitario_visita2;
    }

    /**
     * Set valorTotalVisita2
     *
     * @param string $valorTotalVisita2
     *
     * @return PlanInversion
     */
    public function setValorTotalVisita2($valorTotalVisita2)
    {
        $this->valor_total_visita2 = $valorTotalVisita2;

        return $this;
    }

    /**
     * Get valorTotalVisita2
     *
     * @return string
     */
    public function getValorTotalVisita2()
    {
        return $this->valor_total_visita2;
    }

    /**
     * Set tiempoEjecucionVisita2
     *
     * @param integer $tiempoEjecucionVisita2
     *
     * @return PlanInversion
     */
    public function setTiempoEjecucionVisita2($tiempoEjecucionVisita2)
    {
        $this->tiempo_ejecucion_visita2 = $tiempoEjecucionVisita2;

        return $this;
    }

    /**
     * Get tiempoEjecucionVisita2
     *
     * @return integer
     */
    public function getTiempoEjecucionVisita2()
    {
        return $this->tiempo_ejecucion_visita2;
    }

    /**
     * Set cantidadVisita3
     *
     * @param string $cantidadVisita3
     *
     * @return PlanInversion
     */
    public function setCantidadVisita3($cantidadVisita3)
    {
        $this->cantidad_visita3 = $cantidadVisita3;

        return $this;
    }

    /**
     * Get cantidadVisita3
     *
     * @return string
     */
    public function getCantidadVisita3()
    {
        return $this->cantidad_visita3;
    }

    /**
     * Set valorUnitarioVisita3
     *
     * @param string $valorUnitarioVisita3
     *
     * @return PlanInversion
     */
    public function setValorUnitarioVisita3($valorUnitarioVisita3)
    {
        $this->valor_unitario_visita3 = $valorUnitarioVisita3;

        return $this;
    }

    /**
     * Get valorUnitarioVisita3
     *
     * @return string
     */
    public function getValorUnitarioVisita3()
    {
        return $this->valor_unitario_visita3;
    }

    /**
     * Set valorTotalVisita3
     *
     * @param string $valorTotalVisita3
     *
     * @return PlanInversion
     */
    public function setValorTotalVisita3($valorTotalVisita3)
    {
        $this->valor_total_visita3 = $valorTotalVisita3;

        return $this;
    }

    /**
     * Get valorTotalVisita3
     *
     * @return string
     */
    public function getValorTotalVisita3()
    {
        return $this->valor_total_visita3;
    }

    /**
     * Set tiempoEjecucionVisita3
     *
     * @param integer $tiempoEjecucionVisita3
     *
     * @return PlanInversion
     */
    public function setTiempoEjecucionVisita3($tiempoEjecucionVisita3)
    {
        $this->tiempo_ejecucion_visita3 = $tiempoEjecucionVisita3;

        return $this;
    }

    /**
     * Get tiempoEjecucionVisita3
     *
     * @return integer
     */
    public function getTiempoEjecucionVisita3()
    {
        return $this->tiempo_ejecucion_visita3;
    }

    /**
     * Set cumplio
     *
     * @param boolean $cumplio
     *
     * @return PlanInversion
     */
    public function setCumplio($cumplio)
    {
        $this->cumplio = $cumplio;

        return $this;
    }

    /**
     * Get cumplio
     *
     * @return boolean
     */
    public function getCumplio()
    {
        return $this->cumplio;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return PlanInversion
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return PlanInversion
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
     * @return PlanInversion
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
     * @return PlanInversion
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
     * @return PlanInversion
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
     * @return PlanInversion
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

