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
     * @var string
     *
     * @ORM\Column(name="linea_productiva", type="string")
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
     * @ORM\Column(name="municipio", type="integer")
     */
    private $municipio;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_documentoo_contacto", type="integer")
     */
    private $tipo_documentoo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento_contacto", type="string")
     */
    private $numero_documento_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellidoo_contacto", type="string")
     */
    private $primer_apellidoo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellidoo_contacto", type="string")
     */
    private $segundo_apellidoo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombreo_contacto", type="string")
     */
    private $primer_nombreo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombreo_contacto", type="string")
     */
    private $segundo_nombreo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijoo_contacto", type="string")
     */
    private $telefono_fijoo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celularo_contacto", type="string")
     */
    private $telefono_celularo_contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronicoo_contacto", type="string")
     */
    private $correo_electronicoo_contacto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ruta", type="boolean")
     */
    private $ruta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pasantia", type="boolean")
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
     * @param string $lineaProductiva
     *
     * @return Organizacion
     */
    public function setLineaProductiva($lineaProductiva)
    {
        $this->linea_productiva = $lineaProductiva;
    
        return $this;
    }

    /**
     * Get lineaProductiva
     *
     * @return string
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
     * Set tipoDocumentooContacto
     *
     * @param integer $tipoDocumentooContacto
     *
     * @return Organizacion
     */
    public function setTipoDocumentooContacto($tipoDocumentooContacto)
    {
        $this->tipo_documentoo_contacto = $tipoDocumentooContacto;
    
        return $this;
    }

    /**
     * Get tipoDocumentooContacto
     *
     * @return integer
     */
    public function getTipoDocumentooContacto()
    {
        return $this->tipo_documentoo_contacto;
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
     * Set primerApellidooContacto
     *
     * @param string $primerApellidooContacto
     *
     * @return Organizacion
     */
    public function setPrimerApellidooContacto($primerApellidooContacto)
    {
        $this->primer_apellidoo_contacto = $primerApellidooContacto;
    
        return $this;
    }

    /**
     * Get primerApellidooContacto
     *
     * @return string
     */
    public function getPrimerApellidooContacto()
    {
        return $this->primer_apellidoo_contacto;
    }

    /**
     * Set segundoApellidooContacto
     *
     * @param string $segundoApellidooContacto
     *
     * @return Organizacion
     */
    public function setSegundoApellidooContacto($segundoApellidooContacto)
    {
        $this->segundo_apellidoo_contacto = $segundoApellidooContacto;
    
        return $this;
    }

    /**
     * Get segundoApellidooContacto
     *
     * @return string
     */
    public function getSegundoApellidooContacto()
    {
        return $this->segundo_apellidoo_contacto;
    }

    /**
     * Set primerNombreoContacto
     *
     * @param string $primerNombreoContacto
     *
     * @return Organizacion
     */
    public function setPrimerNombreoContacto($primerNombreoContacto)
    {
        $this->primer_nombreo_contacto = $primerNombreoContacto;
    
        return $this;
    }

    /**
     * Get primerNombreoContacto
     *
     * @return string
     */
    public function getPrimerNombreoContacto()
    {
        return $this->primer_nombreo_contacto;
    }

    /**
     * Set segundoNombreoContacto
     *
     * @param string $segundoNombreoContacto
     *
     * @return Organizacion
     */
    public function setSegundoNombreoContacto($segundoNombreoContacto)
    {
        $this->segundo_nombreo_contacto = $segundoNombreoContacto;
    
        return $this;
    }

    /**
     * Get segundoNombreoContacto
     *
     * @return string
     */
    public function getSegundoNombreoContacto()
    {
        return $this->segundo_nombreo_contacto;
    }

    /**
     * Set telefonoFijooContacto
     *
     * @param string $telefonoFijooContacto
     *
     * @return Organizacion
     */
    public function setTelefonoFijooContacto($telefonoFijooContacto)
    {
        $this->telefono_fijoo_contacto = $telefonoFijooContacto;
    
        return $this;
    }

    /**
     * Get telefonoFijooContacto
     *
     * @return string
     */
    public function getTelefonoFijooContacto()
    {
        return $this->telefono_fijoo_contacto;
    }

    /**
     * Set telefonoCelularoContacto
     *
     * @param string $telefonoCelularoContacto
     *
     * @return Organizacion
     */
    public function setTelefonoCelularoContacto($telefonoCelularoContacto)
    {
        $this->telefono_celularo_contacto = $telefonoCelularoContacto;
    
        return $this;
    }

    /**
     * Get telefonoCelularoContacto
     *
     * @return string
     */
    public function getTelefonoCelularoContacto()
    {
        return $this->telefono_celularo_contacto;
    }

    /**
     * Set correoElectronicooContacto
     *
     * @param string $correoElectronicooContacto
     *
     * @return Organizacion
     */
    public function setCorreoElectronicooContacto($correoElectronicooContacto)
    {
        $this->correo_electronicoo_contacto = $correoElectronicooContacto;
    
        return $this;
    }

    /**
     * Get correoElectronicooContacto
     *
     * @return string
     */
    public function getCorreoElectronicooContacto()
    {
        return $this->correo_electronicoo_contacto;
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
     * @param integer $usuarioModificacion
     *
     * @return Organizacion
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
     * @param integer $usuarioCreacion
     *
     * @return Organizacion
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

