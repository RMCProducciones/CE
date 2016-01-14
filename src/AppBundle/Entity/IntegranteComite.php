<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IntegranteComite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\IntegranteComiteRepository")
 */
class IntegranteComite
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
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
     * @ORM\Column(name="segundo_apellido", type="string", nullable=true)
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
     * @ORM\Column(name="segundo_nombre", type="string", nullable=true)
     */
    private $segundo_nombre;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $genero;

   /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fecha_nacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="string")
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string")
     */
    private $cargo;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string")
     */
    private $direccion;

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
     * @ORM\Column(name="telefono_celular2", type="string", nullable=true)
     */
    private $telefono_celular2;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", nullable=true)
     */
    private $correo_electronico;

  /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $nivel_estudios;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $pertenencia_etnica;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", nullable=true)
     */
    private $foto;

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
     * Set tipoDocumento
     *
     * @param AppBundle\Entity\Listas $tipoDocumento
     *
     * @return IntegranteComite
     */
    public function setTipoDocumento(\AppBundle\Entity\Listas $tipoDocumento)
    {
        $this->tipo_documento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return AppBundle\Entity\Listas
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @param AppBundle\Entity\Listas $genero
     *
     * @return IntegranteComite
     */
    public function setGenero(\AppBundle\Entity\Listas $genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return AppBundle\Entity\Listas
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
     * @return IntegranteComite
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
     * Set entidad
     *
     * @param string $entidad
     *
     * @return IntegranteComite
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return IntegranteComite
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return IntegranteComite
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return IntegranteComite
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * Set telefonoCelular2
     *
     * @param string $telefonoCelular2
     *
     * @return IntegranteComite
     */
    public function setTelefonoCelular2($telefonoCelular2)
    {
        $this->telefono_celular2 = $telefonoCelular2;

        return $this;
    }

    /**
     * Get telefonoCelular2
     *
     * @return string
     */
    public function getTelefonoCelular2()
    {
        return $this->telefono_celular2;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     *
     * @return IntegranteComite
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
     * Set nivelEstudios
     *
     * @param AppBundle\Entity\Listas $nivelEstudios
     *
     * @return IntegranteComite
     */
    public function setNivelEstudios(\AppBundle\Entity\Listas $nivelEstudios)
    {
        $this->nivel_estudios = $nivelEstudios;

        return $this;
    }

    /**
     * Get nivelEstudios
     *
     * @return AppBundle\Entity\Listas
     */
    public function getNivelEstudios()
    {
        return $this->nivel_estudios;
    }

    /**
     * Set pertenenciaEtnica
     *
     * @param AppBundle\Entity\Listas $pertenenciaEtnica
     *
     * @return IntegranteComite
     */
    public function setPertenenciaEtnica(\AppBundle\Entity\Listas $pertenenciaEtnica)
    {
        $this->pertenencia_etnica = $pertenenciaEtnica;

        return $this;
    }

    /**
     * Get pertenenciaEtnica
     *
     * @return AppBundle\Entity\Listas
     */
    public function getPertenenciaEtnica()
    {
        return $this->pertenencia_etnica;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return IntegranteComite
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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
     * @return IntegranteComite
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

