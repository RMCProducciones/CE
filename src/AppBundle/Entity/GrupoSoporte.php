<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * GrupoSoporte
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GrupoSoporte
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
     * @var array
     */
    private $archivos;

	/**
     * @var string
     *
     * @ORM\Column(name="path", type="string", nullable=true)
     */
    public $path;	

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
     * @ORM\Column(name="usuario_creacion", type="integer")
     */
    private $usuario_creacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fecha_creacion;

    public function __construct()
    {
        $this->archivos = new ArrayCollection();
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
     * Set archivos
     *
     * @param string $archivos
     */
    public function setArchivos($archivos)
    {
        $this->archivos = $archivos;
    }	
	
    /**
     * Get archivos
     *
     * @return string 
     */
    public function getArchivos()
    {
        return $this->archivos;
    }

  /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
	
    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return GrupoSoporte
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
     * @return GrupoSoporte
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
     * @return GrupoSoporte
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
     * @return GrupoSoporte
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
     * @return GrupoSoporte
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
		
	public function uploadVarios()
    {        
        $mypath = unserialize($this->path);
        foreach ($this->archivos as $key => $value) {
            
            if ($value){
                /*
                //Definir un nombre valido para el archivo
                //Gedmo es una de las extensiones de Doctrine para Sluggable, Timestampable, etc
                $nombre = \Gedmo\Sluggable\Util\Urlizer::urlize($value->getClientOriginalName(), '-');
                
                //Verificar la extension para guardar la imagen
                $extension = $value->guessExtension();
                
                $extvalidas = array('JPG','JPEG','PNG','GIF','PDF');
                
                if ( !in_array(strtoupper($extension), $extvalidas)){
                    return;
                }
                
                //Quitar la extension del nombre generado
                //caso contrario el nombre queda algo como:  miimagen-jpg
                $nombre = str_replace('-'.$extension, '', $nombre);
                //$nombreFinal = uniqid('vecinos-').'-foto.jpg';
                
                //Nombre final con extension
                //Queda algo como: miimagen.jpg
                $nombreFinal = $nombre.'.'.$extension;*/
                $nombreFinal = $value->getClientOriginalName();
                
                //Verificar si la imagen ya esta almacenada
                if (@in_array($nombreFinal, $mypath)){
                    //si la imagen ya esta almacenada, se continua con el siguiente item    
                    continue;
                }
                
                //Almacenar la imagen en el servidor
                $value->move($this->getUploadRootDir(), $nombreFinal);
                //$value->move(__DIR__.'/../../../../web/uploads/images', $nombreFinal);
            //Agregar el nuevo nombre al final del Array
                $mypath[]= $nombreFinal;
            }
        }
        $this->path = serialize($mypath);
        $this->archivos = array();
    } 
    
	protected function getUploadRootDir()
    {
       // return __DIR__.'/../../../../web/'.$this->getUploadDir();
        return __DIR__.'/../../../../web/uploads/images';
    }
	
    protected function getUploadDir()
    {
        return 'uploads/images';
    }
	
    public function serialize()
    {
        return serialize($this->getPath());
    }
    
    public function unserialize($data)
    {
        $this->path = unserialize($data);
    }	
}

