<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GrupoRepository")
 */
class Grupo
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Convocatoria")
     */
    private $convocatoria;
	
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inscripcion", type="datetime")
     */
    private $fecha_inscripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string")
     */
    private $direccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rural", type="boolean")
     */
    private $rural;

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string")
     */
    private $barrio;

	 /**
     * @var string
     *
     * @ORM\Column(name="corregimiento", type="string")
     */
    private $corregimiento;
	
	/**
     * @var string
     *
     * @ORM\Column(name="vereda", type="string")
     */
    private $vereda;
	
	/**
     * @var string
     *
     * @ORM\Column(name="cacerio", type="string")
     */
    private $cacerio;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="figura_legal_constitucion", type="integer")
     */
    private $figura_legal_constitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_identificacion_tributaria", type="string")
     */
    private $numero_identificacion_tributaria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_constitucion_legal", type="datetime", nullable=true)
     */
    private $fecha_constitucion_legal;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo", type="string", nullable=true)
     */
    private $telefono_fijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string")
     */
    private $telefono_celular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string")
     */
    private $correo_electronico;

    /**
     * @var integer
     *
     * @ORM\Column(name="entidad_financiera_cuenta", type="integer")
     */
    private $entidad_financiera_cuenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_cuenta", type="integer")
     */
    private $tipo_cuenta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_modificacion", type="integer", nullable=true)
     */
    private $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_creacion", type="integer", nullable=true)
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true)
     */
    private $fecha_creacion;

    
    public function __toString()
    {
        return $this->getNombre();
    }

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
     * Set convocatoria
     *
     * @param AppBundle\Entity\Convocatoria $convocatoria
     *
     * @return Grupo
     */
    public function setConvocatoria(\AppBundle\Entity\Convocatoria $convocatoria)
    {
        $this->convocatoria = $convocatoria;

        return $this;
    }

    /**
     * Get convocatoria
     *
     * @return AppBundle\Entity\Convocatoria
     */
    public function getConvocatoria()
    {
        return $this->convocatoria;
    }

    
    /**
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return Grupo
     */
    public function setMunicipio(\AppBundle\Entity\Municipio $municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return AppBundle\Entity\Municipio
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Grupo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     *
     * @return Grupo
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fecha_inscripcion = $fechaInscripcion;

        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime
     */
    public function getFechaInscripcion()
    {
        return $this->fecha_inscripcion;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Grupo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Grupo
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Grupo
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

	 /**
     * Set rural
     *
     * @param boolean $rural
     *
     * @return Grupo
     */
    public function setRural($rural)
    {
        $this->rural = $rural;

        return $this;
    }

    /**
     * Get rural
     *
     * @return boolean
     */
    public function getRural()
    {
        return $this->rural;
    }
	
    /**
     * Set barrio
     *
     * @param string $barrio
     *
     * @return Grupo
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return string
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

	/**
     * Set corregimiento
     *
     * @param string $corregimiento
     *
     * @return Grupo
     */
    public function setCorregimiento($corregimiento)
    {
        $this->corregimiento = $corregimiento;

        return $this;
    }

    /**
     * Get corregimiento
     *
     * @return string
     */
    public function getCorregimiento()
    {
        return $this->corregimiento;
    }
	
	/**
     * Set vereda
     *
     * @param string $vereda
     *
     * @return Grupo
     */
    public function setVereda($vereda)
    {
        $this->vereda = $vereda;

        return $this;
    }

    /**
     * Get vereda
     *
     * @return string
     */
    public function getVereda()
    {
        return $this->vereda;
    }
	
	/**
     * Set cacerio
     *
     * @param string $cacerio
     *
     * @return Grupo
     */
    public function setCacerio($cacerio)
    {
        $this->cacerio = $cacerio;

        return $this;
    }

    /**
     * Get cacerio
     *
     * @return string
     */
    public function getCacerio()
    {
        return $this->cacerio;
    }
	
    /**
     * Set figuraLegalConstitucion
     *
     * @param integer $figuraLegalConstitucion
     *
     * @return Grupo
     */
    public function setFiguraLegalConstitucion($figuraLegalConstitucion)
    {
        $this->figura_legal_constitucion = $figuraLegalConstitucion;

        return $this;
    }

    /**
     * Get figuraLegalConstitucion
     *
     * @return integer
     */
    public function getFiguraLegalConstitucion()
    {
        return $this->figura_legal_constitucion;
    }

    /**
     * Set numeroIdentificacionTributaria
     *
     * @param string $numeroIdentificacionTributaria
     *
     * @return Grupo
     */
    public function setNumeroIdentificacionTributaria($numeroIdentificacionTributaria)
    {
        $this->numero_identificacion_tributaria = $numeroIdentificacionTributaria;

        return $this;
    }

    /**
     * Get numeroIdentificacionTributaria
     *
     * @return string
     */
    public function getNumeroIdentificacionTributaria()
    {
        return $this->numero_identificacion_tributaria;
    }

    /**
     * Set fechaConstitucionLegal
     *
     * @param \DateTime $fechaConstitucionLegal
     *
     * @return Grupo
     */
    public function setFechaConstitucionLegal($fechaConstitucionLegal)
    {
        $this->fecha_constitucion_legal = $fechaConstitucionLegal;

        return $this;
    }

    /**
     * Get fechaConstitucionLegal
     *
     * @return \DateTime
     */
    public function getFechaConstitucionLegal()
    {
        return $this->fecha_constitucion_legal;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return Grupo
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefono_fijo = $telefonoFijo;

        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string
     */
    public function getTelefonoFijo()
    {
        return $this->telefono_fijo;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     *
     * @return Grupo
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefono_celular = $telefonoCelular;

        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string
     */
    public function getTelefonoCelular()
    {
        return $this->telefono_celular;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     *
     * @return Grupo
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correo_electronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correo_electronico;
    }

    /**
     * Set entidadFinancieraCuenta
     *
     * @param integer $entidadFinancieraCuenta
     *
     * @return Grupo
     */
    public function setEntidadFinancieraCuenta($entidadFinancieraCuenta)
    {
        $this->entidad_financiera_cuenta = $entidadFinancieraCuenta;

        return $this;
    }

    /**
     * Get entidadFinancieraCuenta
     *
     * @return integer
     */
    public function getEntidadFinancieraCuenta()
    {
        return $this->entidad_financiera_cuenta;
    }

    /**
     * Set tipoCuenta
     *
     * @param integer $tipoCuenta
     *
     * @return Grupo
     */
    public function setTipoCuenta($tipoCuenta)
    {
        $this->tipo_cuenta = $tipoCuenta;

        return $this;
    }

    /**
     * Get tipoCuenta
     *
     * @return integer
     */
    public function getTipoCuenta()
    {
        return $this->tipo_cuenta;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Grupo
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
     * @return Grupo
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
     * @return Grupo
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
     * @return Grupo
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
     * @return Grupo
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

