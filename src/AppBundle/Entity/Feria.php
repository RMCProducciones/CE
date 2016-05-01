<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FeriaRepository")
 */
class Feria
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
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_propuesta", type="datetime")
     */
    private $fecha_propuesta;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string")
     */
    private $lugar;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="entidades", type="text")
     */
    private $entidades;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacion", type="text")
     */
    private $presentacion;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo", type="text")
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivos_especificos", type="text")
     */
    private $objetivos_especificos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_aprobacion", type="datetime", nullable=true)
     */
    private $fecha_aprobacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_aprobada", type="datetime", nullable=true)
     */
    private $fecha_aprobada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobacion", type="boolean", nullable=true)
     */
    private $aprobacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="coordinador", type="integer", nullable=true)
     */
    private $coordinador;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_proyectos_produccion_agropecuaria", type="integer", nullable=true)
     */
    private $numero_proyectos_produccion_agropecuaria;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_proyectos_agroindustria", type="integer", nullable=true)
     */
    private $numero_proyectos_agroindustria;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_proyectos_turismo_rural", type="integer", nullable=true)
     */
    private $numero_proyectos_turismo_rural;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_proyectos_artesanias", type="integer", nullable=true)
     */
    private $numero_proyectos_artesanias;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_proyectos_otros_servicios", type="integer", nullable=true)
     */
    private $numero_proyectos_otros_servicios;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_produccion_agropecuaria", type="decimal", nullable=true)
     */
    private $valor_ventas_produccion_agropecuaria;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_agroindustria", type="decimal", nullable=true)
     */
    private $valor_ventas_agroindustria;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_turismo_rural", type="decimal", nullable=true)
     */
    private $valor_ventas_turismo_rural;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_artesanias", type="decimal", nullable=true)
     */
    private $valor_ventas_artesanias;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_ventas_otros_servicios", type="decimal", nullable=true)
     */
    private $valor_ventas_otros_servicios;

    /**
     * @var integer
     *
     * @ORM\Column(name="personas_atendidas", type="integer", nullable=true)
     */
    private $personas_atendidas;

    /**
     * @var integer
     *
     * @ORM\Column(name="representantes_instituciones", type="integer", nullable=true)
     */
    private $representantes_instituciones;

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="text", nullable=true)
     */
    private $comentarios;




    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fecha_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion", type="datetime", nullable=true)
     */
    private $fecha_finalizacion;
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_propuesta", type="datetime", nullable=true)
     */
    private $fecha_inicio_propuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion_propuesta", type="datetime", nullable=true)
     */
    private $fecha_finalizacion_propuesta;

    /**
     * @var integer
     *
     * @ORM\Column(name="aprobador", type="integer",nullable=true)
     */
    private $aprobador;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string",nullable=true)
     */
    private $observacion;








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
     * @param AppBundle\Entity\Listas $tipo
     *
     * @return Feria
     */
    public function setTipo(\AppBundle\Entity\Listas $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return AppBundle\Entity\Listas
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fechaPropuesta
     *
     * @param \DateTime $fechaPropuesta
     *
     * @return Feria
     */
    public function setFechaPropuesta($fechaPropuesta)
    {
        $this->fecha_propuesta = $fechaPropuesta;

        return $this;
    }

    /**
     * Get fechaPropuesta
     *
     * @return \DateTime
     */
    public function getFechaPropuesta()
    {
        return $this->fecha_propuesta;
    }

    /**
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return Feria
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
     * Set lugar
     *
     * @param string $lugar
     *
     * @return Feria
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return string
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Feria
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
     * Set entidades
     *
     * @param string $entidades
     *
     * @return Feria
     */
    public function setEntidades($entidades)
    {
        $this->entidades = $entidades;

        return $this;
    }

    /**
     * Get entidades
     *
     * @return string
     */
    public function getEntidades()
    {
        return $this->entidades;
    }

    /**
     * Set presentacion
     *
     * @param string $presentacion
     *
     * @return Feria
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    /**
     * Get presentacion
     *
     * @return string
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Feria
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set objetivosEspecificos
     *
     * @param string $objetivosEspecificos
     *
     * @return Feria
     */
    public function setObjetivosEspecificos($objetivosEspecificos)
    {
        $this->objetivos_especificos = $objetivosEspecificos;

        return $this;
    }

    /**
     * Get objetivosEspecificos
     *
     * @return string
     */
    public function getObjetivosEspecificos()
    {
        return $this->objetivos_especificos;
    }

    /**
     * Set fechaAprobacion
     *
     * @param \DateTime $fechaAprobacion
     *
     * @return Feria
     */
    public function setFechaAprobacion($fechaAprobacion)
    {
        $this->fecha_aprobacion = $fechaAprobacion;

        return $this;
    }

    /**
     * Get fechaAprobacion
     *
     * @return \DateTime
     */
    public function getFechaAprobacion()
    {
        return $this->fecha_aprobacion;
    }

    /**
     * Set fechaAprobada
     *
     * @param \DateTime $fechaAprobada
     *
     * @return Feria
     */
    public function setFechaAprobada($fechaAprobada)
    {
        $this->fecha_aprobada = $fechaAprobada;

        return $this;
    }

    /**
     * Get fechaAprobada
     *
     * @return \DateTime
     */
    public function getFechaAprobada()
    {
        return $this->fecha_aprobada;
    }

    /**
     * Set aprobacion
     *
     * @param boolean $aprobacion
     *
     * @return Feria
     */
    public function setAprobacion($aprobacion)
    {
        $this->aprobacion = $aprobacion;

        return $this;
    }

    /**
     * Get aprobacion
     *
     * @return boolean
     */
    public function getAprobacion()
    {
        return $this->aprobacion;
    }

    /**
     * Set coordinador
     *
     * @param integer $coordinador
     *
     * @return Feria
     */
    public function setCoordinador($coordinador)
    {
        $this->coordinador = $coordinador;

        return $this;
    }

    /**
     * Get coordinador
     *
     * @return integer
     */
    public function getCoordinador()
    {
        return $this->coordinador;
    }

    /**
     * Set numeroProyectosProduccionAgropecuaria
     *
     * @param integer $numeroProyectosProduccionAgropecuaria
     *
     * @return Feria
     */
    public function setNumeroProyectosProduccionAgropecuaria($numeroProyectosProduccionAgropecuaria)
    {
        $this->numero_proyectos_produccion_agropecuaria = $numeroProyectosProduccionAgropecuaria;

        return $this;
    }

    /**
     * Get numeroProyectosProduccionAgropecuaria
     *
     * @return integer
     */
    public function getNumeroProyectosProduccionAgropecuaria()
    {
        return $this->numero_proyectos_produccion_agropecuaria;
    }

    /**
     * Set numeroProyectosAgroindustria
     *
     * @param integer $numeroProyectosAgroindustria
     *
     * @return Feria
     */
    public function setNumeroProyectosAgroindustria($numeroProyectosAgroindustria)
    {
        $this->numero_proyectos_agroindustria = $numeroProyectosAgroindustria;

        return $this;
    }

    /**
     * Get numeroProyectosAgroindustria
     *
     * @return integer
     */
    public function getNumeroProyectosAgroindustria()
    {
        return $this->numero_proyectos_agroindustria;
    }

    /**
     * Set numeroProyectosTurismoRural
     *
     * @param integer $numeroProyectosTurismoRural
     *
     * @return Feria
     */
    public function setNumeroProyectosTurismoRural($numeroProyectosTurismoRural)
    {
        $this->numero_proyectos_turismo_rural = $numeroProyectosTurismoRural;

        return $this;
    }

    /**
     * Get numeroProyectosTurismoRural
     *
     * @return integer
     */
    public function getNumeroProyectosTurismoRural()
    {
        return $this->numero_proyectos_turismo_rural;
    }

    /**
     * Set numeroProyectosArtesanias
     *
     * @param integer $numeroProyectosArtesanias
     *
     * @return Feria
     */
    public function setNumeroProyectosArtesanias($numeroProyectosArtesanias)
    {
        $this->numero_proyectos_artesanias = $numeroProyectosArtesanias;

        return $this;
    }

    /**
     * Get numeroProyectosArtesanias
     *
     * @return integer
     */
    public function getNumeroProyectosArtesanias()
    {
        return $this->numero_proyectos_artesanias;
    }

    /**
     * Set numeroProyectosOtrosServicios
     *
     * @param integer $numeroProyectosOtrosServicios
     *
     * @return Feria
     */
    public function setNumeroProyectosOtrosServicios($numeroProyectosOtrosServicios)
    {
        $this->numero_proyectos_otros_servicios = $numeroProyectosOtrosServicios;

        return $this;
    }

    /**
     * Get numeroProyectosOtrosServicios
     *
     * @return integer
     */
    public function getNumeroProyectosOtrosServicios()
    {
        return $this->numero_proyectos_otros_servicios;
    }

    /**
     * Set valorVentasProduccionAgropecuaria
     *
     * @param string $valorVentasProduccionAgropecuaria
     *
     * @return Feria
     */
    public function setValorVentasProduccionAgropecuaria($valorVentasProduccionAgropecuaria)
    {
        $this->valor_ventas_produccion_agropecuaria = $valorVentasProduccionAgropecuaria;

        return $this;
    }

    /**
     * Get valorVentasProduccionAgropecuaria
     *
     * @return string
     */
    public function getValorVentasProduccionAgropecuaria()
    {
        return $this->valor_ventas_produccion_agropecuaria;
    }

    /**
     * Set valorVentasAgroindustria
     *
     * @param string $valorVentasAgroindustria
     *
     * @return Feria
     */
    public function setValorVentasAgroindustria($valorVentasAgroindustria)
    {
        $this->valor_ventas_agroindustria = $valorVentasAgroindustria;

        return $this;
    }

    /**
     * Get valorVentasAgroindustria
     *
     * @return string
     */
    public function getValorVentasAgroindustria()
    {
        return $this->valor_ventas_agroindustria;
    }

    /**
     * Set valorVentasTurismoRural
     *
     * @param string $valorVentasTurismoRural
     *
     * @return Feria
     */
    public function setValorVentasTurismoRural($valorVentasTurismoRural)
    {
        $this->valor_ventas_turismo_rural = $valorVentasTurismoRural;

        return $this;
    }

    /**
     * Get valorVentasTurismoRural
     *
     * @return string
     */
    public function getValorVentasTurismoRural()
    {
        return $this->valor_ventas_turismo_rural;
    }

    /**
     * Set valorVentasArtesanias
     *
     * @param string $valorVentasArtesanias
     *
     * @return Feria
     */
    public function setValorVentasArtesanias($valorVentasArtesanias)
    {
        $this->valor_ventas_artesanias = $valorVentasArtesanias;

        return $this;
    }

    /**
     * Get valorVentasArtesanias
     *
     * @return string
     */
    public function getValorVentasArtesanias()
    {
        return $this->valor_ventas_artesanias;
    }

    /**
     * Set valorVentasOtrosServicios
     *
     * @param string $valorVentasOtrosServicios
     *
     * @return Feria
     */
    public function setValorVentasOtrosServicios($valorVentasOtrosServicios)
    {
        $this->valor_ventas_otros_servicios = $valorVentasOtrosServicios;

        return $this;
    }

    /**
     * Get valorVentasOtrosServicios
     *
     * @return string
     */
    public function getValorVentasOtrosServicios()
    {
        return $this->valor_ventas_otros_servicios;
    }

    /**
     * Set personasAtendidas
     *
     * @param integer $personasAtendidas
     *
     * @return Feria
     */
    public function setPersonasAtendidas($personasAtendidas)
    {
        $this->personas_atendidas = $personasAtendidas;

        return $this;
    }

    /**
     * Get personasAtendidas
     *
     * @return integer
     */
    public function getPersonasAtendidas()
    {
        return $this->personas_atendidas;
    }

    /**
     * Set representantesInstituciones
     *
     * @param integer $representantesInstituciones
     *
     * @return Feria
     */
    public function setRepresentantesInstituciones($representantesInstituciones)
    {
        $this->representantes_instituciones = $representantesInstituciones;

        return $this;
    }

    /**
     * Get representantesInstituciones
     *
     * @return integer
     */
    public function getRepresentantesInstituciones()
    {
        return $this->representantes_instituciones;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     *
     * @return Feria
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Feria
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fechaFinalizacion
     *
     * @param \DateTime $fechaFinalizacion
     *
     * @return Feria
     */
    public function setFechaFinalizacion($fechaFinalizacion)
    {
        $this->fecha_finalizacion = $fechaFinalizacion;

        return $this;
    }

    /**
     * Get fechaFinalizacion
     *
     * @return \DateTime
     */
    public function getFechaFinalizacion()
    {
        return $this->fecha_finalizacion;
    }


    /**
     * Set fechaInicioPropuesta
     *
     * @param \DateTime $fechaInicioPropuesta
     *
     * @return Feria
     */
    public function setFechaInicioPropuesta($fechaInicioPropuesta)
    {
        $this->fecha_inicio_propuesta = $fechaInicioPropuesta;

        return $this;
    }

    /**
     * Get fechaInicioPropuesta
     *
     * @return \DateTime
     */
    public function getFechaInicioPropuesta()
    {
        return $this->fecha_inicio_propuesta;
    }

    /**
     * Set fechaFinalizacionPropuesta
     *
     * @param \DateTime $fechaFinalizacionPropuesta
     *
     * @return Feria
     */
    public function setFechaFinalizacionPropuesta($fechaFinalizacionPropuesta)
    {
        $this->fecha_finalizacion_propuesta = $fechaFinalizacionPropuesta;

        return $this;
    }

    /**
     * Get fechaFinalizacionPropuesta
     *
     * @return \DateTime
     */
    public function getFechaFinalizacionPropuesta()
    {
        return $this->fecha_finalizacion_propuesta;
    }

    /**
     * Set aprobador
     *
     * @param integer $aprobador
     *
     * @return Feria
     */
    public function setAprobador($aprobador)
    {
        $this->aprobador = $aprobador;

        return $this;
    }

    /**
     * Get aprobador
     *
     * @return integer
     */
    public function getAprobador()
    {
        return $this->aprobador;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return Feria
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }


    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Feria
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
     * @return Feria
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
     * @return Feria
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
     * @return Feria
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
     * @return Feria
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

