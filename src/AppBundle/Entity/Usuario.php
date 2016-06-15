<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuario extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Listas")
     */
    protected $tipo_documento;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento", type="string")
     */
    protected $numero_documento;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido", type="string")
     */
    protected $primer_apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido", type="string", nullable=true)
     */
    protected $segundo_apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre", type="string")
     */
    protected $primer_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre", type="string", nullable=true)
     */
    protected $segundo_nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo", type="string", nullable=true)
     */
    protected $telefono_fijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string")
     */
    protected $telefono_celular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", nullable=true)
     */
    protected $correo_electronico;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio")
     */
    protected $municipio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    protected $active;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    protected $usuario_modificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    protected $fecha_modificacion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    protected $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    protected $fecha_creacion;

    
    public function __toString()
    {
        return $this->getPrimerNombre().' '.$this->getSegundoNombre().' '.$this->getPrimerApellido().' '.$this->getSegundoApellido();
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Agrega un rol al usuario.
     * @throws Exception
     * @param Rol $rol 
     */
    public function addRole( $rol )
    {
/*        
        if($rol == 1) {
          array_push($this->roles, 'ROLE_PROMOTOR');
        }       
        
       else if($rol == 2) {
          array_push($this->roles, 'ROLE_COORDINADOR');
        }
        else if($rol == 3) {
          array_push($this->roles, 'ROLE_ADMIN');
        }
*/
       $promotor = 1;
       $coordinador = 2;
       $admin = 3;

        if($rol == $promotor){
             $this->roles ['promotor']='ROLE_PROMOTOR';
        }
        else if ($rol == $coordinador) {
            $this->roles ['coordinador']='ROLE_COORDINADOR';
        }
        elseif ($rol == $admin) {
            $this->roles['admin']='ROLE_ADMIN';
        }



    }



    /**
     * Elimina un rol al usuario.
     * @throws Exception
     * @param Rol $rol 
     */
    public function deleteRole( $rol )
    {   

        $promotor = 1;
        $coordinador = 2;
        $admin = 3;


        if($rol == $promotor){
             unset($this->roles['promotor']);        }
        else if ($rol == $coordinador) {
            unset($this->roles['coordinador']);
        }
        elseif ($rol == $admin) {
            unset($this->roles['admin']);
        }

        //$this->roles = array_values($this->roles);

        //var_dump($this->roles);
        
        

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
     * Set tipoDocumento
     *
     * @param AppBundle\Entity\Listas $tipoDocumento
     *
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * Set municipio
     *
     * @param AppBundle\Entity\Municipio $municipio
     *
     * @return Usuario
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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

