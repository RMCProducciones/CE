<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organizacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OrganizacionRepository")
 */
class Organizacion
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
     * @var string
     *
     * @ORM\Column(name="nombre_organizacion", type="string")
     */
    private $nombre_organizacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $linea_productiva;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_producto", type="string")
     */
    private $tipo_producto;

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
     * @ORM\Column(name="barrio", type="string", nullable=true)
     */
    private $barrio;

    /**
     * @var string
     *
     * @ORM\Column(name="corregimiento", type="string", nullable=true)
     */
    private $corregimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="vereda", type="string", nullable=true)
     */
    private $vereda;

    /**
     * @var string
     *
     * @ORM\Column(name="cacerio", type="string", nullable=true)
     */
    private $cacerio;

    /**
     * @var integer
     *
     * @ORM\Column(name="municipio", type="integer")
     */
    private $municipio;

   /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $tipo_documento_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento_contacto", type="string")
     */
    private $numero_documento_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido_contacto", type="string")
     */
    private $primer_apellido_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido_contacto", type="string", nullable=true)
     */
    private $segundo_apellido_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre_contacto", type="string")
     */
    private $primer_nombre_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre_contacto", type="string", nullable=true)
     */
    private $segundo_nombre_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo_contacto", type="string")
     */
    private $telefono_fijo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular_contacto", type="string")
     */
    private $telefono_celular_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico_contacto", type="string")
     */
    private $correo_electronico_contacto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ruta", type="boolean", nullable=true)
     */
    private $ruta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pasantia", type="boolean", nullable=true)
     */
    private $pasantia;

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
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true)
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
     * Set nombreOrganizacion
     *
     * @param string $nombreOrganizacion
     *
     * @return Organizacion
     */
    public function setNombreOrganizacion($nombreOrganizacion)
    {
        $this->nombre_organizacion = $nombreOrganizacion;
    
        return $this;
    }

    /**
     * Get nombreOrganizacion
     *
     * @return string
     */
    public function getNombreOrganizacion()
    {
        return $this->nombre_organizacion;
    }

    /**
     * Set lineaProductiva
     *
     * @param AppBundle\Entity\Listas $lineaProductiva
     *
     * @return Organizacion
     */
    public function setLineaProductiva(\AppBundle\Entity\Listas $lineaProductiva)
    {
        $this->linea_productiva = $lineaProductiva;
    
        return $this;
    }

    /**
     * Get lineaProductiva
     *
     * @return AppBundle\Entity\Listas
     */
    public function getLineaProductiva()
    {
        return $this->linea_productiva;
    }

    /**
     * Set tipoProducto
     *
     * @param string $tipoProducto
     *
     * @return Organizacion
     */
    public function setTipoProducto($tipoProducto)
    {
        $this->tipo_producto = $tipoProducto;
    
        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return string
     */
    public function getTipoProducto()
    {
        return $this->tipo_producto;
    }

    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     *
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * Set municipio
     *
     * @param integer $municipio
     *
     * @return Organizacion
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    
        return $this;
    }

    /**
     * Get municipio
     *
     * @return integer
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set tipoDocumentoContacto
     *
     * @param AppBundle\Entity\Listas $tipoDocumentoContacto
     *
     * @return Organizacion
     */
    public function setTipoDocumentoContacto(\AppBundle\Entity\Listas $tipoDocumentoContacto)
    {
        $this->tipo_documento_contacto = $tipoDocumentoContacto;
    
        return $this;
    }

    /**
     * Get tipoDocumentoContacto
     *
     * @return AppBundle\Entity\Listas
     */
    public function getTipoDocumentoContacto()
    {
        return $this->tipo_documento_contacto;
    }

    /**
     * Set numeroDocumentoContacto
     *
     * @param string $numeroDocumentoContacto
     *
     * @return Organizacion
     */
    public function setNumeroDocumentoContacto($numeroDocumentoContacto)
    {
        $this->numero_documento_contacto = $numeroDocumentoContacto;
    
        return $this;
    }

    /**
     * Get numeroDocumentoContacto
     *
     * @return string
     */
    public function getNumeroDocumentoContacto()
    {
        return $this->numero_documento_contacto;
    }

    /**
     * Set primerApellidoContacto
     *
     * @param string $primerApellidoContacto
     *
     * @return Organizacion
     */
    public function setPrimerApellidoContacto($primerApellidoContacto)
    {
        $this->primer_apellido_contacto = $primerApellidoContacto;
    
        return $this;
    }

    /**
     * Get primerApellidoContacto
     *
     * @return string
     */
    public function getPrimerApellidoContacto()
    {
        return $this->primer_apellido_contacto;
    }

    /**
     * Set segundoApellidoContacto
     *
     * @param string $segundoApellidoContacto
     *
     * @return Organizacion
     */
    public function setSegundoApellidoContacto($segundoApellidoContacto)
    {
        $this->segundo_apellido_contacto = $segundoApellidoContacto;
    
        return $this;
    }

    /**
     * Get segundoApellidoContacto
     *
     * @return string
     */
    public function getSegundoApellidoContacto()
    {
        return $this->segundo_apellido_contacto;
    }

    /**
     * Set primerNombreContacto
     *
     * @param string $primerNombreContacto
     *
     * @return Organizacion
     */
    public function setPrimerNombreContacto($primerNombreContacto)
    {
        $this->primer_nombre_contacto = $primerNombreContacto;
    
        return $this;
    }

    /**
     * Get primerNombreContacto
     *
     * @return string
     */
    public function getPrimerNombreContacto()
    {
        return $this->primer_nombre_contacto;
    }

    /**
     * Set segundoNombreContacto
     *
     * @param string $segundoNombreContacto
     *
     * @return Organizacion
     */
    public function setSegundoNombreContacto($segundoNombreContacto)
    {
        $this->segundo_nombre_contacto = $segundoNombreContacto;
    
        return $this;
    }

    /**
     * Get segundoNombreContacto
     *
     * @return string
     */
    public function getSegundoNombreContacto()
    {
        return $this->segundo_nombre_contacto;
    }

    /**
     * Set telefonoFijoContacto
     *
     * @param string $telefonoFijoContacto
     *
     * @return Organizacion
     */
    public function setTelefonoFijoContacto($telefonoFijoContacto)
    {
        $this->telefono_fijo_contacto = $telefonoFijoContacto;
    
        return $this;
    }

    /**
     * Get telefonoFijoContacto
     *
     * @return string
     */
    public function getTelefonoFijoContacto()
    {
        return $this->telefono_fijo_contacto;
    }

    /**
     * Set telefonoCelularContacto
     *
     * @param string $telefonoCelularContacto
     *
     * @return Organizacion
     */
    public function setTelefonoCelularContacto($telefonoCelularContacto)
    {
        $this->telefono_celular_contacto = $telefonoCelularContacto;
    
        return $this;
    }

    /**
     * Get telefonoCelularContacto
     *
     * @return string
     */
    public function getTelefonoCelularContacto()
    {
        return $this->telefono_celular_contacto;
    }

    /**
     * Set correoElectronicoContacto
     *
     * @param string $correoElectronicoContacto
     *
     * @return Organizacion
     */
    public function setCorreoElectronicoContacto($correoElectronicoContacto)
    {
        $this->correo_electronico_contacto = $correoElectronicoContacto;
    
        return $this;
    }

    /**
     * Get correoElectronicoContacto
     *
     * @return string
     */
    public function getCorreoElectronicoContacto()
    {
        return $this->correo_electronico_contacto;
    }

    /**
     * Set ruta
     *
     * @param boolean $ruta
     *
     * @return Organizacion
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    
        return $this;
    }

    /**
     * Get ruta
     *
     * @return boolean
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set pasantia
     *
     * @param boolean $pasantia
     *
     * @return Organizacion
     */
    public function setPasantia($pasantia)
    {
        $this->pasantia = $pasantia;
    
        return $this;
    }

    /**
     * Get pasantia
     *
     * @return boolean
     */
    public function getPasantia()
    {
        return $this->pasantia;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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
     * @return Organizacion
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

