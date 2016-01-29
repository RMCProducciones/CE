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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Grupo")
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
     * @ORM\Column(name="productivaA", type="smallint")
     */
    private $productivaA;

    /**
     * @var integer
     *
     * @ORM\Column(name="productivaB", type="smallint")
     */
    private $productivaB;

    /**
     * @var integer
     *
     * @ORM\Column(name="productivaC", type="smallint")
     */
    private $productivaC;

    /**
     * @var integer
     *
     * @ORM\Column(name="productivaD", type="smallint")
     */
    private $productivaD;

    /**
     * @var integer
     *
     * @ORM\Column(name="productivaE", type="smallint")
     */
    private $productivaE;

    /**
     * @var integer
     *
     * @ORM\Column(name="productivaF", type="smallint")
     */
    private $productivaF;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercialA", type="smallint")
     */
    private $comercialA;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercialB", type="smallint")
     */
    private $comercialB;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercialC", type="smallint")
     */
    private $comercialC;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercialD", type="smallint")
     */
    private $comercialD;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercialE", type="smallint")
     */
    private $comercialE;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraA", type="smallint")
     */
    private $financieraA;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraB", type="smallint")
     */
    private $financieraB;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraC", type="smallint")
     */
    private $financieraC;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraD", type="smallint")
     */
    private $financieraD;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraE", type="smallint")
     */
    private $financieraE;

    /**
     * @var integer
     *
     * @ORM\Column(name="financieraF", type="smallint")
     */
    private $financieraF;

    /**
     * @var integer
     *
     * @ORM\Column(name="administrativaA", type="smallint")
     */
    private $administrativaA;

    /**
     * @var integer
     *
     * @ORM\Column(name="administrativaB", type="smallint")
     */
    private $administrativaB;

    /**
     * @var integer
     *
     * @ORM\Column(name="administrativaC", type="smallint")
     */
    private $administrativaC;

    /**
     * @var integer
     *
     * @ORM\Column(name="administrativaD", type="smallint")
     */
    private $administrativaD;

    /**
     * @var integer
     *
     * @ORM\Column(name="administrativaE", type="smallint")
     */
    private $administrativaE;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalA", type="smallint")
     */
    private $organizacionalA;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalB", type="smallint")
     */
    private $organizacionalB;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalC", type="smallint")
     */
    private $organizacionalC;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalD", type="smallint")
     */
    private $organizacionalD;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalE", type="smallint")
     */
    private $organizacionalE;

    /**
     * @var integer
     *
     * @ORM\Column(name="organizacionalF", type="smallint")
     */
    private $organizacionalF;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalProductiva", type="smallint")
     */
    private $totalProductiva;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalComercial", type="smallint")
     */
    private $totalComercial;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalFinanciera", type="smallint")
     */
    private $totalFinanciera;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalAdministrativa", type="smallint")
     */
    private $totalAdministrativa;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalOrganizacional", type="smallint")
     */
    private $totalOrganizacional;

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
     * @param AppBundle\Entity\Grupo $grupo
     *
     * @return DiagnosticoOrganizacional
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
     * Set productivaA
     *
     * @param integer $productivaA
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaA($productivaA)
    {
        $this->productivaA = $productivaA;

        return $this;
    }

    /**
     * Get productivaA
     *
     * @return integer
     */
    public function getProductivaA()
    {
        return $this->productivaA;
    }

    /**
     * Set productivaB
     *
     * @param integer $productivaB
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaB($productivaB)
    {
        $this->productivaB = $productivaB;

        return $this;
    }

    /**
     * Get productivaB
     *
     * @return integer
     */
    public function getProductivaB()
    {
        return $this->productivaB;
    }

    /**
     * Set productivaC
     *
     * @param integer $productivaC
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaC($productivaC)
    {
        $this->productivaC = $productivaC;

        return $this;
    }

    /**
     * Get productivaC
     *
     * @return integer
     */
    public function getProductivaC()
    {
        return $this->productivaC;
    }

    /**
     * Set productivaD
     *
     * @param integer $productivaD
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaD($productivaD)
    {
        $this->productivaD = $productivaD;

        return $this;
    }

    /**
     * Get productivaD
     *
     * @return integer
     */
    public function getProductivaD()
    {
        return $this->productivaD;
    }

    /**
     * Set productivaE
     *
     * @param integer $productivaE
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaE($productivaE)
    {
        $this->productivaE = $productivaE;

        return $this;
    }

    /**
     * Get productivaE
     *
     * @return integer
     */
    public function getProductivaE()
    {
        return $this->productivaE;
    }

    /**
     * Set productivaF
     *
     * @param integer $productivaF
     *
     * @return DiagnosticoOrganizacional
     */
    public function setProductivaF($productivaF)
    {
        $this->productivaF = $productivaF;

        return $this;
    }

    /**
     * Get productivaF
     *
     * @return integer
     */
    public function getProductivaF()
    {
        return $this->productivaF;
    }

    /**
     * Set comercialA
     *
     * @param integer $comercialA
     *
     * @return DiagnosticoOrganizacional
     */
    public function setComercialA($comercialA)
    {
        $this->comercialA = $comercialA;

        return $this;
    }

    /**
     * Get comercialA
     *
     * @return integer
     */
    public function getComercialA()
    {
        return $this->comercialA;
    }

    /**
     * Set comercialB
     *
     * @param integer $comercialB
     *
     * @return DiagnosticoOrganizacional
     */
    public function setComercialB($comercialB)
    {
        $this->comercialB = $comercialB;

        return $this;
    }

    /**
     * Get comercialB
     *
     * @return integer
     */
    public function getComercialB()
    {
        return $this->comercialB;
    }

    /**
     * Set comercialC
     *
     * @param integer $comercialC
     *
     * @return DiagnosticoOrganizacional
     */
    public function setComercialC($comercialC)
    {
        $this->comercialC = $comercialC;

        return $this;
    }

    /**
     * Get comercialC
     *
     * @return integer
     */
    public function getComercialC()
    {
        return $this->comercialC;
    }

    /**
     * Set comercialD
     *
     * @param integer $comercialD
     *
     * @return DiagnosticoOrganizacional
     */
    public function setComercialD($comercialD)
    {
        $this->comercialD = $comercialD;

        return $this;
    }

    /**
     * Get comercialD
     *
     * @return integer
     */
    public function getComercialD()
    {
        return $this->comercialD;
    }

    /**
     * Set comercialE
     *
     * @param integer $comercialE
     *
     * @return DiagnosticoOrganizacional
     */
    public function setComercialE($comercialE)
    {
        $this->comercialE = $comercialE;

        return $this;
    }

    /**
     * Get comercialE
     *
     * @return integer
     */
    public function getComercialE()
    {
        return $this->comercialE;
    }

    /**
     * Set financieraA
     *
     * @param integer $financieraA
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraA($financieraA)
    {
        $this->financieraA = $financieraA;

        return $this;
    }

    /**
     * Get financieraA
     *
     * @return integer
     */
    public function getFinancieraA()
    {
        return $this->financieraA;
    }

    /**
     * Set financieraB
     *
     * @param integer $financieraB
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraB($financieraB)
    {
        $this->financieraB = $financieraB;

        return $this;
    }

    /**
     * Get financieraB
     *
     * @return integer
     */
    public function getFinancieraB()
    {
        return $this->financieraB;
    }

    /**
     * Set financieraC
     *
     * @param integer $financieraC
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraC($financieraC)
    {
        $this->financieraC = $financieraC;

        return $this;
    }

    /**
     * Get financieraC
     *
     * @return integer
     */
    public function getFinancieraC()
    {
        return $this->financieraC;
    }

    /**
     * Set financieraD
     *
     * @param integer $financieraD
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraD($financieraD)
    {
        $this->financieraD = $financieraD;

        return $this;
    }

    /**
     * Get financieraD
     *
     * @return integer
     */
    public function getFinancieraD()
    {
        return $this->financieraD;
    }

    /**
     * Set financieraE
     *
     * @param integer $financieraE
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraE($financieraE)
    {
        $this->financieraE = $financieraE;

        return $this;
    }

    /**
     * Get financieraE
     *
     * @return integer
     */
    public function getFinancieraE()
    {
        return $this->financieraE;
    }

    /**
     * Set financieraF
     *
     * @param integer $financieraF
     *
     * @return DiagnosticoOrganizacional
     */
    public function setFinancieraF($financieraF)
    {
        $this->financieraF = $financieraF;

        return $this;
    }

    /**
     * Get financieraF
     *
     * @return integer
     */
    public function getFinancieraF()
    {
        return $this->financieraF;
    }

    /**
     * Set administrativaA
     *
     * @param integer $administrativaA
     *
     * @return DiagnosticoOrganizacional
     */
    public function setAdministrativaA($administrativaA)
    {
        $this->administrativaA = $administrativaA;

        return $this;
    }

    /**
     * Get administrativaA
     *
     * @return integer
     */
    public function getAdministrativaA()
    {
        return $this->administrativaA;
    }

    /**
     * Set administrativaB
     *
     * @param integer $administrativaB
     *
     * @return DiagnosticoOrganizacional
     */
    public function setAdministrativaB($administrativaB)
    {
        $this->administrativaB = $administrativaB;

        return $this;
    }

    /**
     * Get administrativaB
     *
     * @return integer
     */
    public function getAdministrativaB()
    {
        return $this->administrativaB;
    }

    /**
     * Set administrativaC
     *
     * @param integer $administrativaC
     *
     * @return DiagnosticoOrganizacional
     */
    public function setAdministrativaC($administrativaC)
    {
        $this->administrativaC = $administrativaC;

        return $this;
    }

    /**
     * Get administrativaC
     *
     * @return integer
     */
    public function getAdministrativaC()
    {
        return $this->administrativaC;
    }

    /**
     * Set administrativaD
     *
     * @param integer $administrativaD
     *
     * @return DiagnosticoOrganizacional
     */
    public function setAdministrativaD($administrativaD)
    {
        $this->administrativaD = $administrativaD;

        return $this;
    }

    /**
     * Get administrativaD
     *
     * @return integer
     */
    public function getAdministrativaD()
    {
        return $this->administrativaD;
    }

    /**
     * Set administrativaE
     *
     * @param integer $administrativaE
     *
     * @return DiagnosticoOrganizacional
     */
    public function setAdministrativaE($administrativaE)
    {
        $this->administrativaE = $administrativaE;

        return $this;
    }

    /**
     * Get administrativaE
     *
     * @return integer
     */
    public function getAdministrativaE()
    {
        return $this->administrativaE;
    }

    /**
     * Set organizacionalA
     *
     * @param integer $organizacionalA
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalA($organizacionalA)
    {
        $this->organizacionalA = $organizacionalA;

        return $this;
    }

    /**
     * Get organizacionalA
     *
     * @return integer
     */
    public function getOrganizacionalA()
    {
        return $this->organizacionalA;
    }

    /**
     * Set organizacionalB
     *
     * @param integer $organizacionalB
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalB($organizacionalB)
    {
        $this->organizacionalB = $organizacionalB;

        return $this;
    }

    /**
     * Get organizacionalB
     *
     * @return integer
     */
    public function getOrganizacionalB()
    {
        return $this->organizacionalB;
    }

    /**
     * Set organizacionalC
     *
     * @param integer $organizacionalC
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalC($organizacionalC)
    {
        $this->organizacionalC = $organizacionalC;

        return $this;
    }

    /**
     * Get organizacionalC
     *
     * @return integer
     */
    public function getOrganizacionalC()
    {
        return $this->organizacionalC;
    }

    /**
     * Set organizacionalD
     *
     * @param integer $organizacionalD
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalD($organizacionalD)
    {
        $this->organizacionalD = $organizacionalD;

        return $this;
    }

    /**
     * Get organizacionalD
     *
     * @return integer
     */
    public function getOrganizacionalD()
    {
        return $this->organizacionalD;
    }

    /**
     * Set organizacionalE
     *
     * @param integer $organizacionalE
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalE($organizacionalE)
    {
        $this->organizacionalE = $organizacionalE;

        return $this;
    }

    /**
     * Get organizacionalE
     *
     * @return integer
     */
    public function getOrganizacionalE()
    {
        return $this->organizacionalE;
    }

    /**
     * Set organizacionalF
     *
     * @param integer $organizacionalF
     *
     * @return DiagnosticoOrganizacional
     */
    public function setOrganizacionalF($organizacionalF)
    {
        $this->organizacionalF = $organizacionalF;

        return $this;
    }

    /**
     * Get organizacionalF
     *
     * @return integer
     */
    public function getOrganizacionalF()
    {
        return $this->organizacionalF;
    }

    /**
     * Set totalProductiva
     *
     * @param integer $totalProductiva
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotalProductiva($totalProductiva)
    {
        $this->totalProductiva = $totalProductiva;

        return $this;
    }

    /**
     * Get totalProductiva
     *
     * @return integer
     */
    public function getTotalProductiva()
    {
        return $this->totalProductiva;
    }

    /**
     * Set totalComercial
     *
     * @param integer $totalComercial
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotalComercial($totalComercial)
    {
        $this->totalComercial = $totalComercial;

        return $this;
    }

    /**
     * Get totalComercial
     *
     * @return integer
     */
    public function getTotalComercial()
    {
        return $this->totalComercial;
    }

    /**
     * Set totalFinanciera
     *
     * @param integer $totalFinanciera
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotalFinanciera($totalFinanciera)
    {
        $this->totalFinanciera = $totalFinanciera;

        return $this;
    }

    /**
     * Get totalFinanciera
     *
     * @return integer
     */
    public function getTotalFinanciera()
    {
        return $this->totalFinanciera;
    }

    /**
     * Set totalAdministrativa
     *
     * @param integer $totalAdministrativa
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotalAdministrativa($totalAdministrativa)
    {
        $this->totalAdministrativa = $totalAdministrativa;

        return $this;
    }

    /**
     * Get totalAdministrativa
     *
     * @return integer
     */
    public function getTotalAdministrativa()
    {
        return $this->totalAdministrativa;
    }

    /**
     * Set totalOrganizacional
     *
     * @param integer $totalOrganizacional
     *
     * @return DiagnosticoOrganizacional
     */
    public function setTotalOrganizacional($totalOrganizacional)
    {
        $this->totalOrganizacional = $totalOrganizacional;

        return $this;
    }

    /**
     * Get totalOrganizacional
     *
     * @return integer
     */
    public function getTotalOrganizacional()
    {
        return $this->totalOrganizacional;
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

