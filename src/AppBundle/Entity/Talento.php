<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Talento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TalentoRepository")
 */
class Talento
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
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

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
     * @var integer
     *
     * @ORM\Column(name="rol_grupo_familiar", type="integer")
     */
    private $rol_grupo_familiar;

    /**
     * @var integer
     *
     * @ORM\Column(name="municipio", type="integer")
     */
    private $municipio;

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
     * @var integer
     *
     * @ORM\Column(name="estado_civil", type="integer")
     */
    private $estado_civil;

    /**
     * @var string
     *
     * @ORM\Column(name="organizacion", type="string")
     */
    private $organizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_talento", type="datetime")
     */
    private $fecha_inicio_talento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="talento_madr", type="boolean")
     */
    private $talento_madr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="talento_otros_lugares", type="boolean")
     */
    private $talento_otros_lugares;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad_participado", type="string")
     */
    private $actividad_participado;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_estudios", type="integer")
     */
    private $nivel_estudios;

    /**
     * @var string
     *
     * @ORM\Column(name="area_desempeno_principal", type="string")
     */
    private $area_desempeno_principal;

    /**
     * @var string
     *
     * @ORM\Column(name="area_desempeno_secundario", type="string")
     */
    private $area_desempeno_secundario;

    /**
     * @var string
     *
     * @ORM\Column(name="area_desempeno_terciario", type="string")
     */
    private $area_desempeno_terciario;

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
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Talento
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
     * Set tipoDocumento
     *
     * @param integer $tipoDocumento
     *
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * Set rolGrupoFamiliar
     *
     * @param integer $rolGrupoFamiliar
     *
     * @return Talento
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
     * Set municipio
     *
     * @param integer $municipio
     *
     * @return Talento
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * Set estadoCivil
     *
     * @param integer $estadoCivil
     *
     * @return Talento
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
     * Set organizacion
     *
     * @param string $organizacion
     *
     * @return Talento
     */
    public function setOrganizacion($organizacion)
    {
        $this->organizacion = $organizacion;

        return $this;
    }

    /**
     * Get organizacion
     *
     * @return string
     */
    public function getOrganizacion()
    {
        return $this->organizacion;
    }

    /**
     * Set fechaInicioTalento
     *
     * @param \DateTime $fechaInicioTalento
     *
     * @return Talento
     */
    public function setFechaInicioTalento($fechaInicioTalento)
    {
        $this->fecha_inicio_talento = $fechaInicioTalento;

        return $this;
    }

    /**
     * Get fechaInicioTalento
     *
     * @return \DateTime
     */
    public function getFechaInicioTalento()
    {
        return $this->fecha_inicio_talento;
    }

    /**
     * Set talentoMadr
     *
     * @param boolean $talentoMadr
     *
     * @return Talento
     */
    public function setTalentoMadr($talentoMadr)
    {
        $this->talento_madr = $talentoMadr;

        return $this;
    }

    /**
     * Get talentoMadr
     *
     * @return boolean
     */
    public function getTalentoMadr()
    {
        return $this->talento_madr;
    }

    /**
     * Set talentoOtrosLugares
     *
     * @param boolean $talentoOtrosLugares
     *
     * @return Talento
     */
    public function setTalentoOtrosLugares($talentoOtrosLugares)
    {
        $this->talento_otros_lugares = $talentoOtrosLugares;

        return $this;
    }

    /**
     * Get talentoOtrosLugares
     *
     * @return boolean
     */
    public function getTalentoOtrosLugares()
    {
        return $this->talento_otros_lugares;
    }

    /**
     * Set actividadParticipado
     *
     * @param string $actividadParticipado
     *
     * @return Talento
     */
    public function setActividadParticipado($actividadParticipado)
    {
        $this->actividad_participado = $actividadParticipado;

        return $this;
    }

    /**
     * Get actividadParticipado
     *
     * @return string
     */
    public function getActividadParticipado()
    {
        return $this->actividad_participado;
    }

    /**
     * Set nivelEstudios
     *
     * @param integer $nivelEstudios
     *
     * @return Talento
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
     * Set areaDesempenoPrincipal
     *
     * @param string $areaDesempenoPrincipal
     *
     * @return Talento
     */
    public function setAreaDesempenoPrincipal($areaDesempenoPrincipal)
    {
        $this->area_desempeno_principal = $areaDesempenoPrincipal;

        return $this;
    }

    /**
     * Get areaDesempenoPrincipal
     *
     * @return string
     */
    public function getAreaDesempenoPrincipal()
    {
        return $this->area_desempeno_principal;
    }

    /**
     * Set areaDesempenoSecundario
     *
     * @param string $areaDesempenoSecundario
     *
     * @return Talento
     */
    public function setAreaDesempenoSecundario($areaDesempenoSecundario)
    {
        $this->area_desempeno_secundario = $areaDesempenoSecundario;

        return $this;
    }

    /**
     * Get areaDesempenoSecundario
     *
     * @return string
     */
    public function getAreaDesempenoSecundario()
    {
        return $this->area_desempeno_secundario;
    }

    /**
     * Set areaDesempenoTerciario
     *
     * @param string $areaDesempenoTerciario
     *
     * @return Talento
     */
    public function setAreaDesempenoTerciario($areaDesempenoTerciario)
    {
        $this->area_desempeno_terciario = $areaDesempenoTerciario;

        return $this;
    }

    /**
     * Get areaDesempenoTerciario
     *
     * @return string
     */
    public function getAreaDesempenoTerciario()
    {
        return $this->area_desempeno_terciario;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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
     * @return Talento
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

