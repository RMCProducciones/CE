<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Empleado
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
     * @ORM\Column(name="periodicidad", type="integer")
     */
    private $periodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="socio_organizacion", type="boolean")
     */
    private $socio_organizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime")
     */
    private $fecha_ingreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fecha_nacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="edad_al_ingreso", type="decimal")
     */
    private $edad_al_ingreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexo", type="integer")
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="remuneracion__bruta_anual", type="decimal")
     */
    private $remuneracion__bruta_anual;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo_pago", type="string")
     */
    private $periodo_pago;

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
     * @return Empleado
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
     * Set periodicidad
     *
     * @param integer $periodicidad
     *
     * @return Empleado
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set socioOrganizacion
     *
     * @param boolean $socioOrganizacion
     *
     * @return Empleado
     */
    public function setSocioOrganizacion($socioOrganizacion)
    {
        $this->socio_organizacion = $socioOrganizacion;

        return $this;
    }

    /**
     * Get socioOrganizacion
     *
     * @return boolean
     */
    public function getSocioOrganizacion()
    {
        return $this->socio_organizacion;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Empleado
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fecha_ingreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Empleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set edadAlIngreso
     *
     * @param string $edadAlIngreso
     *
     * @return Empleado
     */
    public function setEdadAlIngreso($edadAlIngreso)
    {
        $this->edad_al_ingreso = $edadAlIngreso;

        return $this;
    }

    /**
     * Get edadAlIngreso
     *
     * @return string
     */
    public function getEdadAlIngreso()
    {
        return $this->edad_al_ingreso;
    }

    /**
     * Set sexo
     *
     * @param integer $sexo
     *
     * @return Empleado
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return integer
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set remuneracionBrutaAnual
     *
     * @param string $remuneracionBrutaAnual
     *
     * @return Empleado
     */
    public function setRemuneracionBrutaAnual($remuneracionBrutaAnual)
    {
        $this->remuneracion__bruta_anual = $remuneracionBrutaAnual;

        return $this;
    }

    /**
     * Get remuneracionBrutaAnual
     *
     * @return string
     */
    public function getRemuneracionBrutaAnual()
    {
        return $this->remuneracion__bruta_anual;
    }

    /**
     * Set periodoPago
     *
     * @param string $periodoPago
     *
     * @return Empleado
     */
    public function setPeriodoPago($periodoPago)
    {
        $this->periodo_pago = $periodoPago;

        return $this;
    }

    /**
     * Get periodoPago
     *
     * @return string
     */
    public function getPeriodoPago()
    {
        return $this->periodo_pago;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Empleado
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
     * @return Empleado
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
     * @return Empleado
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
     * @return Empleado
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
     * @return Empleado
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

