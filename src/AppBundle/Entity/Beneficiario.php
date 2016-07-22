<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BeneficiarioRepository")
 */
class Beneficiario
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
     * @var integer
     *
     * @ORM\Column(name="edad_inscripcion", type="integer")
     */
    private $edad_inscripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="joven_rural", type="boolean", nullable=true)
     */
    private $joven_rural;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $corte_sisben;

    /**
     * @var string
     *
     * @ORM\Column(name="puntaje_sisben", type="decimal", scale=2, nullable=true)
     */
    private $puntaje_sisben;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $pertenencia_etnica;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $grupo_indigena;

    /**
     * @var boolean
     *
     * @ORM\Column(name="desplazado", type="boolean", nullable=true)
     */
    private $desplazado;

	 /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $discapacidad;
	
    /**
     * @var boolean
     *
     * @ORM\Column(name="red_unidos", type="boolean")
     */
    private $red_unidos;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $estado_civil;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $rol_grupo_familiar;

   /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $hijos_menores_5;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $miembros_nucleo_familiar;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sabe_leer", type="boolean", nullable=true)
     */
    private $sabe_leer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sabe_escribir", type="boolean", nullable=true)
     */
    private $sabe_escribir;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $nivel_estudios;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $ocupacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $tipo_vivienda;
	
	/**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string")
     */
    private $direccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rural", type="boolean", nullable=true)
     */
    private $rural;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

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
     * @var string
     *
     * @ORM\Column(name="telefono_fijo", type="string", nullable=true)
     */
    private $telefono_fijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string", nullable=true)
     */
    private $telefono_celular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", nullable=true)
     */
    private $correo_electronico;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    private $tipo_documento_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento_conyugue", type="string", nullable=true)
     */
    private $numero_documento_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido_conyugue", type="string", nullable=true)
     */
    private $primer_apellido_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido_conyugue", type="string", nullable=true)
     */
    private $segundo_apellido_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre_conyugue", type="string", nullable=true)
     */
    private $primer_nombre_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre_conyugue", type="string", nullable=true)
     */
    private $segundo_nombre_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo_conyugue", type="string", nullable=true)
     */
    private $telefono_fijo_conyugue;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular_conyugue", type="string", nullable=true)
     */
    private $telefono_celular_conyugue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
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


    public function __toString()
    {
        return $this->getPrimerNombre().' '.$this->getSegundoNombre().' '.$this->getPrimerApellido().' '.$this->getSegundoApellido();
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
     * Set grupo
     *
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return Beneficiario
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
     * Set tipoDocumento
     *
     * @param AppBundle\Entity\Listas $tipoDocumento
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @param  AppBundle\Entity\Listas $genero
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Set corteSisben
     *
     * @param AppBundle\Entity\Listas $corteSisben
     *
     * @return Beneficiario
     */
    public function setCorteSisben(\AppBundle\Entity\Listas $corteSisben)
    {
        $this->corte_sisben = $corteSisben;

        return $this;
    }

    /**
     * Get corteSisben
     *
     * @return AppBundle\Entity\Listas
     */
    public function getCorteSisben()
    {
        return $this->corte_sisben;
    }

    /**
     * Set puntajeSisben
     *
     * @param string $puntajeSisben
     *
     * @return Beneficiario
     */
    public function setPuntajeSisben($puntajeSisben)
    {
        $this->puntaje_sisben = $puntajeSisben;

        return $this;
    }

    /**
     * Get puntajeSisben
     *
     * @return string
     */
    public function getPuntajeSisben()
    {
        return $this->puntaje_sisben;
    }

    /**
     * Set pertenenciaEtnica
     *
     * @param AppBundle\Entity\Listas $pertenenciaEtnica
     *
     * @return Beneficiario
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
     * Set grupoIndigena
     *
     * @param AppBundle\Entity\Listas $grupoIndigena
     *
     * @return Beneficiario
     */
    public function setGrupoIndigena(\AppBundle\Entity\Listas $grupoIndigena)
    {
        $this->grupo_indigena = $grupoIndigena;

        return $this;
    }

    public function setNullGrupoIndigena()
    {
        $this->grupo_indigena = null;
    }



    /**
     * Get grupoIndigena
     *
     * @return AppBundle\Entity\Listas
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
     * @return Beneficiario
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
     * @param AppBundle\Entity\Listas $discapacidad
     *
     * @return Beneficiario
     */
    public function setDiscapacidad(\AppBundle\Entity\Listas $discapacidad)
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    /**
     * Get discapacidad
     *
     * @return AppBundle\Entity\Listas
     */
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }

    /**
     * Set redUnidos
     *
     * @param boolean $redUnidos
     *
     * @return Beneficiario
     */
    public function setRedUnidos($redUnidos)
    {
        $this->red_unidos = $redUnidos;

        return $this;
    }

    /**
     * Get redUnidos
     *
     * @return boolean
     */
    public function getRedUnidos()
    {
        return $this->red_unidos;
    }

    /**
     * Set estadoCivil
     *
     * @param AppBundle\Entity\Listas $estadoCivil
     *
     * @return Beneficiario
     */
    public function setEstadoCivil(\AppBundle\Entity\Listas $estadoCivil)
    {
        $this->estado_civil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return AppBundle\Entity\Listas
     */
    public function getEstadoCivil()
    {
        return $this->estado_civil;
    }

    /**
     * Set rolGrupoFamiliar
     *
     * @param AppBundle\Entity\Listas $rolGrupoFamiliar
     *
     * @return Beneficiario
     */
    public function setRolGrupoFamiliar(\AppBundle\Entity\Listas $rolGrupoFamiliar)
    {
        $this->rol_grupo_familiar = $rolGrupoFamiliar;

        return $this;
    }

    /**
     * Get rolGrupoFamiliar
     *
     * @return AppBundle\Entity\Listas
     */
    public function getRolGrupoFamiliar()
    {
        return $this->rol_grupo_familiar;
    }

    /**
     * Set hijosMenores5
     *
     * @param AppBundle\Entity\Listas $hijosMenores5
     *
     * @return Beneficiario
     */
    public function setHijosMenores5(\AppBundle\Entity\Listas $hijosMenores5)
    {
        $this->hijos_menores_5 = $hijosMenores5;

        return $this;
    }

    /**
     * Get hijosMenores5
     *
     * @return AppBundle\Entity\Listas
     */
    public function getHijosMenores5()
    {
        return $this->hijos_menores_5;
    }

    /**
     * Set miembrosNucleoFamiliar
     *
     * @param AppBundle\Entity\Listas $miembrosNucleoFamiliar
     *
     * @return Beneficiario
     */
    public function setMiembrosNucleoFamiliar(\AppBundle\Entity\Listas $miembrosNucleoFamiliar)
    {
        $this->miembros_nucleo_familiar = $miembrosNucleoFamiliar;

        return $this;
    }

    /**
     * Get miembrosNucleoFamiliar
     *
     * @return AppBundle\Entity\Listas
     */
    public function getMiembrosNucleoFamiliar()
    {
        return $this->miembros_nucleo_familiar;
    }

    /**
     * Set sabeLeer
     *
     * @param boolean $sabeLeer
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @param AppBundle\Entity\Listas $nivelEstudios
     *
     * @return Beneficiario
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
     * Set ocupacion
     *
     * @param AppBundle\Entity\Listas $ocupacion
     *
     * @return Beneficiario
     */
    public function setOcupacion(\AppBundle\Entity\Listas $ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return AppBundle\Entity\Listas
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set tipoVivienda
     *
     * @param AppBundle\Entity\Listas $tipoVivienda
     *
     * @return Beneficiario
     */
    public function setTipoVivienda(\AppBundle\Entity\Listas $tipoVivienda)
    {
        $this->tipo_vivienda = $tipoVivienda;

        return $this;
    }

    /**
     * Get tipoVivienda
     *
     * @return AppBundle\Entity\Listas
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
     * @return Beneficiario
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Beneficiario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
	
	  /**
     * Set corregimiento
     *
     * @param string $corregimiento
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Set tipoDocumentoConyugue
     *
     * @param AppBundle\Entity\Listas $tipoDocumentoConyugue
     *
     * @return Beneficiario
     */
    public function setTipoDocumentoConyugue(\AppBundle\Entity\Listas $tipoDocumentoConyugue)
    {
        $this->tipo_documento_conyugue = $tipoDocumentoConyugue;

        return $this;
    }


    /**
     * Get tipoDocumentoConyugue
     *
     * @return AppBundle\Entity\Listas
     */
    public function getTipoDocumentoConyugue()
    {
        return $this->tipo_documento_conyugue;
    }

   public function setNullDocumentoConyugue()
    {
        $this->tipo_documento_conyugue = null;
    }

    /**
     * Set numeroDocumentoConyugue
     *
     * @param string $numeroDocumentoConyugue
     *
     * @return Beneficiario
     */
    public function setNumeroDocumentoConyugue($numeroDocumentoConyugue)
    {
        $this->numero_documento_conyugue = $numeroDocumentoConyugue;

        return $this;
    }

    /**
     * Get numeroDocumentoConyugue
     *
     * @return string
     */
    public function getNumeroDocumentoConyugue()
    {
        return $this->numero_documento_conyugue;
    }

    /**
     * Set primerApellidoConyugue
     *
     * @param string $primerApellidoConyugue
     *
     * @return Beneficiario
     */
    public function setPrimerApellidoConyugue($primerApellidoConyugue)
    {
        $this->primer_apellido_conyugue = $primerApellidoConyugue;

        return $this;
    }

    /**
     * Get primerApellidoConyugue
     *
     * @return string
     */
    public function getPrimerApellidoConyugue()
    {
        return $this->primer_apellido_conyugue;
    }

    /**
     * Set segundoApellidoConyugue
     *
     * @param string $segundoApellidoConyugue
     *
     * @return Beneficiario
     */
    public function setSegundoApellidoConyugue($segundoApellidoConyugue)
    {
        $this->segundo_apellido_conyugue = $segundoApellidoConyugue;

        return $this;
    }

    /**
     * Get segundoApellidoConyugue
     *
     * @return string
     */
    public function getSegundoApellidoConyugue()
    {
        return $this->segundo_apellido_conyugue;
    }

    /**
     * Set primerNombreConyugue
     *
     * @param string $primerNombreConyugue
     *
     * @return Beneficiario
     */
    public function setPrimerNombreConyugue($primerNombreConyugue)
    {
        $this->primer_nombre_conyugue = $primerNombreConyugue;

        return $this;
    }

    /**
     * Get primerNombreConyugue
     *
     * @return string
     */
    public function getPrimerNombreConyugue()
    {
        return $this->primer_nombre_conyugue;
    }

    /**
     * Set segundoNombreConyugue
     *
     * @param string $segundoNombreConyugue
     *
     * @return Beneficiario
     */
    public function setSegundoNombreConyugue($segundoNombreConyugue)
    {
        $this->segundo_nombre_conyugue = $segundoNombreConyugue;

        return $this;
    }

    /**
     * Get segundoNombreConyugue
     *
     * @return string
     */
    public function getSegundoNombreConyugue()
    {
        return $this->segundo_nombre_conyugue;
    }

    /**
     * Set telefonoFijoConyugue
     *
     * @param string $telefonoFijoConyugue
     *
     * @return Beneficiario
     */
    public function setTelefonoFijoConyugue($telefonoFijoConyugue)
    {
        $this->telefono_fijo_conyugue = $telefonoFijoConyugue;

        return $this;
    }

    /**
     * Get telefonoFijoConyugue
     *
     * @return string
     */
    public function getTelefonoFijoConyugue()
    {
        return $this->telefono_fijo_conyugue;
    }

    /**
     * Set telefonoCelularConyugue
     *
     * @param string $telefonoCelularConyugue
     *
     * @return Beneficiario
     */
    public function setTelefonoCelularConyugue($telefonoCelularConyugue)
    {
        $this->telefono_celular_conyugue = $telefonoCelularConyugue;

        return $this;
    }

    /**
     * Get telefonoCelularConyugue
     *
     * @return string
     */
    public function getTelefonoCelularConyugue()
    {
        return $this->telefono_celular_conyugue;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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

