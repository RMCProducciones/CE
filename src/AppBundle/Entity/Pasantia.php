<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pasantia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PasantiaRepository")
 */
class Pasantia
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
     * @ORM\Column(name="territorio_aprendizaje", type="string")
     */
    private $territorio_aprendizaje;

    /**
     * @var string
     *
     * @ORM\Column(name="organizacion", type="string")
     */
    private $organizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string")
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_pasantia", type="string")
     */
    private $nombre_pasantia;

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
     * Set territorioAprendizaje
     *
     * @param string $territorioAprendizaje
     *
     * @return Pasantia
     */
    public function setTerritorioAprendizaje($territorioAprendizaje)
    {
        $this->territorio_aprendizaje = $territorioAprendizaje;
    
        return $this;
    }

    /**
     * Get territorioAprendizaje
     *
     * @return string
     */
    public function getTerritorioAprendizaje()
    {
        return $this->territorio_aprendizaje;
    }

    /**
     * Set organizacion
     *
     * @param string $organizacion
     *
     * @return Pasantia
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
     * Set grupo
     *
     * @param string $grupo
     *
     * @return Pasantia
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
    
        return $this;
    }

    /**
     * Get grupo
     *
     * @return string
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set nombrePasantia
     *
     * @param string $nombrePasantia
     *
     * @return Pasantia
     */
    public function setNombrePasantia($nombrePasantia)
    {
        $this->nombre_pasantia = $nombrePasantia;
    
        return $this;
    }

    /**
     * Get nombrePasantia
     *
     * @return string
     */
    public function getNombrePasantia()
    {
        return $this->nombre_pasantia;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Pasantia
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
     * @return Pasantia
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
     * @return Pasantia
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
     * @return Pasantia
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
     * @return Pasantia
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
     * @return Pasantia
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

