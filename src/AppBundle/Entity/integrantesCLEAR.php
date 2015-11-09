<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * integrantesCLEAR
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\integrantesCLEARRepository")
 */
class integrantesCLEAR
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
     * @ORM\Column(name="clear", type="integer")
     */
    private $clear;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_documento", type="integer")
     */
    private $tipo_documento;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento", type="string")
     */
    private $numero_documento;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido", type="string")
     */
    private $primer_apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido", type="string")
     */
    private $segundo_apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre", type="string")
     */
    private $primer_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre", type="string")
     */
    private $segundo_nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="genero", type="integer")
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fecha_nacimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="pertenencia_etnica", type="integer")
     */
    private $pertenencia_etnica;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_estudios", type="integer")
     */
    private $nivel_estudios;

    /**
     * @var integer
     *
     * @ORM\Column(name="grupo_indigena", type="integer")
     */
    private $grupo_indigena;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad_representa", type="string")
     */
    private $entidad_representa;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo_entidad", type="string")
     */
    private $cargo_entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo", type="string")
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
     * Set clear
     *
     * @param integer $clear
     *
     * @return integrantesCLEAR
     */
    public function setClear($clear)
    {
        $this->clear = $clear;

        return $this;
    }

    /**
     * Get clear
     *
     * @return integer
     */
    public function getClear()
    {
        return $this->clear;
    }

    /**
     * Set tipoDocumento
     *
     * @param integer $tipoDocumento
     *
     * @return integrantesCLEAR
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipo_documento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return integer
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set numeroDocumento
     *
     * @param string $numeroDocumento
     *
     * @return integrantesCLEAR
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numero_documento = $numeroDocumento;

        return $this;
    }

    /**
     * Get numeroDocumento
     *
     * @return string
     */
    public function getNumeroDocumento()
    {
        return $this->numero_documento;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     *
     * @return integrantesCLEAR
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primer_apellido = $primerApellido;

        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string
     */
    public function getPrimerApellido()
    {
        return $this->primer_apellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     *
     * @return integrantesCLEAR
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundo_apellido = $segundoApellido;

        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string
     */
    public function getSegundoApellido()
    {
        return $this->segundo_apellido;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     *
     * @return integrantesCLEAR
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primer_nombre = $primerNombre;

        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string
     */
    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     *
     * @return integrantesCLEAR
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundo_nombre = $segundoNombre;

        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string
     */
    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }

    /**
     * Set genero
     *
     * @param integer $genero
     *
     * @return integrantesCLEAR
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return integer
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return integrantesCLEAR
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
     * Set pertenenciaEtnica
     *
     * @param integer $pertenenciaEtnica
     *
     * @return integrantesCLEAR
     */
    public function setPertenenciaEtnica($pertenenciaEtnica)
    {
        $this->pertenencia_etnica = $pertenenciaEtnica;

        return $this;
    }

    /**
     * Get pertenenciaEtnica
     *
     * @return integer
     */
    public function getPertenenciaEtnica()
    {
        return $this->pertenencia_etnica;
    }

    /**
     * Set nivelEstudios
     *
     * @param integer $nivelEstudios
     *
     * @return integrantesCLEAR
     */
    public function setNivelEstudios($nivelEstudios)
    {
        $this->nivel_estudios = $nivelEstudios;

        return $this;
    }

    /**
     * Get nivelEstudios
     *
     * @return integer
     */
    public function getNivelEstudios()
    {
        return $this->nivel_estudios;
    }

    /**
     * Set grupoIndigena
     *
     * @param integer $grupoIndigena
     *
     * @return integrantesCLEAR
     */
    public function setGrupoIndigena($grupoIndigena)
    {
        $this->grupo_indigena = $grupoIndigena;

        return $this;
    }

    /**
     * Get grupoIndigena
     *
     * @return integer
     */
    public function getGrupoIndigena()
    {
        return $this->grupo_indigena;
    }

    /**
     * Set entidadRepresenta
     *
     * @param string $entidadRepresenta
     *
     * @return integrantesCLEAR
     */
    public function setEntidadRepresenta($entidadRepresenta)
    {
        $this->entidad_representa = $entidadRepresenta;

        return $this;
    }

    /**
     * Get entidadRepresenta
     *
     * @return string
     */
    public function getEntidadRepresenta()
    {
        return $this->entidad_representa;
    }

    /**
     * Set cargoEntidad
     *
     * @param string $cargoEntidad
     *
     * @return integrantesCLEAR
     */
    public function setCargoEntidad($cargoEntidad)
    {
        $this->cargo_entidad = $cargoEntidad;

        return $this;
    }

    /**
     * Get cargoEntidad
     *
     * @return string
     */
    public function getCargoEntidad()
    {
        return $this->cargo_entidad;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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
     * Set active
     *
     * @param boolean $active
     *
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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
     * @return integrantesCLEAR
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

