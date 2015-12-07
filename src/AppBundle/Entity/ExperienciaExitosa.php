<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExperienciaExitosa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ExperienciaExitosaRepository")
 */
class ExperienciaExitosa
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
     */
    private $grupo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime")
     */
    private $fecha_registro;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_empleos", type="integer")
     */
    private $numero_empleos;

    /**
     * @var integer
     *
     * @ORM\Column(name="ventas_mes", type="integer")
     */
    private $ventas_mes;

    /**
     * @var string
     *
     * @ORM\Column(name="produccion_mensual", type="string")
     */
    private $produccion_mensual;

    /**
     * @var string
     *
     * @ORM\Column(name="fuentes_financiacion", type="string")
     */
    private $fuentes_financiacion;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_recursos_financiacion", type="decimal")
     */
    private $valor_recursos_financiacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_poblacion", type="string")
     */
    private $tipo_poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_productivo", type="string")
     */
    private $proceso_productivo;

    /**
     * @var string
     *
     * @ORM\Column(name="testimonio_poblacion", type="string")
     */
    private $testimonio_poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="acciones_minimizacion_impacto_ambiental", type="string")
     */
    private $acciones_minimizacion_impacto_ambiental;

    /**
     * @var string
     *
     * @ORM\Column(name="impacto_comunidad", type="string")
     */
    private $impacto_comunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="innovacion", type="string")
     */
    private $innovacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string")
     */
    private $observaciones;

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
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return ExperienciaExitosa
     */
    public function setGrupo(\AppBundle\Entity\Grupo $grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return AppBundle\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return ExperienciaExitosa
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fecha_registro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * Set numeroEmpleos
     *
     * @param integer $numeroEmpleos
     *
     * @return ExperienciaExitosa
     */
    public function setNumeroEmpleos($numeroEmpleos)
    {
        $this->numero_empleos = $numeroEmpleos;

        return $this;
    }

    /**
     * Get numeroEmpleos
     *
     * @return integer
     */
    public function getNumeroEmpleos()
    {
        return $this->numero_empleos;
    }

    /**
     * Set ventasMes
     *
     * @param integer $ventasMes
     *
     * @return ExperienciaExitosa
     */
    public function setVentasMes($ventasMes)
    {
        $this->ventas_mes = $ventasMes;

        return $this;
    }

    /**
     * Get ventasMes
     *
     * @return integer
     */
    public function getVentasMes()
    {
        return $this->ventas_mes;
    }

    /**
     * Set produccionMensual
     *
     * @param string $produccionMensual
     *
     * @return ExperienciaExitosa
     */
    public function setProduccionMensual($produccionMensual)
    {
        $this->produccion_mensual = $produccionMensual;

        return $this;
    }

    /**
     * Get produccionMensual
     *
     * @return string
     */
    public function getProduccionMensual()
    {
        return $this->produccion_mensual;
    }

    /**
     * Set fuentesFinanciacion
     *
     * @param string $fuentesFinanciacion
     *
     * @return ExperienciaExitosa
     */
    public function setFuentesFinanciacion($fuentesFinanciacion)
    {
        $this->fuentes_financiacion = $fuentesFinanciacion;

        return $this;
    }

    /**
     * Get fuentesFinanciacion
     *
     * @return string
     */
    public function getFuentesFinanciacion()
    {
        return $this->fuentes_financiacion;
    }

    /**
     * Set valorRecursosFinanciacion
     *
     * @param string $valorRecursosFinanciacion
     *
     * @return ExperienciaExitosa
     */
    public function setValorRecursosFinanciacion($valorRecursosFinanciacion)
    {
        $this->valor_recursos_financiacion = $valorRecursosFinanciacion;

        return $this;
    }

    /**
     * Get valorRecursosFinanciacion
     *
     * @return string
     */
    public function getValorRecursosFinanciacion()
    {
        return $this->valor_recursos_financiacion;
    }

    /**
     * Set tipoPoblacion
     *
     * @param string $tipoPoblacion
     *
     * @return ExperienciaExitosa
     */
    public function setTipoPoblacion($tipoPoblacion)
    {
        $this->tipo_poblacion = $tipoPoblacion;

        return $this;
    }

    /**
     * Get tipoPoblacion
     *
     * @return string
     */
    public function getTipoPoblacion()
    {
        return $this->tipo_poblacion;
    }

    /**
     * Set procesoProductivo
     *
     * @param string $procesoProductivo
     *
     * @return ExperienciaExitosa
     */
    public function setProcesoProductivo($procesoProductivo)
    {
        $this->proceso_productivo = $procesoProductivo;

        return $this;
    }

    /**
     * Get procesoProductivo
     *
     * @return string
     */
    public function getProcesoProductivo()
    {
        return $this->proceso_productivo;
    }

    /**
     * Set testimonioPoblacion
     *
     * @param string $testimonioPoblacion
     *
     * @return ExperienciaExitosa
     */
    public function setTestimonioPoblacion($testimonioPoblacion)
    {
        $this->testimonio_poblacion = $testimonioPoblacion;

        return $this;
    }

    /**
     * Get testimonioPoblacion
     *
     * @return string
     */
    public function getTestimonioPoblacion()
    {
        return $this->testimonio_poblacion;
    }

    /**
     * Set accionesMinimizacionImpactoAmbiental
     *
     * @param string $accionesMinimizacionImpactoAmbiental
     *
     * @return ExperienciaExitosa
     */
    public function setAccionesMinimizacionImpactoAmbiental($accionesMinimizacionImpactoAmbiental)
    {
        $this->acciones_minimizacion_impacto_ambiental = $accionesMinimizacionImpactoAmbiental;

        return $this;
    }

    /**
     * Get accionesMinimizacionImpactoAmbiental
     *
     * @return string
     */
    public function getAccionesMinimizacionImpactoAmbiental()
    {
        return $this->acciones_minimizacion_impacto_ambiental;
    }

    /**
     * Set impactoComunidad
     *
     * @param string $impactoComunidad
     *
     * @return ExperienciaExitosa
     */
    public function setImpactoComunidad($impactoComunidad)
    {
        $this->impacto_comunidad = $impactoComunidad;

        return $this;
    }

    /**
     * Get impactoComunidad
     *
     * @return string
     */
    public function getImpactoComunidad()
    {
        return $this->impacto_comunidad;
    }

    /**
     * Set innovacion
     *
     * @param string $innovacion
     *
     * @return ExperienciaExitosa
     */
    public function setInnovacion($innovacion)
    {
        $this->innovacion = $innovacion;

        return $this;
    }

    /**
     * Get innovacion
     *
     * @return string
     */
    public function getInnovacion()
    {
        return $this->innovacion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return ExperienciaExitosa
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
     * @return ExperienciaExitosa
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
     * @return ExperienciaExitosa
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
     * @return ExperienciaExitosa
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
     * @return ExperienciaExitosa
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
     * @return ExperienciaExitosa
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

