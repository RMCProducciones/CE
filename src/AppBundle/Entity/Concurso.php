<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concurso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ConcursoRepository")
 */
class Concurso
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
     * @var string
     *
     * @ORM\Column(name="fecha_bases", type="string")
     */
    private $fecha_bases;

    /**
     * @var integer
     *
     * @ORM\Column(name="modalidad", type="integer")
     */
    private $modalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="tematica", type="string")
     */
    private $tematica;

    /**
     * @var string
     *
     * @ORM\Column(name="ambito", type="string")
     */
    private $ambito;

    /**
     * @var string
     *
     * @ORM\Column(name="problematica", type="string")
     */
    private $problematica;

    /**
     * @var string
     *
     * @ORM\Column(name="actividades", type="string")
     */
    private $actividades;

    /**
     * @var string
     *
     * @ORM\Column(name="resultados", type="string")
     */
    private $resultados;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="distribucion", type="string")
     */
    private $distribucion;

    /**
     * @var string
     *
     * @ORM\Column(name="criterios", type="string")
     */
    private $criterios;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aprobacion", type="boolean")
     */
    private $aprobacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $fecha_inicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_finalizacion", type="datetime")
     */
    private $fecha_finalizacion;

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
     * @return Concurso
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
     * Set fechaBases
     *
     * @param string $fechaBases
     *
     * @return Concurso
     */
    public function setFechaBases($fechaBases)
    {
        $this->fecha_bases = $fechaBases;

        return $this;
    }

    /**
     * Get fechaBases
     *
     * @return string
     */
    public function getFechaBases()
    {
        return $this->fecha_bases;
    }

    /**
     * Set modalidad
     *
     * @param integer $modalidad
     *
     * @return Concurso
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Get modalidad
     *
     * @return integer
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Set tematica
     *
     * @param string $tematica
     *
     * @return Concurso
     */
    public function setTematica($tematica)
    {
        $this->tematica = $tematica;

        return $this;
    }

    /**
     * Get tematica
     *
     * @return string
     */
    public function getTematica()
    {
        return $this->tematica;
    }

    /**
     * Set ambito
     *
     * @param string $ambito
     *
     * @return Concurso
     */
    public function setAmbito($ambito)
    {
        $this->ambito = $ambito;

        return $this;
    }

    /**
     * Get ambito
     *
     * @return string
     */
    public function getAmbito()
    {
        return $this->ambito;
    }

    /**
     * Set problematica
     *
     * @param string $problematica
     *
     * @return Concurso
     */
    public function setProblematica($problematica)
    {
        $this->problematica = $problematica;

        return $this;
    }

    /**
     * Get problematica
     *
     * @return string
     */
    public function getProblematica()
    {
        return $this->problematica;
    }

    /**
     * Set actividades
     *
     * @param string $actividades
     *
     * @return Concurso
     */
    public function setActividades($actividades)
    {
        $this->actividades = $actividades;

        return $this;
    }

    /**
     * Get actividades
     *
     * @return string
     */
    public function getActividades()
    {
        return $this->actividades;
    }

    /**
     * Set resultados
     *
     * @param string $resultados
     *
     * @return Concurso
     */
    public function setResultados($resultados)
    {
        $this->resultados = $resultados;

        return $this;
    }

    /**
     * Get resultados
     *
     * @return string
     */
    public function getResultados()
    {
        return $this->resultados;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Concurso
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set distribucion
     *
     * @param string $distribucion
     *
     * @return Concurso
     */
    public function setDistribucion($distribucion)
    {
        $this->distribucion = $distribucion;

        return $this;
    }

    /**
     * Get distribucion
     *
     * @return string
     */
    public function getDistribucion()
    {
        return $this->distribucion;
    }

    /**
     * Set criterios
     *
     * @param string $criterios
     *
     * @return Concurso
     */
    public function setCriterios($criterios)
    {
        $this->criterios = $criterios;

        return $this;
    }

    /**
     * Get criterios
     *
     * @return string
     */
    public function getCriterios()
    {
        return $this->criterios;
    }

    /**
     * Set aprobacion
     *
     * @param boolean $aprobacion
     *
     * @return Concurso
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Concurso
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
     * @return Concurso
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Concurso
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
     * @return Concurso
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
     * @return Concurso
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
     * @return Concurso
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
     * @return Concurso
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

