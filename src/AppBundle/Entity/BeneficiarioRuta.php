<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BeneficiarioRuta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BeneficiarioRutaRepository")
 */
class BeneficiarioRuta
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
     * @ORM\Column(name="ruta", type="string")
     */
    private $ruta;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficiario", type="string")
     */
    private $beneficiario;

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
     * Set ruta
     *
     * @param string $ruta
     *
     * @return BeneficiarioRuta
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    
        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set beneficiario
     *
     * @param string $beneficiario
     *
     * @return BeneficiarioRuta
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;
    
        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return string
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return BeneficiarioRuta
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
     * @return BeneficiarioRuta
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
     * @return BeneficiarioRuta
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
     * @return BeneficiarioRuta
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
     * @return BeneficiarioRuta
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

