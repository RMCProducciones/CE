<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Participante
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
     * @ORM\Column(name="beneficiario", type="integer")
     */
    private $beneficiario;

    /**
     * @var integer
     *
     * @ORM\Column(name="relacion", type="integer")
     */
    private $relacion;

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
     * @ORM\Column(name="edad_inscripcion", type="integer")
     */
    private $edad_inscripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="joven_rural", type="boolean")
     */
    private $joven_rural;

    /**
     * @var integer
     *
     * @ORM\Column(name="pertenencia_etnica", type="integer")
     */
    private $pertenencia_etnica;

    /**
     * @var integer
     *
     * @ORM\Column(name="grupo_indigena", type="integer")
     */
    private $grupo_indigena;

    /**
     * @var boolean
     *
     * @ORM\Column(name="desplazado", type="boolean")
     */
    private $desplazado;

    /**
     * @var string
     *
     * @ORM\Column(name="discapacidad", type="string")
     */
    private $discapacidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_civil", type="integer")
     */
    private $estado_civil;

    /**
     * @var integer
     *
     * @ORM\Column(name="rol_grupo_familiar", type="integer")
     */
    private $rol_grupo_familiar;

    /**
     * @var integer
     *
     * @ORM\Column(name="hijos_menores_5", type="integer")
     */
    private $hijos_menores_5;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sabe_leer", type="boolean")
     */
    private $sabe_leer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sabe_escribir", type="boolean")
     */
    private $sabe_escribir;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_estudios", type="integer")
     */
    private $nivel_estudios;

    /**
     * @var integer
     *
     * @ORM\Column(name="ocupacion", type="integer")
     */
    private $ocupacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_vivienda", type="integer")
     */
    private $tipo_vivienda;

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
     * Set beneficiario
     *
     * @param integer $beneficiario
     *
     * @return Participante
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return integer
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set relacion
     *
     * @param integer $relacion
     *
     * @return Participante
     */
    public function setRelacion($relacion)
    {
        $this->relacion = $relacion;

        return $this;
    }

    /**
     * Get relacion
     *
     * @return integer
     */
    public function getRelacion()
    {
        return $this->relacion;
    }

    /**
     * Set tipoDocumento
     *
     * @param integer $tipoDocumento
     *
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * Set edadInscripcion
     *
     * @param integer $edadInscripcion
     *
     * @return Participante
     */
    public function setEdadInscripcion($edadInscripcion)
    {
        $this->edad_inscripcion = $edadInscripcion;

        return $this;
    }

    /**
     * Get edadInscripcion
     *
     * @return integer
     */
    public function getEdadInscripcion()
    {
        return $this->edad_inscripcion;
    }

    /**
     * Set jovenRural
     *
     * @param boolean $jovenRural
     *
     * @return Participante
     */
    public function setJovenRural($jovenRural)
    {
        $this->joven_rural = $jovenRural;

        return $this;
    }

    /**
     * Get jovenRural
     *
     * @return boolean
     */
    public function getJovenRural()
    {
        return $this->joven_rural;
    }

    /**
     * Set pertenenciaEtnica
     *
     * @param integer $pertenenciaEtnica
     *
     * @return Participante
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
     * Set grupoIndigena
     *
     * @param integer $grupoIndigena
     *
     * @return Participante
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
     * Set desplazado
     *
     * @param boolean $desplazado
     *
     * @return Participante
     */
    public function setDesplazado($desplazado)
    {
        $this->desplazado = $desplazado;

        return $this;
    }

    /**
     * Get desplazado
     *
     * @return boolean
     */
    public function getDesplazado()
    {
        return $this->desplazado;
    }

    /**
     * Set discapacidad
     *
     * @param string $discapacidad
     *
     * @return Participante
     */
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    /**
     * Get discapacidad
     *
     * @return string
     */
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }

    /**
     * Set estadoCivil
     *
     * @param integer $estadoCivil
     *
     * @return Participante
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estado_civil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return integer
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * Set rolGrupoFamiliar
     *
     * @param integer $rolGrupoFamiliar
     *
     * @return Participante
     */
    public function setRolGrupoFamiliar($rolGrupoFamiliar)
    {
        $this->rol_grupo_familiar = $rolGrupoFamiliar;

        return $this;
    }

    /**
     * Get rolGrupoFamiliar
     *
     * @return integer
     */
    public function getRolGrupoFamiliar()
    {
        return $this->rol_grupo_familiar;
    }

    /**
     * Set hijosMenores5
     *
     * @param integer $hijosMenores5
     *
     * @return Participante
     */
    public function setHijosMenores5($hijosMenores5)
    {
        $this->hijos_menores_5 = $hijosMenores5;

        return $this;
    }

    /**
     * Get hijosMenores5
     *
     * @return integer
     */
    public function getHijosMenores5()
    {
        return $this->hijos_menores_5;
    }

    /**
     * Set sabeLeer
     *
     * @param boolean $sabeLeer
     *
     * @return Participante
     */
    public function setSabeLeer($sabeLeer)
    {
        $this->sabe_leer = $sabeLeer;

        return $this;
    }

    /**
     * Get sabeLeer
     *
     * @return boolean
     */
    public function getSabeLeer()
    {
        return $this->sabe_leer;
    }

    /**
     * Set sabeEscribir
     *
     * @param boolean $sabeEscribir
     *
     * @return Participante
     */
    public function setSabeEscribir($sabeEscribir)
    {
        $this->sabe_escribir = $sabeEscribir;

        return $this;
    }

    /**
     * Get sabeEscribir
     *
     * @return boolean
     */
    public function getSabeEscribir()
    {
        return $this->sabe_escribir;
    }

    /**
     * Set nivelEstudios
     *
     * @param integer $nivelEstudios
     *
     * @return Participante
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
     * Set ocupacion
     *
     * @param integer $ocupacion
     *
     * @return Participante
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return integer
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set tipoVivienda
     *
     * @param integer $tipoVivienda
     *
     * @return Participante
     */
    public function setTipoVivienda($tipoVivienda)
    {
        $this->tipo_vivienda = $tipoVivienda;

        return $this;
    }

    /**
     * Get tipoVivienda
     *
     * @return integer
     */
    public function getTipoVivienda()
    {
        return $this->tipo_vivienda;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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
     * @return Participante
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

