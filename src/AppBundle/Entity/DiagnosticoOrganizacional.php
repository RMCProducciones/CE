<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiagnosticoOrganizacional
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DiagnosticoOrganizacional
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
     * @ORM\Column(name="grupo", type="integer")
     */
    private $grupo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_visita", type="datetime")
     */
    private $fecha_visita;

    /**
     * @var integer
     *
     * @ORM\Column(name="promotor", type="integer")
     */
    private $promotor;

    /**
     * @var integer
     *
     * @ORM\Column(name="1a", type="smallint")
     */
    private $1a;

    /**
     * @var integer
     *
     * @ORM\Column(name="1b", type="smallint")
     */
    private $1b;

    /**
     * @var integer
     *
     * @ORM\Column(name="1c", type="smallint")
     */
    private $1c;

    /**
     * @var integer
     *
     * @ORM\Column(name="1d", type="smallint")
     */
    private $1d;

    /**
     * @var integer
     *
     * @ORM\Column(name="1e", type="smallint")
     */
    private $1e;

    /**
     * @var integer
     *
     * @ORM\Column(name="1f", type="smallint")
     */
    private $1f;

    /**
     * @var integer
     *
     * @ORM\Column(name="2a", type="smallint")
     */
    private $2a;

    /**
     * @var integer
     *
     * @ORM\Column(name="2b", type="smallint")
     */
    private $2b;

    /**
     * @var integer
     *
     * @ORM\Column(name="2c", type="smallint")
     */
    private $2c;

    /**
     * @var integer
     *
     * @ORM\Column(name="2d", type="smallint")
     */
    private $2d;

    /**
     * @var integer
     *
     * @ORM\Column(name="2e", type="smallint")
     */
    private $2e;

    /**
     * @var integer
     *
     * @ORM\Column(name="3a", type="smallint")
     */
    private $3a;

    /**
     * @var integer
     *
     * @ORM\Column(name="3b", type="smallint")
     */
    private $3b;

    /**
     * @var integer
     *
     * @ORM\Column(name="3c", type="smallint")
     */
    private $3c;

    /**
     * @var integer
     *
     * @ORM\Column(name="3d", type="smallint")
     */
    private $3d;

    /**
     * @var integer
     *
     * @ORM\Column(name="3e", type="smallint")
     */
    private $3e;

    /**
     * @var integer
     *
     * @ORM\Column(name="3f", type="smallint")
     */
    private $3f;

    /**
     * @var integer
     *
     * @ORM\Column(name="4a", type="smallint")
     */
    private $4a;

    /**
     * @var integer
     *
     * @ORM\Column(name="4b", type="smallint")
     */
    private $4b;

    /**
     * @var integer
     *
     * @ORM\Column(name="4c", type="smallint")
     */
    private $4c;

    /**
     * @var integer
     *
     * @ORM\Column(name="4d", type="smallint")
     */
    private $4d;

    /**
     * @var integer
     *
     * @ORM\Column(name="4e", type="smallint")
     */
    private $4e;

    /**
     * @var integer
     *
     * @ORM\Column(name="5a", type="smallint")
     */
    private $5a;

    /**
     * @var integer
     *
     * @ORM\Column(name="5b", type="smallint")
     */
    private $5b;

    /**
     * @var integer
     *
     * @ORM\Column(name="5c", type="smallint")
     */
    private $5c;

    /**
     * @var integer
     *
     * @ORM\Column(name="5d", type="smallint")
     */
    private $5d;

    /**
     * @var integer
     *
     * @ORM\Column(name="5e", type="smallint")
     */
    private $5e;

    /**
     * @var integer
     *
     * @ORM\Column(name="5f", type="smallint")
     */
    private $5f;

    /**
     * @var integer
     *
     * @ORM\Column(name="total1", type="smallint")
     */
    private $total1;

    /**
     * @var integer
     *
     * @ORM\Column(name="total2", type="smallint")
     */
    private $total2;

    /**
     * @var integer
     *
     * @ORM\Column(name="total3", type="smallint")
     */
    private $total3;

    /**
     * @var integer
     *
     * @ORM\Column(name="total4", type="smallint")
     */
    private $total4;

    /**
     * @var integer
     *
     * @ORM\Column(name="total5", type="smallint")
     */
    private $total5;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="smallint")
     */
    private $total;

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
     * Set grupo
     *
     * @param integer $grupo
     *
     * @return DiagnosticoOrganizacional
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return integer
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fecha_visita = $fechaVisita;

        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime
     */
    public function getFechaVisita()
    {
        return $this->fecha_visita;
    }

    /**
     * Set promotor
     *
     * @param integer $promotor
     *
     * @return DiagnosticoOrganizacional
     */
    public function setPromotor($promotor)
    {
        $this->promotor = $promotor;

        return $this;
    }

    /**
     * Get promotor
     *
     * @return integer
     */
    public function getPromotor()
    {
        return $this->promotor;
    }

    /**
     * Set 1a
     *
     * @param integer $1a
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1a($1a)
    {
        $this->1a = $1a;

        return $this;
    }

    /**
     * Get 1a
     *
     * @return integer
     */
    public function get1a()
    {
        return $this->1a;
    }

    /**
     * Set 1b
     *
     * @param integer $1b
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1b($1b)
    {
        $this->1b = $1b;

        return $this;
    }

    /**
     * Get 1b
     *
     * @return integer
     */
    public function get1b()
    {
        return $this->1b;
    }

    /**
     * Set 1c
     *
     * @param integer $1c
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1c($1c)
    {
        $this->1c = $1c;

        return $this;
    }

    /**
     * Get 1c
     *
     * @return integer
     */
    public function get1c()
    {
        return $this->1c;
    }

    /**
     * Set 1d
     *
     * @param integer $1d
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1d($1d)
    {
        $this->1d = $1d;

        return $this;
    }

    /**
     * Get 1d
     *
     * @return integer
     */
    public function get1d()
    {
        return $this->1d;
    }

    /**
     * Set 1e
     *
     * @param integer $1e
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1e($1e)
    {
        $this->1e = $1e;

        return $this;
    }

    /**
     * Get 1e
     *
     * @return integer
     */
    public function get1e()
    {
        return $this->1e;
    }

    /**
     * Set 1f
     *
     * @param integer $1f
     *
     * @return DiagnosticoOrganizacional
     */
    public function set1f($1f)
    {
        $this->1f = $1f;

        return $this;
    }

    /**
     * Get 1f
     *
     * @return integer
     */
    public function get1f()
    {
        return $this->1f;
    }

    /**
     * Set 2a
     *
     * @param integer $2a
     *
     * @return DiagnosticoOrganizacional
     */
    public function set2a($2a)
    {
        $this->2a = $2a;

        return $this;
    }

    /**
     * Get 2a
     *
     * @return integer
     */
    public function get2a()
    {
        return $this->2a;
    }

    /**
     * Set 2b
     *
     * @param integer $2b
     *
     * @return DiagnosticoOrganizacional
     */
    public function set2b($2b)
    {
        $this->2b = $2b;

        return $this;
    }

    /**
     * Get 2b
     *
     * @return integer
     */
    public function get2b()
    {
        return $this->2b;
    }

    /**
     * Set 2c
     *
     * @param integer $2c
     *
     * @return DiagnosticoOrganizacional
     */
    public function set2c($2c)
    {
        $this->2c = $2c;

        return $this;
    }

    /**
     * Get 2c
     *
     * @return integer
     */
    public function get2c()
    {
        return $this->2c;
    }

    /**
     * Set 2d
     *
     * @param integer $2d
     *
     * @return DiagnosticoOrganizacional
     */
    public function set2d($2d)
    {
        $this->2d = $2d;

        return $this;
    }

    /**
     * Get 2d
     *
     * @return integer
     */
    public function get2d()
    {
        return $this->2d;
    }

    /**
     * Set 2e
     *
     * @param integer $2e
     *
     * @return DiagnosticoOrganizacional
     */
    public function set2e($2e)
    {
        $this->2e = $2e;

        return $this;
    }

    /**
     * Get 2e
     *
     * @return integer
     */
    public function get2e()
    {
        return $this->2e;
    }

    /**
     * Set 3a
     *
     * @param integer $3a
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3a($3a)
    {
        $this->3a = $3a;

        return $this;
    }

    /**
     * Get 3a
     *
     * @return integer
     */
    public function get3a()
    {
        return $this->3a;
    }

    /**
     * Set 3b
     *
     * @param integer $3b
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3b($3b)
    {
        $this->3b = $3b;

        return $this;
    }

    /**
     * Get 3b
     *
     * @return integer
     */
    public function get3b()
    {
        return $this->3b;
    }

    /**
     * Set 3c
     *
     * @param integer $3c
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3c($3c)
    {
        $this->3c = $3c;

        return $this;
    }

    /**
     * Get 3c
     *
     * @return integer
     */
    public function get3c()
    {
        return $this->3c;
    }

    /**
     * Set 3d
     *
     * @param integer $3d
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3d($3d)
    {
        $this->3d = $3d;

        return $this;
    }

    /**
     * Get 3d
     *
     * @return integer
     */
    public function get3d()
    {
        return $this->3d;
    }

    /**
     * Set 3e
     *
     * @param integer $3e
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3e($3e)
    {
        $this->3e = $3e;

        return $this;
    }

    /**
     * Get 3e
     *
     * @return integer
     */
    public function get3e()
    {
        return $this->3e;
    }

    /**
     * Set 3f
     *
     * @param integer $3f
     *
     * @return DiagnosticoOrganizacional
     */
    public function set3f($3f)
    {
        $this->3f = $3f;

        return $this;
    }

    /**
     * Get 3f
     *
     * @return integer
     */
    public function get3f()
    {
        return $this->3f;
    }

    /**
     * Set 4a
     *
     * @param integer $4a
     *
     * @return DiagnosticoOrganizacional
     */
    public function set4a($4a)
    {
        $this->4a = $4a;

        return $this;
    }

    /**
     * Get 4a
     *
     * @return integer
     */
    public function get4a()
    {
        return $this->4a;
    }

    /**
     * Set 4b
     *
     * @param integer $4b
     *
     * @return DiagnosticoOrganizacional
     */
    public function set4b($4b)
    {
        $this->4b = $4b;

        return $this;
    }

    /**
     * Get 4b
     *
     * @return integer
     */
    public function get4b()
    {
        return $this->4b;
    }

    /**
     * Set 4c
     *
     * @param integer $4c
     *
     * @return DiagnosticoOrganizacional
     */
    public function set4c($4c)
    {
        $this->4c = $4c;

        return $this;
    }

    /**
     * Get 4c
     *
     * @return integer
     */
    public function get4c()
    {
        return $this->4c;
    }

    /**
     * Set 4d
     *
     * @param integer $4d
     *
     * @return DiagnosticoOrganizacional
     */
    public function set4d($4d)
    {
        $this->4d = $4d;

        return $this;
    }

    /**
     * Get 4d
     *
     * @return integer
     */
    public function get4d()
    {
        return $this->4d;
    }

    /**
     * Set 4e
     *
     * @param integer $4e
     *
     * @return DiagnosticoOrganizacional
     */
    public function set4e($4e)
    {
        $this->4e = $4e;

        return $this;
    }

    /**
     * Get 4e
     *
     * @return integer
     */
    public function get4e()
    {
        return $this->4e;
    }

    /**
     * Set 5a
     *
     * @param integer $5a
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5a($5a)
    {
        $this->5a = $5a;

        return $this;
    }

    /**
     * Get 5a
     *
     * @return integer
     */
    public function get5a()
    {
        return $this->5a;
    }

    /**
     * Set 5b
     *
     * @param integer $5b
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5b($5b)
    {
        $this->5b = $5b;

        return $this;
    }

    /**
     * Get 5b
     *
     * @return integer
     */
    public function get5b()
    {
        return $this->5b;
    }

    /**
     * Set 5c
     *
     * @param integer $5c
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5c($5c)
    {
        $this->5c = $5c;

        return $this;
    }

    /**
     * Get 5c
     *
     * @return integer
     */
    public function get5c()
    {
        return $this->5c;
    }

    /**
     * Set 5d
     *
     * @param integer $5d
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5d($5d)
    {
        $this->5d = $5d;

        return $this;
    }

    /**
     * Get 5d
     *
     * @return integer
     */
    public function get5d()
    {
        return $this->5d;
    }

    /**
     * Set 5e
     *
     * @param integer $5e
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5e($5e)
    {
        $this->5e = $5e;

        return $this;
    }

    /**
     * Get 5e
     *
     * @return integer
     */
    public function get5e()
    {
        return $this->5e;
    }

    /**
     * Set 5f
     *
     * @param integer $5f
     *
     * @return DiagnosticoOrganizacional
     */
    public function set5f($5f)
    {
        $this->5f = $5f;

        return $this;
    }

    /**
     * Get 5f
     *
     * @return integer
     */
    public function get5f()
    {
        return $this->5f;
    }

    /**
     * Set total1
     *
     * @param integer $total1
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal1($total1)
    {
        $this->total1 = $total1;

        return $this;
    }

    /**
     * Get total1
     *
     * @return integer
     */
    public function getTotal1()
    {
        return $this->total1;
    }

    /**
     * Set total2
     *
     * @param integer $total2
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal2($total2)
    {
        $this->total2 = $total2;

        return $this;
    }

    /**
     * Get total2
     *
     * @return integer
     */
    public function getTotal2()
    {
        return $this->total2;
    }

    /**
     * Set total3
     *
     * @param integer $total3
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal3($total3)
    {
        $this->total3 = $total3;

        return $this;
    }

    /**
     * Get total3
     *
     * @return integer
     */
    public function getTotal3()
    {
        return $this->total3;
    }

    /**
     * Set total4
     *
     * @param integer $total4
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal4($total4)
    {
        $this->total4 = $total4;

        return $this;
    }

    /**
     * Get total4
     *
     * @return integer
     */
    public function getTotal4()
    {
        return $this->total4;
    }

    /**
     * Set total5
     *
     * @param integer $total5
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal5($total5)
    {
        $this->total5 = $total5;

        return $this;
    }

    /**
     * Get total5
     *
     * @return integer
     */
    public function getTotal5()
    {
        return $this->total5;
    }

    /**
     * Set total
     *
     * @param integer $total
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return DiagnosticoOrganizacional
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
     * @return DiagnosticoOrganizacional
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
     * @return DiagnosticoOrganizacional
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
     * @return DiagnosticoOrganizacional
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
     * @return DiagnosticoOrganizacional
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

